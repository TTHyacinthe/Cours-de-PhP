<?php
$pdo = new PDO('sqlite:db.sqlite');
$sql = "select * from tasks where id = ?";
$stmt = $pdo->prepare($sql); // stmt = statement
$stmt->execute([
    $_GET['task'],
]);
$data = $stmt->fetch(PDO::FETCH_ASSOC); // fetch = récupérer une seule ligne
?>  

<!DOCTYPE html>
<html lang="fr" data-theme="emerald"> <!-- tu peux changer le thème ici -->
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modifier une tâche</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.css" rel="stylesheet" type="text/css" />
</head>

<body class="min-h-screen bg-base-200 flex items-center justify-center p-6">
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
  <div class="card w-full max-w-lg bg-base-100 shadow-2xl">
    <div class="card-body">
      <h2 class="text-xl font-bold mb-4">Modifier la tâche</h2>

<form action="update.php" method="POST" class="space-y-4">
    <input type="hidden" name="id" value="<?= htmlspecialchars($data['id']) ?>">

    <div>
        <label class="block font-semibold">Titre</label>
        <input type="text" name="title" class="input input-bordered w-full" value="<?= htmlspecialchars($data['title']) ?>" required>
    </div>
    <div>
        <label class="block font-semibold">Date d’échéance</label>
        <input type="date" name="due_date" class="input input-bordered w-full" value="<?= htmlspecialchars($data['due_date']) ?>">
    </div> 

    <div>
        <label class="block font-semibold">Description</label>
        <textarea name="description" class="textarea textarea-bordered w-full">
            <?= htmlspecialchars($data['description']) ?></textarea>
    </div>

    <div>
        <label class="block font-semibold">Priorité</label>
        <select name="priority" class="select select-bordered w-full">
            <option value="<?= $data['priority']?>" selected><?= ucfirst($data['priority']) ?></option>
            <option value="Basse" <?= $data['priority'] === 'Basse' ? 'selected' : '' ?>>Basse</option>
            <option value="Moyenne" <?= $data['priority'] === 'Moyenne' ? 'selected' : '' ?>>Moyenne</option>
            <option value="Haute" <?= $data['priority'] === 'Haute' ? 'selected' : '' ?>>Haute</option>
        </select>
    </div>

    <div>
        <label class="block font-semibold">Catégorie</label>
        <input type="text" name="category" class="input input-bordered w-full" value="<?= htmlspecialchars($data['category']) ?>">
    </div>

    

    <button type="submit" class="btn btn-success">Mettre à jour</button>
    <a href="index.php" class="btn btn-ghost">Annuler</a>
</form>
</body>
</html>
