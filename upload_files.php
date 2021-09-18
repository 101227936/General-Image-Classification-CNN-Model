<?php
	if(!empty($_POST["name"]))
	{
		$folder = "./uploads/".$_POST['name'];
		mkdir($folder);
		
		if (!empty($_FILES)) 
		{
			$tmpFile = $_FILES['file']['tmp_name'];
			$ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
			
			if($ext == 'nii')
			{
				$filename = $_FILES['file']['name'];
				move_uploaded_file($tmpFile,$filename);
				$command = escapeshellcmd('python nii2png.py -i '.$_FILES['file']['name'].' -o "'.$folder.'"');
				$output = shell_exec($command);
				unlink($filename);
			}else
			{
				$filename = $folder.'/'.time().'-'. str_replace("%","",$_FILES['file']['name']);
				move_uploaded_file($tmpFile,$filename);
			}
		}
	}
	else die(header("HTTP/1.0 403 Forbidden"));
	
	
?>