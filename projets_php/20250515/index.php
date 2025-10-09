<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Mon premier formulaire</h1>
    <form action="recup.php" method="post" enctype="multipart/form-data" id="form">
        <div>
            <label for="nom">Nom</label>
            <input type="text"  name="nom" id="nom" placeholder="Entré votre Nom" />
        </div>
        <br>
        <div>
            <label for="prenom">Prenom</label>
            <input type="text"  name="prenom" id="prenom" placeholder="Entré votre Prenom" />
        </div>
        <br>
        <div>
            <label for="age">Age</label>
            <input type="number"  name="age" id="age" placeholder="Entré votre age" min="0" />
        </div>
        
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" />
        <input type="submit" value="Envoyer" /> 

    </form>
</body>
</html>