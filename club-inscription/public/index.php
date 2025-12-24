<?php
require_once __DIR__ . '/../include/db.php';
require_once __DIR__ . '/../include/header.php';
?>

<div class="card bg-base-100 p-10 shadow-xl border border-base-300">

  <h1 class="text-3xl font-bold mb-4">🏁 Chrono App</h1>

  <p class="opacity-75 mb-6">
    Application de gestion des inscriptions et catégories.
  </p>

  <div class="flex gap-4">
    <a href="/categories/list.php" class="btn btn-primary">Catégories</a>
    <a href="/participants/list.php" class="btn btn-neutral">Participants</a>
    <a href="/participants/add.php" class="btn btn-accent">Nouvelle inscription</a>
  </div>

</div>

<?php require_once __DIR__ . '/../include/footer.php'; ?>
