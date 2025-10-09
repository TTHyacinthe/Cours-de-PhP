<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
            
                 $pointeur = opendir($_SERVER['DOCUMENT_ROOT']) or die('Erreur de listage : le répertoire n\'existe pas'); 
                    while($element = readdir($pointeur)) {
                            if($element != '.' && $element != '..') {
            
                                    echo $element."<br />";
                            }
                    }
            
                    closedir($dir);
                    // /**
                    // * Version Oo avec les classes de la SPL
                    // */
            
                    // foreach (new DirectoryIterator($_SERVER['DOCUMENT_ROOT']) as $fileInfo) {
                    //         /**
                    //          * isDot() vérifie le . et ..
                    //          */
                    //         if(!$fileInfo->isDot()){
            
                    //                 echo $fileInfo->getFilename() . "<br>\n";
                    //         }
                    // }
    ?>
   
</body>
</html>