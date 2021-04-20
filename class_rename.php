<?php
	if(!empty($_POST["old_name"]) && !empty($_POST["new_name"]))
	{
		if(rename("uploads/".$_POST["old_name"], "uploads/".$_POST["new_name"])) 
		{
			$response = array("Status"=>true, "Result"=>"Class Name Updated");
			echo json_encode($response);
		}
		else 
		{
			$response = array("Status"=>false, "Result"=>"Class Name Not Updated");
			echo json_encode($response);
		}
	}
	else die(header("HTTP/1.0 403 Forbidden"));
	
?>	