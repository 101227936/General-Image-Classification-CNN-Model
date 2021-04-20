<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Home Page - Image Classification System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="Landing/Logo/faviconLogo.ico">

        <!-- Plugins css -->
        <link href="template/Template/Admin/dist/assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />
        <link href="template/Template/Admin/dist/assets/libs/dropify/css/dropify.min.css" rel="stylesheet" type="text/css" />
        <link href="style.css" rel="stylesheet" type="text/css" />

		<!-- App css -->
		<link href="template/Template/Admin/dist/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
		<link href="template/Template/Admin/dist/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

		<link href="template/Template/Admin/dist/assets/css/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
		<link href="template/Template/Admin/dist/assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet"  disabled />

		<!-- icons -->
		<link href="template/Template/Admin/dist/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    </head>

    <body data-layout-mode=horizontal>
         <!-- Top Bar Start -->
        <?php include "topbar.php";?>
         <!-- Top Bar Start -->


        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
            <div class="content-page" style="margin:0px; !important">
                <div class="content">
                    <!-- Start container-->
                    <div class="container-fluid">
                    
                        <!-- start page title -->
                        <div class="row mt-4 mb-2">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">General Image Classification</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <!-- start row -->
                        <div class="row">

                            <!-- start column Model Training -->
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-body" style="padding-bottom:5px;!important">
										<div class="row">
                                    
												<i class="fas fa-question-circle" style="padding-right:5px;margin-bottom:7px;" title="Train your own model" data-plugin="tippy" data-tippy-placement="right-start" data-tippy-maxWidth="200px" data-tippy-offset="0, 0"></i>
												<h4 class="header-title" style="display: inline-block;" id="class_name" contenteditable="true">Model Training </h4>
													<div  style="margin:5.5rem;!important">
														<i class="h1 dripicons-lightbulb"></i>
														<h3>Model Training</h3>
														<span class="text-muted font-13">(Train your own general classification model with your own pre-trained model net, epoch and batch size by simply uploading your image datasets to the system)</span>
													</div>
                                                <button type="button" onclick="window.location.href='training.php'" class="btn btn-primary btn-lg btn-block" >Model Training</button>

										</div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end column Model Training -->
                           

                            <!-- start column Load Model -->
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-body" style="padding-bottom:5px;!important">
										<div class="row">
										
                                                <i class="fas fa-question-circle" style="padding-right:5px;margin-bottom:7px;" title="Upload your previous model training" data-plugin="tippy" data-tippy-placement="right-start" data-tippy-maxWidth="200px" data-tippy-offset="0, 0"></i>
												<h4 class="header-title" style="display: inline-block;" id="class_name" contenteditable="true">Load Model </h4>
													<div  style="margin:5.5rem;!important">
														<i class="h1 dripicons-upload"></i>
														<h3>Load Model</h3>
														<span class="text-muted font-13">(Load and upload your own previous trained model by using this system's model training functionality, you can easily load your pre-trained model without selecting thepre-trained model net, epoch and batch size )</span>
													</div>
                                                <button type="button" href=".php" class="btn btn-primary btn-lg btn-block">Load Model</button>

										</div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div><!-- end column Load Model -->
                            

                        </div><!-- end row -->  

                    </div> <!-- container -->
                </div> <!-- content -->
            </div>
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


        <!-- Footer Start -->
        <?php include "footer.php";?>
         <!-- Footer Start -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>
        
         <!-- Vendor js -->
         <script src="template/Template/Admin/dist/assets/js/vendor.min.js"></script>

         <!-- Tippy js-->
        <script src="template/Template/Admin/dist/assets/libs/tippy.js/tippy.all.min.js"></script>
		
        <!-- Plugins js -->
        <script src="template/Template/Admin/dist/assets/libs/dropzone/min/dropzone.min.js"></script>
        <script src="template/Template/Admin/dist/assets/libs/dropify/js/dropify.min.js"></script>

        <!-- App js -->
        <script src="template/Template/Admin/dist/assets/js/app.min.js"></script>
    </body>
</html>