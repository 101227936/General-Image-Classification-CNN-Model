<?php
	if(!empty($_FILES["file"]))
	{
		$folder = "./model/";
		
		if (!empty($_FILES)) 
		{
			$name = $_FILES['file']['name'];
			$ext = pathinfo($name, PATHINFO_EXTENSION);
			$tmpFile = $_FILES['file']['tmp_name'];
			
			if($ext == 'zip')
			{
				$filename = $folder.'/'.'model.zip';
				move_uploaded_file($tmpFile,$filename);
				
				$command = "python unzip.py";
				ini_set('max_execution_time', 0);
				$result = exec($command);

				if($result == 'True')
				{
					header('Location: image_predict_load_model.php');
				}else
				{
					die(header("Location: load_model.php"));
				}
			}else die(header("HTTP/1.0 403 Forbidden"));
		}
	}
	else die(header("HTTP/1.0 403 Forbidden"));
?>