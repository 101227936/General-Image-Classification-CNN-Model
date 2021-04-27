<?php

	$filename = "./model/model.zip";
	$file_path = "./model/";
	$zip = new ZipArchive();
	$zip->open($filename, ZipArchive::CREATE);
	
	// Add file into zip
	$zip->addFile($file_path.'label.txt', 'label.txt');
	$zip->addFile($file_path.'accuracy.png', 'accuracy.png');
	$zip->addFile($file_path.'cm.png', 'cm.png');
	$zip->addFile($file_path.'loss.png', 'loss.png');
	$zip->addFile($file_path.'roc.png', 'roc.png');
	$zip->addFile($file_path.'model.h5', 'model.h5');
	
	$zip->close();
	
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


