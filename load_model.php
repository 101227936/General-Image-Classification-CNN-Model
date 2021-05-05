<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Load Model - Image Classification System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="Landing/Logo/faviconLogo.ico">

        <!-- Plugins css -->
        <link href="template/Template/Admin/dist/assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />
        <link href="template/Template/Admin/dist/assets/libs/dropify/css/dropify.min.css" rel="stylesheet" type="text/css" />

		<!-- App css -->
		<link href="template/Template/Admin/dist/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
		<link href="template/Template/Admin/dist/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

		<link href="template/Template/Admin/dist/assets/css/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
		<link href="template/Template/Admin/dist/assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet"  disabled />

		<!-- icons -->
		<link href="template/Template/Admin/dist/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body data-layout-mode=horizontal>

        <!-- Pre-loader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner">Loading...</div>
            </div>
        </div>
        <!-- End Preloader-->

        <!-- Begin page -->
        <div id="wrapper">
            <?php include "topbar.php";?>
        
            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            <?php
                $command = "python remove_model_file.py";
				ini_set('max_execution_time', 0);
				$result = exec($command);
                echo $result;
            ?>
            <div class="content-page" style="margin:15px; !important">
                <div class="content">
                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Load Model</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
						
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body" style="padding-bottom:5px;!important">										
										<div class="col-md-12 col-sm-12">
                                            <div class="col-lg-12 col-xl-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="col-md-12 col-sm-12" style="padding-left:0px;">
                                                                    <i class="fas fa-question-circle" style="padding-right:5px;margin-bottom:7px;" title="Upload your image to do prediction" data-plugin="tippy" data-tippy-placement="right-start" data-tippy-maxWidth="200px" data-tippy-offset="0, 0"></i>
                                                                    <h3 class="header-title" style="display: inline-block;">Preview</h3>
                                                                    <div id="class_list" style="max-height: 335px; overflow-y: auto;"></div>
                                                                </div>
                                                                <form action="upload_model.php" name="image_predict" id="image_predict" enctype="multipart/form-data" method="post" data-parsley-validate=""> 
                                                                    <input name="file" type="file" accept=".zip" id="file" data-plugins="dropify" data-height="300" />
                                                                    <button type="button" id="btn_load" class="btn btn-primary btn-lg btn-block waves-effect waves-light float-end">Load Model</button>
                                                                </form>
                                                                
                                                            </div>
                                                        </div> <!-- end row -->
                                                    </div> <!-- end card-body-->
                                                </div> <!-- end card-->
                                            </div><!-- end col -->
										</div>
										<!-- Preview -->                                                
                                        <div class="dropzone-previews mt-3" id="file-previews" style="margin-top:0.7rem !important; max-height: 328px; overflow-y: auto;"></div>
                                    
									</div> <!-- end card-body-->

                                </div> <!-- end card-->
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->  

                       
                    </div> <!-- container -->
                </div> <!-- content -->

                <!-- Footer Start -->
                    <?php include "footer.php";?>
                <!-- end Footer -->
            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->
        </div>
        <!-- END wrapper -->

       <!-- Tippy js-->
		<script src="template/Template/Admin/dist/assets/libs/tippy.js/tippy.all.min.js"></script>
        
        <!-- Vendor js -->
        <script src="template/Template/Admin/dist/assets/js/vendor.min.js"></script>

        <!-- Plugins js -->
        <script src="template/Template/Admin/dist/assets/libs/dropzone/min/dropzone.min.js"></script>
        <script src="template/Template/Admin/dist/assets/libs/dropify/js/dropify.min.js"></script>
        <!-- Plugin js-->
        <script src="template/Template/Admin/dist/assets/libs/parsleyjs/parsley.min.js"></script>

        <!-- Init js-->
        <script src="template/Template/Admin/dist/assets/js/pages/form-fileuploads.init.js"></script>

        <!-- App js -->
        <script src="template/Template/Admin/dist/assets/js/app.min.js"></script>

        <script>
           $("#btn_load").click(function (e) {
                if($('#file').val()!="")
                {
                    $("#status").delay(500).fadeIn();
                    $("#preloader").delay(500).fadeIn("fast");

                    $( "#image_predict" ).submit();
                }
                else
                {
                    alert("Please Select ZIP FILEEEEEE!!!!!");
                }
            });
        </script>
    </body>
</html>


