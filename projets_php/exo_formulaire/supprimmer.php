<?php
if (isset($_POST['file'])) {
    $file = $_POST['file'];
    if (file_exists($file) && strpos($file, 'images') === 0) {
        unlink($file);
    }
}
header("Location: index.php");
exit();
