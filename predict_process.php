<?php
	if(!empty($_FILES["image"]))
	{
        
        $folder = "./model";
		if (!empty($_FILES)) {
            $tmpFile = $_FILES['image']['tmp_name'];
            $filename = $folder.'/'.time().'-'. $_FILES['image']['name'];
            move_uploaded_file($tmpFile,$filename);
		}
		$command = "python predict.py ".$filename;

		$output=[];
		$retval=[];
		ini_set('max_execution_time', 0);
		
		$result = exec($command, $output, $retval);
		$result_array = json_decode($result);

        unlink($filename);

		header('Location: image_predict_train_model.php');
	}
	else die(header("HTTP/1.0 403 Forbidden"));
?>	


