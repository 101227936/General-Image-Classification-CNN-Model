<?php
	date_default_timezone_set("Asia/Kuala_Lumpur");
	$command = "python zip.py ".$_GET['id'];

	ini_set('max_execution_time', 0);
	
	$result = exec($command);

	$filename = "./model/".$_GET['id']."/model.zip";
	
	if (file_exists($filename)) {
		header('Content-Type: application/zip');
		header('Content-Disposition: attachment; filename="'.date("Ymd_his")."_".basename($filename).'"');
		header('Content-Length: ' . filesize($filename));
	
		flush();				// clean the output buffer
		readfile($filename);	// download zip in local
		
		unlink($filename);		// created Zip file after download complete is just a waste of disk space, so delete the Zip file after download.

		exit();

		header('Location: image_predict_train_model.php');
	}
	
?>	


