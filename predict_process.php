<?php
	$proc = $_REQUEST['proc'];
	if(!empty($_FILES["image"]))
	{
        
        $folder = "./model";
		if (!empty($_FILES)) {
            $tmpFile = $_FILES['image']['tmp_name'];
            $filename = $folder.'/'.time().end(explode(".", $_FILES['image']['name']));
            move_uploaded_file($tmpFile,$filename);
		}
		$command = "python predict.py ".$filename;

		$output=[];
		$retval=[];
		ini_set('max_execution_time', 0);
		
		$result = exec($command, $output, $retval);
		$result_array = json_decode($result);

        unlink($filename);
		if($proc = "load")
		{
			header('Location: image_predict_load_model.php');
		}else if($proc = "train")
		{
			header('Location: image_predict_train_model.php');
		}
	}
	else die(header("HTTP/1.0 403 Forbidden"));
?>	


