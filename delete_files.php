<?php
    $files = glob("model/" .$_GET['id']."/*");

    foreach($files as $file) {
        if(is_file($file)) 
            // Delete the given file
            unlink($file);
    }
?>