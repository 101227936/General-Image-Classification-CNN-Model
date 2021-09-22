<!-- Sweet Alert-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<?php
	if(!empty($_POST["model_selection"])&&!empty($_POST["model_selection"])&&!empty($_POST["model_selection"])&&!empty($_GET['id']))
	{
		$command = "python train_model.py ".$_POST['model_selection']." ".$_POST['epoch_size']." ".$_POST['batch_size']." ".$_GET['id'];
		$output=[];
		$retval=[];
		ini_set('max_execution_time', 0);
		
		$result = exec($command, $output, $retval);
		$result_array = json_decode($result);

		$command2 = "python check.py ".$_GET['id'];
		$result2 = exec($command2);
		if($result2 == 'True')
		{
			header('Location: image_predict_train_model.php');
		}else if ($result2 == 'False')
		{
			$command3 = "python remove_file.py ".$_GET['id'];
			$result3 = exec($command3);
			//header('Location: training.php');
			?>
			<!--Diplay error message-->
			<script>
				$( document ).ready(function() {
					Swal.fire({
						title: 'Failure',
						html: 'There have some error occur.<br> You may try to lower the number of batch-size and train model again.',
						icon: 'error',
						confirmButtonColor: '#6658dd',
						backdrop:'#eeeff3',
						cancelButtonColor: '#d33',
						confirmButtonText: 'Yes',
						allowOutsideClick: false,
						animation:true,
					}).then(function (result) {
						if (result.value) {
							window.location.href="training.php";
						}
					})
				});
				</script>
			<?php
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


