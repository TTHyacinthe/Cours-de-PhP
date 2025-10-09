<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $voiture = [
        'peugeot' => 'Peugeot',
        'renault' => 'Renault',
        'fiat' => 'Fiat',
        'ford' => 'Ford',
        'mercedes' => 'Mercedes',
    ]
    ?>
        <!-- <form action="form_checkbox" method="post">
            <label>Voiture</label>
            <select name="voiture">
                <?php foreach($voiture as $key => $value): ?>
                    <option value="<?= $key ?>"><?= $value ?></option>
                <?php endforeach; ?>
            </select>
        </form>
    <form action="form_checkbox.php" method="post">

        <legend><b>Cocher vos preference : </b></legend>
            <input type="text" name="nom" placeholder="Nom" required><br />
            <input type="email" name="mail" placeholder="Entrer votre mail" required>
            <input type="checkbox" name="magazine[]" value="1" />Le bon<br />
            <input type="checkbox" name="magazine[]" value="2"/>La brute<br />
            <input type="checkbox" name="magazine[]" value="3"/>Le truand<br />
            <label>C'est moi ?</label>
                <div>
                    <input type="radio" name="moi" value="1" checked> Oui<br>
                    <input type="radio" name="moi" value="0"> Non<br>
                </div>
            <input type="submit" value="Envoyer" />  
    </form> -->
    <h1>Gestionnaire d'image</h1>
    <form action="form_checkbox.php" method="post" enctype="multipart/form-data">
        <label for="image">Choisir une image : </label>
        <input type="file" name="image" id="image" accept="image/*">
        <input type="submit" value="Envoyer">
    </form>
</body>
</html>