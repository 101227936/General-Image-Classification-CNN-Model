<?php
	$command = "python zip.py";

	ini_set('max_execution_time', 0);
	
	$result = exec($command);

	$filename = "./model/model.zip";
	
	if (file_exists($filename)) {
		header('Content-Type: application/zip');
		header('Content-Disposition: attachment; filename="'.basename($filename).'"');
		header('Content-Length: ' . filesize($filename));
	
		flush();				// clean the output buffer
		readfile($filename);	// download zip in local
		
		unlink($filename);		// created Zip file after download complete is just a waste of disk space, so delete the Zip file after download.

		exit();

		header('Location: image_predict_train_model.php');
	}
	
?>	


