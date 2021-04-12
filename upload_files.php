<?php
	if(!empty($_POST["name"]))
	{
		$folder = "./uploads/".$_POST['name'];
		mkdir($folder);
		
		if (!empty($_FILES)) {
		 $tmpFile = $_FILES['file']['tmp_name'];
		 $filename = $folder.'/'.time().'-'. $_FILES['file']['name'];
		 move_uploaded_file($tmpFile,$filename);
		}
	}
	else die(header("HTTP/1.0 403 Forbidden"));
	
	
?>