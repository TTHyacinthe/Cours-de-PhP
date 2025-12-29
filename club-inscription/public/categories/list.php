<?php
require_once __DIR__ . '/../../include/db.php';
require_once __DIR__ . '/../../include/header.php';

$errors = [];

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

$stmt = $db->query("
  SELECT c.id, c.cle, c.nom,
         (
           SELECT COUNT(*)
           FROM participants p
           WHERE p.categorie_id = c.id
         ) AS participants
  FROM categories c
  ORDER BY c.nom COLLATE NOCASE
");

$categories = $stmt->fetchAll();

?>

<div class="card bg-base-100 shadow-lg border border-base-300 p-8">

  <div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Course</h1>
    <a href="add.php" class="btn btn-primary btn-sm">➕ Ajouter une course</a>
  </div>


  <?php if (!$categories): ?>
    <p class="opacity-70">Aucune course enregistrée.</p>

  <?php else: ?>
    <div class="overflow-x-auto">
      <table class="table table-zebra w-full">
        <thead>
          <tr>
            <th>Nom</th>
            <th>Participants</th>
            <th class="text-right">Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($categories as $c): ?>
          <tr>
            <td><?= htmlspecialchars($c['nom']) ?></td>
            <td><?= (int)$c['participants'] ?></td>
            <td class="text-right">
              <a href="edit.php?id=<?= $c['id'] ?>" class="btn btn-warning btn-sm text-black mr-2">
                ✏ Modifier
              </a>

              <a href="delete.php?id=<?= $c['id'] ?>" 
                 class="btn btn-error btn-sm"
                 onclick="return confirm('Supprimer cette course ?')">
                🗑 Supprimer
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
