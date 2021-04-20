<?php
	function rmdir_recursive($dir) {
		foreach(scandir($dir) as $file) {
			if ('.' === $file || '..' === $file) continue;
			if (is_dir("$dir/$file")) rmdir_recursive("$dir/$file");
			else unlink("$dir/$file");
		}
		rmdir($dir);
	}

	if(!empty($_POST["name"]))
	{
		
		if(is_dir("uploads/".$_POST["name"])) 
		{
			$folder = "./uploads/".$_POST["name"];
			rmdir_recursive($folder);
			$response = array("Status"=>true, "Result"=>"Class Name Deleted");
			echo json_encode($response);
		}
		else 
		{
			$response = array("Status"=>false, "Result"=>"Class Name Not Found");
			echo json_encode($response);
		}
	}
	else die(header("HTTP/1.0 403 Forbidden"));
	
	
?>