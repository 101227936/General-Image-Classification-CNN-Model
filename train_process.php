<?php
	if(!empty($_POST["model_selection"])&&!empty($_POST["model_selection"])&&!empty($_POST["model_selection"]))
	{
		$command = "python train_model.py ".$_POST['model_selection']." ".$_POST['epoch_size']." ".$_POST['batch_size'];
		$output=[];
		$retval=[];
		ini_set('max_execution_time', 0);
		
		$result = exec($command, $output, $retval);
		$result_array = json_decode($result);

		$command2 = "python check.py";
		$result2 = exec($command2);
		if($result2 == 'True')
		{
			header('Location: image_predict_train_model.php');
		}else if ($result2 == 'False')
		{
			header('Location: training.php');

		}else
		{
			die(header("HTTP/1.0 403 Forbidden"));
		}

		//header('Location: image_predict_train_model.php');
	}

	else 
	{
		header('Location: training.php');
		//header('Location: image_predict_train_model.php');
		//die(header("HTTP/1.0 403 Forbidden"));
	}
?>	


