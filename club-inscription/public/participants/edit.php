<?php
require_once __DIR__ . '/../../include/db.php';
require_once __DIR__ . '/../../include/header.php';

// Vérification de l'ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    $_SESSION['flash'] = ['type' => 'error', 'message' => 'Participant introuvable.'];
    header("Location: list.php");
    exit;
}

$id = (int) $_GET['id'];

// Récupération du participant
$stmt = $db->prepare("SELECT * FROM participants WHERE id = ?");
$stmt->execute([$id]);
$participant = $stmt->fetch();

if (!$participant) {
    $_SESSION['flash'] = ['type' => 'error', 'message' => 'Participant introuvable.'];
    header("Location: list.php");
    exit;
}

// Récup catégories
$cats = $db->query("SELECT id, nom FROM categories ORDER BY nom ASC")->fetchAll();

// Charger les pays
require_once __DIR__ . '/../../include/pays.php';
?>
<div id="participant-form">
    <div class="card bg-base-100 p-6 shadow mb-6">
        <h2 class="text-lg font-bold mb-3">🔍 Rechercher un participant</h2>

        <input
            type="text"
            name="q"
            placeholder="Nom ou prénom..."
            class="input input-bordered w-full"
            hx-get="search.php"
            hx-trigger="keyup changed delay:300ms"
            hx-target="#search-results"
            hx-indicator=".htmx-indicator"
        >

        <div class="htmx-indicator mt-2 text-sm opacity-70">
            Recherche...
        </div>

        <div id="search-results" class="mt-3"></div>
    </div>


    <div class="card bg-base-100 shadow-xl p-10 border border-base-300">

        <h1 class="text-3xl font-bold mb-8">✏ Modifier un participant</h1>
        
          <?php if ($errors): ?>
    <div class="alert alert-error mb-4">
      <ul class="list-disc list-inside">
        <?php foreach ($errors as $e): ?>
          <li><?= htmlspecialchars($e) ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>


        <form action="edit.php?id=<?= $id ?>" method="POST" class="space-y-6">

            <?php
            // Traitement du POST
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $nom = trim($_POST['nom']);
                $prenom = trim($_POST['prenom']);
                $genre = $_POST['genre'] ?? '';
                $categorie = (int) $_POST['categorie'];
                $club = trim($_POST['club']);
                $nationalite = $_POST['nationalite'] ?? null;
                $dossard = !empty($_POST['dossard']) ? (int) $_POST['dossard'] : null;
                $uci = trim($_POST['uci']);
                $non_partant = isset($_POST['non_partant']) ? 1 : 0;

                try {
                    $sql = "UPDATE participants 
                            SET nom=?, prenom=?, genre=?, categorie_id=?, club=?, nationalite=?, 
                                dossard=?, uci=?, non_partant=?
                            WHERE id=?";

                    $q = $db->prepare($sql);
                    $q->execute([
                        $nom, $prenom, $genre, $categorie, $club, $nationalite,
                        $dossard, $uci, $non_partant, $id
                    ]);

                    $_SESSION['flash'] = ['type' => 'success', 'message' => 'Participant modifié avec succès !'];
                    header("Location: list.php");
                    exit;

                } catch (PDOException $e) {
                    $_SESSION['flash'] = [
                    'type' => 'error',
                    'message' => "Ce dossard est déjà attribué à un autre participant."
                ];
                    header("Location: edit.php?id=$id");
                    exit;
                }

            }
            ?>

            <!-- Identité -->
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <label class="font-semibold">Nom *</label>
                    <input name="nom" class="input input-bordered w-full"
                        value="<?= htmlspecialchars($participant['nom']) ?>" required>
                </div>

                <div>
                    <label class="font-semibold">Prénom *</label>
                    <input name="prenom" class="input input-bordered w-full"
                        value="<?= htmlspecialchars($participant['prenom']) ?>" required>
                </div>
            </div>

            <!-- Genre -->
            <div>
                <label class="font-semibold block mb-2">Genre *</label>

                <div class="flex gap-6">
                    <?php
                    $genres = ["Homme", "Femme", "Mixte"];
                    foreach ($genres as $g): ?>
                        <label class="flex items-center gap-2">
                            <input type="radio" name="genre" value="<?= $g ?>"
                                <?= $participant['genre'] === $g ? 'checked' : '' ?> required>
                            <?= $g ?>
                        </label>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Catégorie & Club -->
            <div class="grid grid-cols-2 gap-6">

                <div>
                    <label class="font-semibold">Course *</label>
                    <select name="categorie" class="select select-bordered w-full" required>
                        <option value="">-- Sélectionné une course --</option>

                        <?php foreach ($cats as $c): ?>
                            <option value="<?= $c['id'] ?>"
                                <?= $participant['categorie_id'] == $c['id'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($c['nom']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <label class="font-semibold">Club</label>
                    <input name="club" class="input input-bordered w-full"
                        value="<?= htmlspecialchars($participant['club']) ?>">
                </div>

            </div>

            <!-- Nationalité -->
            <div class="form-control">
                <label class="label"><span class="label-text font-semibold">Nationalité *</span></label>

                <select name="nationalite" class="select select-bordered w-full">
                    <option value="">-- Sélectionner --</option>

                    <?php foreach ($countries as $code => $label): ?>
                        <option value="<?= $code ?>"
                            <?= ($participant['nationalite'] === $code) ? 'selected' : '' ?>>
                            <?= $label ?>
                        </option>
                    <?php endforeach; ?>
                </select>

            </div>

            <!-- Dossard & UCI -->
            <div class="grid grid-cols-2 gap-6">

                <div>
                    <label class="font-semibold">Dossard</label>
                    <input type="number" name="dossard"
                        class="input input-bordered w-full"
                        value="<?= htmlspecialchars($participant['dossard']) ?>">
                </div>

                <div>
                    <label class="font-semibold">Code UCI</label>
                    <input name="uci" class="input input-bordered w-full"
                        value="<?= htmlspecialchars($participant['uci']) ?>">
                </div>

            </div>

            <!-- Non partant -->
            <label class="flex items-center gap-2">
                <input type="checkbox" name="non_partant"
                    <?= $participant['non_partant'] ? 'checked' : '' ?>>
                Non partant
            </label>

            <!-- Boutons -->
            <div class="flex justify-between mt-6">
                <a href="list.php" class="btn btn-neutral">Annuler</a>
                <button class="btn btn-primary">💾 Enregistrer</button>
            </div>

        </form>
    </div>
</div>

<?php require_once __DIR__ . '/../../include/footer.php'; ?>
