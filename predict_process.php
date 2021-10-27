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
	error_reporting(0);
	$proc = $_REQUEST['proc'];
	if(!empty($_FILES["image"]))
	{
        
        $folder = "./model/".$_GET['id'];
		if (!empty($_FILES)) 
		{
			$tmpFile = $_FILES['image']['tmp_name'];
			$ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
			
			if($ext == 'nii')
			{
				$filename = $_FILES['image']['name'];
				move_uploaded_file($tmpFile,$filename);

				$command = escapeshellcmd('python nii2png.py -i '.$_FILES['image']['name'].' -o '.$folder);
				$output = shell_exec($command);
				unlink($filename);
				$filename = $folder.'/'.trim($output);
			}else if($ext == "jpg" || $ext == "png" || $ext == "jpeg")
			{
				$filename = $folder.'/'.time().end(explode(".", $_FILES['image']['name']));
				move_uploaded_file($tmpFile,$filename);
			}else{}
		}
		$files = scandir($folder);
		$firstFile = $files[2];
		$command = "python predict.py ".$folder.'/'.$firstFile." ".$_GET['id'];

		$output=[];
		$retval=[];
		ini_set('max_execution_time', 0);
		
		$result = exec($command, $output, $retval);
		$result_array = json_decode($result);

        unlink($filename);
		
		if($result != null)
		{
			if($proc == "load")
			{
				?>
					<script>
						$(document).ready(function() {
							Swal.fire({ 
								title: 'Success', 
								text: 'Image Predict Successful', 
								type: 'success', 
								confirmButtonColor: '#6658dd', 
								backdrop:'#eeeff3', 
								allowOutsideClick: false, 
								animation:true, 
							}).then(function(){ 
								window.location.href="image_predict_load_model.php";
							})
						});
					</script>
				<?php
			}else if($proc == "train")
			{
				?>
					<script>
						$(document).ready(function() {
							Swal.fire({ 
								title: 'Success', 
								text: 'Image Predict Successful', 
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
			}
		}else
		{
			?>
				<script>
					$(document).ready(function() {
						Swal.fire({ 
							title: 'Failure',
							html: 'There have some error occur.<br> You may try to upload the predict image again.',
							icon: 'error',
							confirmButtonColor: '#6658dd',
							backdrop:'#eeeff3',
							cancelButtonColor: '#d33',
							confirmButtonText: 'Yes',
							allowOutsideClick: false,
							animation:true,
						}).then(function(){ 
							window.location.href="image_predict_train_model.php";
						})
					});
				</script>
			<?php
		}
	}
	else die(header("HTTP/1.0 403 Forbidden"));
?>	


