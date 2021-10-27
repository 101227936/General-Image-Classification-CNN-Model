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

        <!-- Sweet Alert-->
        <link href="template/Template/Admin/dist/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

		<!-- App css -->
		<link href="template/Template/Admin/dist/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
		<link href="template/Template/Admin/dist/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

		<link href="template/Template/Admin/dist/assets/css/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
		<link href="template/Template/Admin/dist/assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet"  disabled />

		<!-- icons -->
		<link href="template/Template/Admin/dist/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body data-layout-mode="horizontal">
        <!-- Begin page -->
        <div id="wrapper">
            <?php include "topbar.php";?>
        
            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            <div class="content-page" style="margin:15px !important;">
                <div class="content">
                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
									<div class="page-title-right">
										<ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item active">Load Model</li>
											<?php
											$num = count(glob("model/".$_GET['id']. "/*"));
											if($num!=0)
											{
											?>
												<li class="breadcrumb-item"><a href="image_predict_load_model.php">Predict</a></li>
											<?php
											}
											?>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Load Model</h4>
								</div>
                            </div>
                        </div>
                        <!-- end page title --> 
						
                        <div class="row">
                            <div class="col-lg-12 col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
												<div class="col-md-12 col-sm-12" style="padding-left:0px;">
                                                    <i class="fas fa-question-circle" style="padding-right:5px;margin-bottom:7px;" title="Upload the model to do prediction, only accept zip file downloaded from our website" data-plugin="tippy" data-tippy-placement="right-start" data-tippy-maxWidth="200px" data-tippy-offset="0, 0"></i>
                                                    <h3 class="header-title" style="display: inline-block;">Upload Model</h3>
												</div>
                                                <form action="upload_model.php?id=<?=$_GET['id']?>" name="image_predict" id="image_predict" enctype="multipart/form-data" method="post" data-parsley-validate=""> 
                                                    <input name="file" type="file" accept=".zip" id="file" data-plugins="dropify" data-height="300" />
                                                    <button type="button" id='btn_load' class="btn btn-primary btn-block waves-effect waves-light float-end" style="margin-top:30px;">Load Model</button>
                                                </form>
                                            </div>
                                        </div> <!-- end row -->
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div><!-- end col -->
                        </div><!-- end row -->
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

        <!-- Sweet Alerts js -->
        <script src="template/Template/Admin/dist/assets/libs/sweetalert2/sweetalert2.min.js"></script>

        <!-- Sweet alert init js-->
        <script src="template/Template/Admin/dist/assets/js/pages/sweet-alerts.init.js"></script>


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
                    Swal.fire({
                        title: 'Failure',
                        text: 'Please upload the model zip file downloaded from our website.',
                        type: 'error',
                        confirmButtonColor: '#6658dd',
                        backdrop:'#eeeff3',
                        allowOutsideClick: false,
                        animation:true
                    });
                }
            });
        </script>
        
        <script>
            if(window.location.href.includes('?'))
            {
                <?php
                $num = count(glob("model/" .$_GET['id']. "/*"));
                if($num!=0)
                {
                ?>
                    swal({
                    title: 'Are you sure?',
                    text: 'You will lost all the unsaved model summary and the prediction result.',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#6658dd',
                    backdrop:'#eeeff3',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes',
                    allowOutsideClick: false,
                    animation:true,
                    }).then(function (result) {
                        if (result.value)
                        {
                            $.ajax(
                            'delete_files.php?id=<?=$_GET['id']?>',
                            {
                                success: function() {
                                    location.reload();
                                },
                                error: function() {
                                }
                            }
                            );
                        }
                        else
                        {
                            window.location.href="home.php";
                        }
                    })
                <?php
                }
                ?>
            }
        </script>

    </body>
</html>


