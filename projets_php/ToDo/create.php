<!DOCTYPE html>
<html lang="fr" data-theme="emerald"> <!-- tu peux changer le thème ici -->
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajouter une tâche</title>
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
      <h2 class="text-2xl font-bold text-primary text-center mb-4">Ajouter une tâche</h2>

      <form action="store.php" method="POST" class="flex flex-col gap-4">

        <div class="form-control">
          <label class="label">
            <span class="label-text font-semibold">Titre</span>
          </label>
          <input 
            type="text" 
            name="title" 
            placeholder="Titre de la tâche" 
            required 
            class="input input-bordered w-full" 
          />
        </div>

        <div class="form-control">
          <label class="label">
            <span class="label-text font-semibold">Date limite</span>
          </label>
          <input 
            type="date" 
            name="due_date" 
            class="input input-bordered w-full" 
            required 
          />
        </div>

        <div class="form-control">
          <label class="label">
            <span class="label-text font-semibold">Description</span>
          </label>
          <textarea 
            name="description" 
            placeholder="Détails de la tâche..." 
            class="textarea textarea-bordered w-full"
          ></textarea>
        </div>

        <div class="form-control">
          <label class="label">
            <span class="label-text font-semibold">Priorité</span>
          </label>
          <select name="priority" class="select select-bordered w-full" required>
            <option disabled selected>Choisir la priorité</option>
            <option value="haute">haute</option>
            <option value="moyenne">moyenne</option>
            <option value="basse">basse</option>
          </select>
        </div>

        <div class="form-control">
          <label class="label">
            <span class="label-text font-semibold">Catégorie</span>
          </label>
          <input 
            type="text" 
            name="category" 
            class="input input-bordered w-full"
            required
          />
        </div>
       <div class="form-control mt-6 flex flex-row gap-3">
          <a href="index.php" class="btn btn-outline w-1/2"> Retour</a>
          <button type="submit" class="btn btn-primary w-1/2">Ajouter la tâche</button>
        </div>
      </form>
    </div>
  </div>

</body>
</html>
