<?php
require_once __DIR__ . '/../../include/db.php';
require_once __DIR__ . '/../../include/header.php';

// Récupération des participants
$stmt = $db->query("
    SELECT p.id, p.nom, p.prenom, p.genre, p.club, p.dossard,
           p.nationalite, c.nom AS categorie
    FROM participants p
    LEFT JOIN categories c ON c.id = p.categorie_id
    ORDER BY p.nom COLLATE NOCASE, p.prenom COLLATE NOCASE
");
$participants = $stmt->fetchAll();

// Flash
$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
?>

<div class="card bg-base-100 shadow-xl border border-base-300 p-8">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">🏁 Liste des Participants</h1>
        <a href="add.php" class="btn btn-primary btn-sm">➕ Ajouter</a>
    </div>

     <?php if ($errors): ?>
    <div class="alert alert-error mb-4">
      <ul class="list-disc list-inside">
        <?php foreach ($errors as $e): ?>
          <li><?= htmlspecialchars($e) ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>

    <?php if (!$participants): ?>
        <p class="opacity-70">Aucun participant inscrit pour le moment.</p>

    <?php else: ?>
        <div class="overflow-x-auto">
            <table class="table table-zebra w-full">
                <thead>
                    <tr>
                        <th>Dossard</th>
                        <th>Identité</th>
                        <th>Genre</th>
                        <th>Club</th>
                        <th>Nationalité</th>
                        <th>Catégorie</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>

                <tbody>
                <?php foreach ($participants as $p): ?>
                    <tr>
                        <td><?= $p['dossard'] ? "<strong>{$p['dossard']}</strong>" : "-" ?></td>

                        <td><?= htmlspecialchars($p['prenom']." ".$p['nom']) ?></td>

                        <td><?= htmlspecialchars($p['genre']) ?></td>

                        <td><?= $p['club'] ? htmlspecialchars($p['club']) : "-" ?></td>

                        <td>
                            <?php if ($p['nationalite']): ?>
                                <span class="flex items-center gap-2">
                                    <img src="https://flagcdn.com/24x18/<?= strtolower($p['nationalite']) ?>.png"
                                         class="rounded shadow" alt="">
                                    <?= htmlspecialchars(strtoupper($p['nationalite'])) ?>
                                </span>
                            <?php else: ?>
                                -
                            <?php endif; ?>
                        </td>

                        <td><?= $p['categorie'] ?: "-" ?></td>

                        <td class="text-right">
                            <a href="edit.php?id=<?= $p['id'] ?>" class="btn btn-warning btn-sm text-black">
                                ✏ Modifier
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>

            </table>
        </div>
    <?php endif; ?>

</div>

<?php require_once __DIR__ . '/../../include/footer.php'; ?>
