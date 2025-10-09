<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Page 1</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f4f8;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .formulaire {
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      width: 300px;
    }
    h1 {
      text-align: center;
      color: #333;
    }
    label {
      display: block;
      margin: 10px 0 5px;
      font-weight: bold;
    }
    input[type="text"], input[type="number"] {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    input[type="submit"] {
      width: 100%;
      padding: 10px;
      margin-top: 15px;
      background-color: #007BFF;
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #00b32dff;
    }
  </style>
</head>
<body>
  <div class="formulaire">
    <h1>Formulaire parent</h1>
    <form action="enfants.php" method="post">
      <label for="nom">Nom</label>
      <input type="text" id="nom" name="nom">

      <label for="prenom">Prénom</label>
      <input type="text" id="prenom" name="prenom">

      <label for="nbre_enfants">Nombre d'enfants</label>
      <input type="number" id="nbre_enfants" name="nbre_enfants" min="0">

      <input type="submit" value="Envoyer">
    </form>
  </div>
</body>
</html>
