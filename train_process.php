<!-- App css -->
<link href="template/Template/Admin/dist/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
<link href="template/Template/Admin/dist/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />
<link href="template/Template/Admin/dist/assets/css/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
<link href="template/Template/Admin/dist/assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet"  disabled />

<!-- Sweet Alerts js & Sweet alert init js-->-->
<script src="template/Template/Admin/dist/assets/libs/sweetalert2/sweetalert2.min.js"></script>
<script src="template/Template/Admin/dist/assets/js/pages/sweet-alerts.init.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link href="template/Template/Admin/dist/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

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
		{?>
			<script>
				$(document).ready(function() {
					Swal.fire({ 
						title: 'Success', 
						text: 'Model Training Successful', 
						type: 'success', 
						confirmButtonColor: '#6658dd', 
						backdrop:'#eeeff3', 
						allowOutsideClick: false, 
						animation:true, 
					}).then(function(){ 
						window.location.href="image_predict_train_model.php";
					})
				});
			</script>
		<?php
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


