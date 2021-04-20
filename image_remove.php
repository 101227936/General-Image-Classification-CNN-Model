<?php
	if(!empty($_POST["name"]))
	{
		if(count(glob(dirname($_POST["name"])."/*")) <= 50)
		{
			$response = array("Status"=>false, "Result"=>"Not more image allow to delete");
			echo json_encode($response);
		}
		elseif(unlink($_POST["name"])) 
		{
			if(count(glob(dirname($_POST["name"])."/*")) === 0) rmdir(dirname($_POST["name"]));
			$response = array("Status"=>true, "Result"=>"Image Deleted", "Count"=>count(glob(dirname($_POST["name"])."/*")));
			echo json_encode($response);
		}
		else 
		{
			$response = array("Status"=>false, "Result"=>"Image Not Found");
			echo json_encode($response);
		}
	}
	else die(header("HTTP/1.0 403 Forbidden"));
	
	
?>