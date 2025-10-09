<?php
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$nbre_enfants = (int) $_POST['nbre_enfants'];
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Page 2</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f4f8;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      padding-top: 40px;
      margin: 0;
    }
    .formulaire {
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      max-width: 450px;   /* limite la largeur */
      width: 90%;         /* s’adapte à l’écran */
      box-sizing: border-box;
    }

    h1, h2, h3 {
      color: #333;
      margin-bottom: 10px;
    }
    label {
      display: block;
      margin: 8px 0 4px;
      font-weight: bold;
    }
    input[type="text"], input[type="number"] {
      width: 90%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 5px;
      margin-bottom: 5px;
    }
    input[type="submit"] {
      width: 100%;
      padding: 10px;
      background-color: #007BFF;
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #0cf504ff;
    }
    .parent-info {
      background-color: #eef2f7;
      padding: 10px;
      border-radius: 5px;
      margin-bottom: 15px;
    }
    .enfant {
      margin-bottom: 12px;
      padding: 8px;
      border: 1px solid #ddd;
      border-radius: 5px;
      background-color: #f9faff;
    }
  </style>
</head>
<body>
  <div class="formulaire">
    <h1>Infos parent</h1>
    <div class="parent-info">
      <p><b>Prénom :</b> <?php echo $prenom; ?></p>
      <p><b>Nombre d'enfants :</b> <?php echo $nbre_enfants; ?></p>
    </div>

    <h2>Informations enfants</h2>
    <form action="affichage.php" method="post">
      <input type="hidden" name="prenom" value="<?php echo $prenom; ?>">
      <input type="hidden" name="nbre_enfants" value="<?php echo $nbre_enfants; ?>">

      <?php
      for ($i = 1; $i <= $nbre_enfants; $i++) {
          echo "<div class='enfant'>";
          echo "<h3>Enfant $i</h3>";;
          echo "<label for='prenom_enfant_$i'>Prénom</label>";
          echo "<input type='text' id='prenom_enfant_$i' name='prenom_enfant[]'>";
          echo "<label for='age_enfant_$i'>Âge</label>";
          echo "<input type='number' id='age_enfant_$i' name='age_enfant[]'>";
          echo "</div>";
      }
      ?>
      <input type="submit" value="Envoyer">
    </form>
  </div>
</body>
</html>
