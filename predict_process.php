<?php
	$proc = $_REQUEST['proc'];
	if(!empty($_FILES["image"]))
	{
        
        $folder = "./model/".$_GET['id'];
		if (!empty($_FILES)) 
		{
			$tmpFile = $_FILES['image']['tmp_name'];
			$ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
			
			if($ext == 'nii')
			{
				$filename = $_FILES['image']['name'];
				move_uploaded_file($tmpFile,$filename);

				$command = escapeshellcmd('python nii2png.py -i '.$_FILES['image']['name'].' -o '.$folder);
				$output = shell_exec($command);
				unlink($filename);
				$filename = $folder.'/'.trim($output);
			}else if($ext == "jpg" || $ext == "png" || $ext == "jpeg")
			{
				$filename = $folder.'/'.time().end(explode(".", $_FILES['image']['name']));
				move_uploaded_file($tmpFile,$filename);
			}else{}
		}
		$files = scandir($folder);
		$firstFile = $files[2];
		$command = "python predict.py ".$folder.'/'.$firstFile." ".$_GET['id'];

		$output=[];
		$retval=[];
		ini_set('max_execution_time', 0);
		
		$result = exec($command, $output, $retval);
		$result_array = json_decode($result);

        unlink($filename);
		if($proc == "load")
		{
			header('Location: image_predict_load_model.php');
		}else if($proc == "train")
		{
			header('Location: image_predict_train_model.php');
		}
	}
	else die(header("HTTP/1.0 403 Forbidden"));
?>	


