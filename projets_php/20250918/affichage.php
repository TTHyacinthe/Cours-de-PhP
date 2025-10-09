<?php
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$nbre_enfants = (int) $_POST['nbre_enfants'];
$nom_enfant = $_POST['nom_enfant'];
$prenom_enfant = $_POST['prenom_enfant'];
$age_enfant = $_POST['age_enfant'];
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Page 3</title>
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
      width: 350px;
    }
    h1, h2, h3 {
      color: #333;
      margin-bottom: 10px;
    }
    .parent, .enfant {
      background-color: #f9faff;
      padding: 10px;
      border-radius: 5px;
      margin-bottom: 12px;
      border: 1px solid #ddd;
    }
    p {margin: 5px 0;}
    .btn {
      display: block;
      text-align: center;
      background-color: #007BFF;
      color: white;
      padding: 10px;
      text-decoration: none;
      border-radius: 5px;
      margin-top: 15px;
    }
    .btn:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="formulaire">
    <h1>Récapitulatif</h1>

    <h2>Parent</h2>
    <div class="parent">
      <p><b>Nom :</b> <?php echo $nom; ?></p>
      <p><b>Prénom :</b> <?php echo $prenom; ?></p>
    </div>

    <h2>Enfants</h2>
    <?php
    if ($nbre_enfants == 0) {
        echo "<p>Aucun enfant</p>";
    } else {
        for ($i = 0; $i < $nbre_enfants; $i++) {
            echo "<div class='enfant'>";
            echo "<h3>Enfant ".($i+1)."</h3>";
            echo "<p><b>Prénom :</b> ".$prenom_enfant[$i]."</p>";
            echo "<p><b>Âge :</b> ".$age_enfant[$i]." ans</p>";
            echo "</div>";
        }
    }
    ?>
    <a class="btn" href="page1.php">Recommencer</a>
  </div>
</body>
</html>
