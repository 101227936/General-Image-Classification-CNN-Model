<?php
	if(!empty($_POST["name"]))
	{
		if(is_dir("uploads/".$_GET['id'].'/'.$_POST["name"])) 
		{
			$response = array("Status"=>true, "Result"=>"Class Name Duplicated");
			echo json_encode($response);
		}
		else 
		{
			$response = array("Status"=>false, "Result"=>"Class Name Not Exist");
			echo json_encode($response);
		}
	}
	else die(header("HTTP/1.0 403 Forbidden"));
	
?>	