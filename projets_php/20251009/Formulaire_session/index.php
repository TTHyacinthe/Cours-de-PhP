<?php
session_start();
$message = [];
$nom = null;
$prenom = null;
if(isset ($_SESSION['msg'])){
    $message = $_SESSION['msg'];
    $nom = $_SESSION['nom'];
    $prenom = $_SESSION['prenom'];
    unset($_SESSION['nom']);
    unset($_SESSION['prenom']);
    unset($_SESSION['msg']);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Document</title>
</head>
<body>
    
<main class="container mx-auto p-4">
    <?php
    foreach($message as $msg):?>
    <div class="alert alert-info mb-4">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span><?php echo $msg; ?></span>
        </div>
    </div>
    <?php endforeach; ?>


    <form action="session.php" method="post">
        <label class="label" for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" value="<?php echo $nom ?? '' ?>">
        <br><br>
        <label class="label" for="prenom">Prenom:</label>
        <input type="text" id="prenom" name="prenom" class="input-" value="<?php echo $prenom ?? '' ?>">
        <br><br>
        <button class="btn btn-primary" type="submit">Envoyer</button>
    </form>
</main>
    
    
</body>
</html>

