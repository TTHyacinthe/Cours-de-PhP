<?php
require_once __DIR__ . '/../../include/db.php';
require_once __DIR__ . '/../../include/pays.php';

$id = (int)($_GET['id'] ?? 0);

$stmt = $db->prepare("SELECT * FROM participants WHERE id = ?");
$stmt->execute([$id]);
$p = $stmt->fetch();

if (!$p) {
    exit('<div class="alert alert-error">Participant introuvable</div>');
}

// catégories
$cats = $db->query("SELECT id, nom FROM categories ORDER BY nom ASC")->fetchAll();

?>

<div id="participant-form">
<form method="post" action="edit.php?id=<?= $p['id'] ?>" class="card bg-base-100 p-8 shadow border border-base-300">

<h2 class="text-xl font-bold mb-4">✏ Modifier le participant</h2>

<!-- Nom / Prénom -->
<div class="grid grid-cols-2 gap-6">
<div>
    <label class="font-semibold">Nom *</label>
    <input name="nom" class="input input-bordered w-full"
        value="<?= htmlspecialchars($p['nom']) ?>" required>
</div>

<div>
    <label class="font-semibold">Prénom *</label>
    <input name="prenom" class="input input-bordered w-full"
        value="<?= htmlspecialchars($p['prenom']) ?>" required>
</div>
</div>

<!-- Genre -->
<div class="mt-4">
<?php foreach (['Homme','Femme','Mixte'] as $g): ?>
    <label class="mr-4">
        <input type="radio" name="genre" value="<?= $g ?>" <?= $p['genre']===$g?'checked':'' ?>>
        <?= $g ?>
    </label>
<?php endforeach; ?>
</div>
<!-- Catégorie & Club -->
<div class="grid grid-cols-2 gap-6">

    <div>
        <label class="font-semibold">Course *</label>
        <select name="categorie" class="select select-bordered w-full" required>
            <option value="">-- Sélectionné une course --</option>
            <?php foreach ($cats as $c): ?>
                <option value="<?= $c['id'] ?>"
                    <?= $p['categorie_id'] == $c['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($c['nom']) ?>
                </option>
            <?php endforeach; ?>
        </select>
     </div>

    <div>
        <label class="font-semibold">Club</label>
        <input name="club" class="input input-bordered w-full"
            value="<?= htmlspecialchars($p['club']) ?>">
    </div>

</div>
<!-- Nationalité -->
<select name="nationalite" class="select select-bordered mt-4 w-full">
    <option value="">-- Nationalité --</option>
    <?php foreach ($countries as $code => $label): ?>
        <option value="<?= $code ?>" <?= $p['nationalite']===$code?'selected':'' ?>>
            <?= $label ?>
        </option>
    <?php endforeach; ?>
</select>


 <!-- Dossard & UCI -->
            <div class="grid grid-cols-2 gap-6">

                <div>
                    <label class="font-semibold">Dossard</label>
                    <input type="number" name="dossard"
                        class="input input-bordered w-full"
                        value="<?= htmlspecialchars($p['dossard']) ?>">
                </div>

                <div>
                    <label class="font-semibold">Code UCI</label>
                    <input name="uci" class="input input-bordered w-full"
                        value="<?= htmlspecialchars($p['uci']) ?>">
                </div>

            </div>

<!-- Non partant -->
            <label class="flex items-center gap-2">
                <input type="checkbox" name="non_partant"
                    <?= $p['non_partant'] ? 'checked' : '' ?>>
                Non partant
            </label>

<!-- Boutons -->
            <div class="flex justify-between mt-6">
                <a href="list.php" class="btn btn-neutral">Annuler</a>
                <button class="btn btn-primary">💾 Enregistrer</button>
            </div>

</form>
</div>
