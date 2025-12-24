<?php
require_once __DIR__ . '/../../include/db.php';
require_once __DIR__ . '/../../include/header.php';
require_once __DIR__ . '/../../include/pays.php';

// Récupération des catégories
$stmt = $db->query("SELECT id, nom FROM categories ORDER BY nom COLLATE NOCASE");
$categories = $stmt->fetchAll();

// Flash
$flash = $_SESSION["flash"] ?? null;
unset($_SESSION["flash"]);

// Valeurs pré-remplies si erreur
$old = $_SESSION["old"] ?? [];
unset($_SESSION["old"]);
?>

<div class="card bg-base-100 shadow-xl p-10 border border-base-300">

    <h1 class="text-3xl font-bold mb-6">Inscription d’un Participant</h1>


    <form action="add_process.php" method="post" class="space-y-6">

        <!-- Identité -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="form-control">
                <label class="label"><span class="label-text font-semibold">Nom *</span></label>
                <input type="text" name="nom" required
                       value="<?= htmlspecialchars($old['nom'] ?? '') ?>"
                       class="input input-bordered">
            </div>

            <div class="form-control">
                <label class="label"><span class="label-text font-semibold">Prénom *</span></label>
                <input type="text" name="prenom" required
                       value="<?= htmlspecialchars($old['prenom'] ?? '') ?>"
                       class="input input-bordered">
            </div>
        </div>

        <!-- Genre -->
        <div class="form-control">
            <label class="label"><span class="label-text font-semibold">Genre *</span></label>

            <div class="flex gap-6">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="genre" value="H"
                           <?= (isset($old['genre']) && $old['genre'] === "H") ? "checked" : "" ?>
                           class="radio radio-primary">
                    Homme
                </label>

                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="genre" value="F"
                           <?= (isset($old['genre']) && $old['genre'] === "F") ? "checked" : "" ?>
                           class="radio radio-primary">
                    Femme
                </label>

                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="genre" value="M"
                           <?= (isset($old['genre']) && $old['genre'] === "M") ? "checked" : "" ?>
                           class="radio radio-primary">
                    Mixte
                </label>
            </div>
        </div>

        <!-- Date de naissance -->
        <div class="form-control">
    <label class="label">
        <span class="label-text font-semibold">Date de naissance *</span>
    </label>
    <input type="date"
           name="date_naissance"
           class="input input-bordered"
           required>
</div>


        <!-- Nationalité -->
        <div class="form-control">
            <label class="label"><span class="label-text font-semibold">Nationalité *</span></label>

            <select name="nationalite" required class="select select-bordered">
                <option value="">-- Sélectionner un pays --</option>

                <?php foreach ($countries as $code => $label): ?>
                    <option value="<?= $code ?>"
                        <?= (isset($old['nationalite']) && $old['nationalite'] === $code) ? "selected" : "" ?>>
                        <?= $label ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Club -->
        <div class="form-control">
            <label class="label"><span class="label-text font-semibold">Club</span></label>
            <input type="text" name="club"
                   value="<?= htmlspecialchars($old['club'] ?? '') ?>"
                   class="input input-bordered">
        </div>

        <!-- Catégorie -->
        <div class="form-control">
            <label class="label"><span class="label-text font-semibold">Course *</span></label>

            <select name="categorie_id" required class="select select-bordered">
                <option value="">-- Sélectionné une course --</option>

                <?php foreach ($categories as $c): ?>
                    <option value="<?= $c['id'] ?>"
                        <?= (isset($old['categorie_id']) && $old['categorie_id'] == $c['id']) ? "selected" : "" ?>>
                        <?= htmlspecialchars($c['nom']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Non partant -->
        <label class="flex items-center gap-3 cursor-pointer mt-2">
            <input type="checkbox" name="non_partant"
                <?= isset($old['non_partant']) ? "checked" : "" ?>
                class="checkbox checkbox-error">
            <span class="label-text font-semibold">Non partant</span>
        </label>

        <!-- Bouton -->
         <div class="flex justify-between mt-6">
                <a href="add.php" class="btn btn-neutral">Réinitialiser</a>
                <button class="btn btn-primary">💾 Enregistrer</button>
            </div>
    </form>
</div>

<?php require_once __DIR__ . '/../../include/footer.php'; ?>
