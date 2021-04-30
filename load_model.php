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
        <!-- Begin page -->
        <div id="wrapper">
            <?php include "topbar.php";?>
        
            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
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
                                            <form action="upload_model.php" method="post" class="dropzone" style="min-height: 0px !important;" id="myAwesomeDropzone" name="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews"
												data-upload-preview-template="#uploadPreviewTemplate">
												<div class="fallback">
													<input name="file" type="file" accept=".h5,.zip"/>
												</div>
												<div class="dz-message needsclick" style="margin:5.5rem;!important">
													<i class="h1 dripicons-cloud-upload"></i>
													<h3>Drop files here or click to upload</h3>
													<span class="text-muted font-13">(Please upload the images with less than 1MB and maximum of 100 images allowed only)</span>
												</div>
											</form>
										</div>
										<!-- Preview -->                                                
                                        <div class="dropzone-previews mt-3" id="file-previews" style="margin-top:0.7rem !important; max-height: 328px; overflow-y: auto;"></div>
                                    
									</div> <!-- end card-body-->

									<div class="modal-footer" style="padding-top:0px;!important">
										<button type="button" id="btn_load" class="btn btn-primary btn-lg btn-block waves-effect waves-light float-end">Load Model</button>
									</div>
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

        <script>
            Dropzone.options.myAwesomeDropzone = {
                maxFiles: 1,
                acceptedFiles: ".zip,.h5",
                accept: function(file, done) {
                    console.log("uploaded");
                    done();
                },
                init: function() {
                    this.on("maxfilesexceeded", function(file){
                        alert("You only can upload 1 file!");
                    });
                }
            };
        </script>
    </body>
</html>