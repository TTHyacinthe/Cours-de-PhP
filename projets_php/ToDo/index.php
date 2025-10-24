<?php
//$pdo = new PDO('sqlite:db.sqlite');

/**
 * Create table if not exists
 */
try {
    /**
     * connect to the database sqlite
     */
$pdo = new PDO('sqlite:db.sqlite');
$sql = "SELECT * from tasks order by id desc, completed asc";
$stmt = $pdo->prepare($sql); // stmt = statement
$stmt->execute();
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC); // fetchAll = récupérer toutes les lignes
// echo "<pre>";
// var_dump($tasks);
// echo "</pre>";
}catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// tableau ligne par ligne pour chaque tâche
// bon tableau avec daisyUI
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des tâches</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.0/dist/full.css" rel="stylesheet" type="text/css" />
</head>
<body class="bg-base-200 flex justify-center py-10">

<div class="overflow-x-auto w-3/4"> 

     <!-- Menu déroulant offrant la possibilité de choisir le théme de la page -->
                 <select id="theme-select" class="select select-bordered w-full max-w-xs">
                    <option disabled selected>Choisir un thème</option>
                    <option value="light">Light</option>
                    <option value="dark">Dark</option>
                    <option value="cupcake">Cupcake</option>
                    <option value="corporate">Corporate</option>
                    <option value="dracula">Dracula</option>
                </select>
                 <script>
                    document.getElementById('theme-select').addEventListener('change', (e) => {
                    document.documentElement.setAttribute('data-theme', e.target.value);
                    });
                </script> 
  <a href="create.php" class="btn btn-outline w-1/2"> New task</a>

  <!-- <button class="btn btn-outline btn-info">New task</button> -->
  <table class="table table-zebra w-full">
    <thead>
      <tr>
        <th>ID</th>
        <th>Titre</th>
        <th>Description</th>
        <th>Terminer</th>
        <th>Priorité</th>
        <th>Catégorie</th>
        <th>Date d'écheance</th>
        <th>Date de creation </th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($tasks as $task): ?>
      <?php $date = DateTime::createFromFormat('Y-m-d H:i:s', $task['created_at']); ?>
      <?php $date_due = DateTime::createFromFormat('Y-m-d', $task['due_date']); ?>
        <tr>
          <td><?= htmlspecialchars($task['id']) ?></td>
          <td><?= htmlspecialchars($task['title']) ?></td>
          <td><?= htmlspecialchars($task['description'] ?? '') ?></td>
          <td><a href="complete.php?task=<?php echo $task['id'] ?>" role="button">
              <?= $task['completed'] ?> 
              </a></td>
          <td><?= htmlspecialchars($task['priority'] ?? '') ?></td>
          <td><?= htmlspecialchars($task['category'] ?? '') ?></td>
          <td><?= $date_due->format('d-m-Y') ?></td>
          <td><?= $date->format ('d-m-Y') ?></td>
          <td>
            <a href="delete.php?task=<?php echo $task['id'] ?>" role="button"  class="btn btn-sm btn-error">Supprimer</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

</body>
</html>