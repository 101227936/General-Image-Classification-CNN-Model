<?php
    $files = glob("model/" . "*");

    foreach($files as $file) {
        if(is_file($file)) 
            // Delete the given file
            unlink($file);
    }
?>