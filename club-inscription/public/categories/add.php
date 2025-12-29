<?php
require_once __DIR__ . '/../../include/db.php';
require_once __DIR__ . '/../../include/header.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cle = trim($_POST['cle']);
    $nom = trim($_POST['nom']);

    if ($cle === '') {
        $_SESSION['flash'] = [
            'type' => 'error',
            'message' => "La clé de la course est obligatoire."
        ];
        header("Location: add.php");
        exit; 
    }
    if ($nom === '') {
      $_SESSION['flash'] = [
          'type' => 'error',
          'message' => "Le nom de la course est obligatoire."
        ];
        header("Location: add.php");
        exit;
    }
    $stmr = $db->prepare("SELECT COUNT(*) FROM categories WHERE cle = ?");
    $stmr->execute([$cle]);
    if ($stmr->fetchColumn() > 0) {
      $_SESSION['flash'] = [
          'type' => 'error',
          'message' => "Cette clé de course est déjà utilisée."
        ];
        header("Location: add.php");
        exit;
    }
    $stmr = $db->prepare("SELECT COUNT(*) FROM categories WHERE cle = ?");
    $stmr->execute([$cle]);
    if ($stmr->fetchColumn() > 0) {
      $_SESSION['flash'] = [
          'type' => 'error',
          'message' => "Cette clé de course est déjà utilisée."
        ];
        header("Location: add.php");
        exit;
    }
    if (!$errors) {
        $stmt = $db->prepare("INSERT INTO categories (cle, nom) VALUES (?, ?)");
        $stmt->execute([$cle, $nom]);
        
        $_SESSION['flash'] = ['type' => 'success', 'message' => "Course ajoutée avec succès !"];
        header("Location: list.php");
        exit;
    }
}
?>

<div class="card bg-base-100 shadow-lg p-8 border border-base-300">

  <h1 class="text-2xl font-bold mb-6">Ajouter une Course</h1>

  <?php if ($errors): ?>
    <div class="alert alert-error mb-4">
      <ul class="list-disc list-inside">
        <?php foreach ($errors as $e): ?>
          <li><?= htmlspecialchars($e) ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>

  <form method="post" class="space-y-4">
    <input name="cle" placeholder="clé unique (ex: esa_namur)"
           class="input input-bordered w-full"
           value="<?= htmlspecialchars($_POST['cle'] ?? '') ?>">

    <input name="nom" placeholder="Nom affiché"
           class="input input-bordered w-full"
           value="<?= htmlspecialchars($_POST['nom'] ?? '') ?>">


    <div class="flex justify-end gap-3 pt-4">
      <a href="list.php" class="btn btn-neutral">Annuler</a>
      <button class="btn btn-success">✔ Enregistrer</button>
    </div>

  </form>
</div>

<?php require_once __DIR__ . '/../../include/footer.php'; ?>
