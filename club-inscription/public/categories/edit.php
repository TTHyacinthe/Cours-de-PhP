<?php
require_once __DIR__ . '/../../include/db.php';
require_once __DIR__ . '/../../include/header.php';

$id = $_GET['id'] ?? null;

$stmt = $db->prepare("SELECT * FROM categories WHERE id = ?");
$stmt->execute([$id]);
$cat = $stmt->fetch();

if (!$cat) {
    echo "<p class='text-error'>Course introuvable.</p>";
    require_once __DIR__ . '/../../include/footer.php';
    exit;
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom']);

    if ($nom === '') {
        $_SESSION['flash'] = [
            'type' => 'error',
            'message' => "Le nom de la course est obligatoire."
        ];
    } else {
        $stmt = $db->prepare("UPDATE categories SET nom = ? WHERE id = ?");
        $stmt->execute([$nom, $id]);

        $_SESSION['flash'] = [
            'type' => 'success',
            'message' => "Course modifiée avec succès !"
        ];

        header("Location: list.php");
        exit;
    }
}

?>

<div class="card bg-base-100 shadow-lg p-8 border border-base-300">

  <h1 class="text-2xl font-bold mb-6">Modifier la course</h1>

  <?php if ($errors): ?>
    <div class="alert alert-error mb-4">
      <?php foreach ($errors as $e): ?>
        <p><?= htmlspecialchars($e) ?></p>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

  <form method="post" class="space-y-4">

    <div class="form-control">
      <label class="label"><span class="label-text">Nom</span></label>
      <input type="text" name="nom" class="input input-bordered w-full" 
             value="<?= htmlspecialchars($_POST['nom'] ?? $cat['nom']) ?>">
    </div>

    <div class="flex justify-end gap-3 pt-4">
      <a href="list.php" class="btn btn-neutral">Annuler</a>
      <button class="btn btn-warning text-black">✏ Modifier</button>
    </div>

  </form>
</div>

<?php require_once __DIR__ . '/../../include/footer.php'; ?>
