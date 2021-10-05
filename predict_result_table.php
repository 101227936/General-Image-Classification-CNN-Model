<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Predict Result Page - Image Classification System</title>
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

    <body data-layout-mode="horizontal">
        <!-- Begin page -->
        <div id="wrapper">
                <?php include "topbar.php";?>

                <!-- ============================================================== -->
                <!-- Start Page Content here -->
                <!-- ============================================================== -->

                <div class="content-page" style="margin:15px !important;">
                    <div class="content">
                    
                        <!-- Start container-->
                        <div class="container-fluid">
                        
                            <!-- start page title -->
                            <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Overview Model Information</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- end page title --> 

                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="card">
                                        <div class="card-box">
                                            <h4 class="header-title">General Image</h4>
                                            <p class="sub-header">
                                            We classify 2 classes, each of them contains 150 image datasets.
                                            The size of the images is using 224 x 224 (Width x Height). 
                                            We have set the Epoch to 5 times and the batch-size is 32 to do training.
                                            <br>
                                            *The result may have different depends on different device.
                                        </p>
                                            
                                            <div class="table-responsive">
                                                <table class="table table-bordered mb-0">
                                                    <thead>
                                                    <tr>
                                                        <th>Pre-Trained Model</th>
                                                        <th>Overall Accuracy(avg)</th>
                                                        <th>Training Speed</th>
                                                        <th>Model File Size</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="text-center">
                                                    <tr>
                                                        <th scope="row">MobileNetV2</th>
                                                        <td>95%</td>
                                                        <td>50 sec</td>
                                                        <td>8.5 MB</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">EfficientNetB3</th>
                                                        <td>97%</td>
                                                        <td>2 min 04 sec</td>
                                                        <td>40 MB</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">InceptionV3</th>
                                                        <td>92%</td>
                                                        <td>1 min 13 sec</td>
                                                        <td>80 MB</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">DenseNet201</th>
                                                        <td>96%</td>
                                                        <td>3 min 09 sec</td>
                                                        <td>68 MB</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">ResNet50V2</th>
                                                        <td>97%</td>
                                                        <td>1 min 34 sec</td>
                                                        <td>86 MB</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">VGG16</th>
                                                        <td>87%</td>
                                                        <td>3 min 40 sec</td>
                                                        <td>54 MB</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Xception</th>
                                                        <td>94%</td>
                                                        <td>1 min 50 sec</td>
                                                        <td>76 MB</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div> <!-- end .table-responsive-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="card">
                                        <div class="card-box">
                                            <h4 class="header-title">Medical Image</h4>
                                            <p class="sub-header">
                                            We classify 2 classes, each of them contains 150 image datasets.
                                            The size of the images is using 224 x 224 (Width x Height). 
                                            We have set the Epoch to 5 times and the batch-size is 32 to do training.
                                            <br>
                                            *The result may have different depends on different device.
                                        </p>
                                            
                                            <div class="table-responsive">
                                                <table class="table table-bordered mb-0">
                                                    <thead>
                                                    <tr>
                                                        <th>Pre-Trained Model</th>
                                                        <th>Overall Accuracy(avg)</th>
                                                        <th>Training Speed</th>
                                                        <th>Model File Size</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="text-center">
                                                    <tr>
                                                        <th scope="row">MobileNetV2</th>
                                                        <td>76%</td>
                                                        <td>54 sec</td>
                                                        <td>8.5 MB</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">EfficientNetB3</th>
                                                        <td>76%</td>
                                                        <td>2 min</td>
                                                        <td>40 MB</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">InceptionV3</th>
                                                        <td>64%</td>
                                                        <td>1 min 40 sec</td>
                                                        <td>80 MB</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">DenseNet201</th>
                                                        <td>77%</td>
                                                        <td>2 min 50 sec</td>
                                                        <td>68 MB</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">ResNet50V2</th>
                                                        <td>75%</td>
                                                        <td>1 min 28 sec</td>
                                                        <td>86 MB</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">VGG16</th>
                                                        <td>70%</td>
                                                        <td>3 min 28 sec</td>
                                                        <td>54 MB</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Xception</th>
                                                        <td>74%</td>
                                                        <td>1 min 46 sec</td>
                                                        <td>76 MB</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div> <!-- end .table-responsive-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- container -->
                    </div> <!-- content -->
                </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

            <!-- Footer Start -->
            <?php include "footer.php";?>
            <!-- Footer Start -->
        </div>
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