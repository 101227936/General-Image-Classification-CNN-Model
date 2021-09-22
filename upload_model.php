<?php
	if(!empty($_FILES["file"]))
	{
		$folder = "./model/".$_GET['id']."/";
		
		if (!empty($_FILES)) 
		{
			$name = $_FILES['file']['name'];
			$ext = pathinfo($name, PATHINFO_EXTENSION);
			$tmpFile = $_FILES['file']['tmp_name'];
			
			if($ext == 'zip')
			{
				$filename = $folder.'/'.'model.zip';
				move_uploaded_file($tmpFile,$filename);
				
				$command = "python unzip.py ".$_GET['id'];
				ini_set('max_execution_time', 0);
				$result = exec($command);

				if($result == 'True')
				{
					header('Location: image_predict_load_model.php');
				}else
				{
					?>
					
					<!-- App favicon -->
					<link rel="shortcut icon" href="Landing/Logo/faviconLogo.ico">

					<!-- Plugins css -->
					<link href="template/Template/Admin/dist/assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />
					<link href="template/Template/Admin/dist/assets/libs/dropify/css/dropify.min.css" rel="stylesheet" type="text/css" />

					<!-- Sweet Alert-->
					<link href="template/Template/Admin/dist/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

					<!-- App css -->
					<link href="template/Template/Admin/dist/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
					<link href="template/Template/Admin/dist/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

					<link href="template/Template/Admin/dist/assets/css/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
					<link href="template/Template/Admin/dist/assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet"  disabled />

					<!-- icons -->
					<link href="template/Template/Admin/dist/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

					<body>
					</body>
					<!-- Sweet Alerts js -->
					<script src="template/Template/Admin/dist/assets/libs/sweetalert2/sweetalert2.min.js"></script>

					<!-- Sweet alert init js-->
					<script src="template/Template/Admin/dist/assets/js/pages/sweet-alerts.init.js"></script>

					<script>
							Swal.fire({
								title: 'Failure',
								text: "This zip file is not supported.",
								type: 'error',
								backdrop:'#eeeff3',
								showConfirmButton: true,
								confirmButtonColor: '#6658dd',
								allowOutsideClick: false,
							}).then(function(){
								location.replace('load_model.php?id=<?=$_GET['id']?>');
								//die(header('Location: load_model.php'));
							});
						</script>
					<?php
				}
			}else die(header("HTTP/1.0 403 Forbidden"));
		}
	}
	else die(header("HTTP/1.0 403 Forbidden"));
?>