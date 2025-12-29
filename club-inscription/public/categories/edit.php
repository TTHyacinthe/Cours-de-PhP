<?php
require_once __DIR__ . '/../../include/db.php';
require_once __DIR__ . '/../../include/header.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    $_SESSION['flash'] = [
        'type' => 'error',
        'message' => "Catégorie invalide."
    ];
    header('Location: list.php');
    exit;
}

/* Récupération de la catégorie */
$stmt = $db->prepare("SELECT * FROM categories WHERE id = ?");
$stmt->execute([$id]);
$cat = $stmt->fetch();

if (!$cat) {
    echo "<p class='text-error'>Catégorie introuvable.</p>";
    require_once __DIR__ . '/../../include/footer.php';
    exit;
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cle = trim($_POST['cle'] ?? '');
    $libelle = trim($_POST['nom'] ?? '');

    if ($cle === '' || $libelle === '') {
      $_SESSION['flash'] = [
          'type' => 'error',
          'message' => "Tous les champs sont obligatoires."
        ];
        header("Location: edit.php?id=" . $id);
        exit;
    }

    /* Vérifier l'unicité de la clé */
    $check = $db->prepare(
        "SELECT id FROM categories WHERE cle = ? AND id != ?"
    );
    $check->execute([$cle, $id]);

    if ($check->fetch()) {
        $_SESSION['flash'] = [
            'type' => 'error',
            'message' => "Cette clé est déjà utilisée par une autre catégorie."
        ];
        header("Location: edit.php?id=" . $id);
        exit;
    }

    if (!$errors) {
        $stmt = $db->prepare(
            "UPDATE categories SET cle = ?, nom = ? WHERE id = ?"
        );
        $stmt->execute([$cle, $libelle, $id]);

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


    <form method="post" class="space-y-4">

        <div class="form-control">
            <label class="label">
                <span class="label-text">Clé (identifiant unique)</span>
            </label>
            <input
                type="text"
                name="cle"
                class="input input-bordered w-full"
                value="<?= htmlspecialchars($_POST['cle'] ?? $cat['cle']) ?>"
            >
        </div>

        <div class="form-control">
            <label class="label">
                <span class="label-text">Libellé</span>
            </label>
            <input
                type="text"
                name="nom"
                class="input input-bordered w-full"
                value="<?= htmlspecialchars($_POST['nom'] ?? $cat['nom']) ?>"
            >
        </div>

        <div class="flex justify-end gap-3 pt-4">
            <a href="list.php" class="btn btn-neutral">Annuler</a>
            <button class="btn btn-warning text-black">✏ Modifier</button>
        </div>

    </form>
</div>

<?php require_once __DIR__ . '/../../include/footer.php'; ?>
