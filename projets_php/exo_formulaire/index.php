<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <h1>Téléverser une image</h1>
    <form action="images.php" method="post" enctype="multipart/form-data">
        <input type="file" name="image" required>
        <button type="submit">Envoyer</button>
    </form>

    <h2>Images existantes</h2>
    <?php
    $files = glob("images/*.{jpg,jpeg,png,gif;webp}", GLOB_BRACE);
    foreach ($files as $file): ?>
        <div style="margin: 10px; display: inline-block; text-align: center;">
            <img src="<?= $file ?>" style="max-width: 200px;"><br>
            <form action="supprimmer.php" method="post">
                <input type="hidden" name="file" value="<?= $file ?>">
                <button type="submit" onclick="return confirm('Supprimer cette image ?')">Supprimer</button>
            </form>
        </div>
    <?php endforeach; ?>
</body>
</html>
