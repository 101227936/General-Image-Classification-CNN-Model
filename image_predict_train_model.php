<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Image Predict - Image Classification System</title>
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

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Image Predict</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-lg-3 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
												<div class="col-md-12 col-sm-12" style="padding-left:0px;">
													<i class="fas fa-question-circle" style="padding-right:5px;margin-bottom:7px;" title="Upload your image to do prediction" data-plugin="tippy" data-tippy-placement="right-start" data-tippy-maxWidth="200px" data-tippy-offset="0, 0"></i>
													<h3 class="header-title" style="display: inline-block;">Preview</h3>
													<div id="class_list" style="max-height: 335px; overflow-y: auto;"></div>
												</div>
                                                <form action="predict_process.php" name="image_predict" id="image_predict" method="post" data-parsley-validate=""> 
                                                    <input type="file" data-plugins="dropify" data-max-file-size="1M" accept="image/*" data-height="300">
                                                    <button type="submit" form="image_predict" id='btn_predict' class="btn btn-primary btn-block waves-effect waves-light float-end" style="margin-top:40px;">Predict Image</button>
                                                </form>
                                                <form method='post' action='zip_process.php' name="export_model" id="export_model">
                                                    <button type="submit" form="export_model" name="export" id='btn_export' class="btn btn-primary btn-block waves-effect waves-light float-end" style="margin-top:40px;">Export Model</button>
                                                </form>
                                            </div>
                                        </div> <!-- end row -->
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div><!-- end col -->

							<div class="col-lg-4 col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
												<div class="col-md-12 col-sm-12" style="padding-left:0px;">
													<i class="fas fa-question-circle" style="padding-right:5px;margin-bottom:7px;" title="Show the result of prediction" data-plugin="tippy" data-tippy-placement="right-start" data-tippy-maxWidth="200px" data-tippy-offset="0, 0"></i>
													<h3 class="header-title" style="display: inline-block;">Output</h3>
													<div id="class_list" style="max-height: 335px; overflow-y: auto;"></div>
												</div>
												<img src="model/result.jpeg" alt="result.png" class="img-fluid" style="height:470px; display: block;margin-left: auto;margin-right: auto;">
											</div>
                                           
                                        </div> <!-- end row -->

                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div><!-- end col -->

							<div class="col-lg-5 col-xl-5">
                                <div class="card-box">
                                    <ul class="nav nav-pills navtab-bg nav-justified">
                                        <li class="nav-item">
                                            <a href="#report" data-toggle="tab" aria-expanded="false" class="nav-link active">
												Classification Report	
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="#accuracy" data-toggle="tab" aria-expanded="true" class="nav-link">
                                               Accuracy and Loss
                                            </a>
                                        </li>
										
										<li class="nav-item">
                                            <a href="#roc" data-toggle="tab" aria-expanded="false" class="nav-link">
												ROC<br>Curve
                                            </a>
                                        </li>
										<li class="nav-item">
                                            <a href="#cm" data-toggle="tab" aria-expanded="false" class="nav-link">
												Confusion Matrix	
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" style="padding:0px !important;margin-top:10px;font-family:monospace;" >
                                        <div class="tab-pane" id="accuracy">
											<div class="row">
												<div class="col-lg-12">
													<div class="form-group" style="overflow-y: scroll; height:410px;">
                                                        <img src="model/accuracy.png" alt="accuracy" class="img-fluid" style="height:400px; display: block;margin-left: auto;margin-right: auto;">
                                                        <div class="accordion custom-accordion" id="custom-accordion-one">
                                                            <div class="card mb-0">
                                                                <div class="card-header" id="headingSeven">
                                                                    <h5 class="m-0 position-relative">
                                                                        <a class="custom-accordion-title text-reset d-block"
                                                                            data-toggle="collapse" href="#collapseSeven"
                                                                            aria-expanded="true" aria-controls="collapseSeven">
                                                                            Accuracy <i class="mdi mdi-chevron-down accordion-arrow"></i>
                                                                        </a>
                                                                    </h5>
                                                                </div>
                                                                <div id="collapseSeven" class="collapse show"
                                                                    aria-labelledby="headingSeven"
                                                                    data-parent="#custom-accordion-one">
                                                                    <div class="card-body">
                                                                        Accuracy is the percentage of classification that a model gets right during training. If the modal prediction is perfect, the accuracy will be one, else the accuracy is below one.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <img src="model/loss.png" alt="loss" class="img-fluid" style="height:400px; display: block;margin-left: auto;margin-right: auto;">
                                                        <div class="accordion custom-accordion" id="custom-accordion-one">
                                                            <div class="card mb-0">
                                                                    <div class="card-header" id="headingEight">
                                                                        <h5 class="m-0 position-relative">
                                                                            <a class="custom-accordion-title text-reset d-block"
                                                                                data-toggle="collapse" href="#collapseEight"
                                                                                aria-expanded="true" aria-controls="collapseEight">
                                                                                Loss <i class="mdi mdi-chevron-down accordion-arrow"></i>
                                                                            </a>
                                                                        </h5>
                                                                    </div>
                                                                    <div id="collapseEight" class="collapse show"
                                                                        aria-labelledby="headingSeven"
                                                                        data-parent="#custom-accordion-one">
                                                                        <div class="card-body">
                                                                            Loss is a measure for evaluating how well a model learned to predict the right classifications for a given set of samples.
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                        </div>  
                                                    </div>
												</div>
											</div> <!-- end row -->
                                        </div>

										<div class="tab-pane" id="roc">
											<div class="row">
											    <div class="col-lg-12">
                                                    <div class="form-group" style="overflow-y: scroll; height:410px;">
                                                        <img src="model/roc.png" alt="Roc.png" class="img-fluid" style="height:400px; display: block;margin-left: auto;margin-right: auto;">
                                                        <div class="accordion custom-accordion" id="custom-accordion-one">
                                                            <div class="card mb-0">
                                                                <div class="card-header" id="headingNine">
                                                                    <h5 class="m-0 position-relative">
                                                                        <a class="custom-accordion-title text-reset d-block"
                                                                            data-toggle="collapse" href="#collapseNine"
                                                                            aria-expanded="true" aria-controls="collapseNine">
                                                                            ROC Curve <i class="mdi mdi-chevron-down accordion-arrow"></i>
                                                                        </a>
                                                                    </h5>
                                                                </div>
                                                                <div id="collapseNine" class="collapse show"
                                                                    aria-labelledby="headingSeven"
                                                                    data-parent="#custom-accordion-one">
                                                                    <div class="card-body">
                                                                        ROC curve shows the trade-off between sensitivity (or TPR) and specificity (1 – FPR). Classifiers that give curves closer to the top-left corner indicate a better performance. The closer the curve comes to the 45-degree diagonal of the ROC space, the less accurate the test.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
												</div>
											</div> <!-- end row -->
                                        </div>

										<div class="tab-pane" id="cm">
											<div class="row">
												<div class="col-lg-12">
                                                    <div class="form-group" style="overflow-y: scroll; height:410px;">
														<img src="model/cm.png" alt="Confusion Matrix.png" class="img-fluid" style="height:400px; display: block;margin-left: auto;margin-right: auto;">
														<div class="accordion custom-accordion" id="custom-accordion-one">
                                                                <div class="card mb-0">
                                                                    <div class="card-header" id="headingTen">
                                                                        <h5 class="m-0 position-relative">
                                                                            <a class="custom-accordion-title text-reset d-block"
                                                                                data-toggle="collapse" href="#collapseTen"
                                                                                aria-expanded="true" aria-controls="collapseTen">
                                                                                Confusion Matrix <i class="mdi mdi-chevron-down accordion-arrow"></i>
                                                                            </a>
                                                                        </h5>
                                                                    </div>
                                                                    <div id="collapseTen" class="collapse show"
                                                                        aria-labelledby="headingSeven"
                                                                        data-parent="#custom-accordion-one">
                                                                        <div class="card-body">
                                                                            Confusion Matrix summarizes how accurate the model's prediction are. User can use this to figure out which classes the model gets confused about.                                                                        </div>
                                                                        </div>
                                                                </div>
                                                        </div>
													</div>
												</div>
											</div> <!-- end row -->
                                        </div>

										<div class="tab-pane show active" id="report">
											<div class="row">
												<div class="col-lg-12">
													<div class="form-group" style="overflow-y: scroll;height:425px;margin-bottom:0px;">
                                                        <iframe id="iframe" name="iframe" src="model/report.txt" title="report" style="border:none;height:130px;"></iframe>
                                                        <div class="accordion custom-accordion" id="custom-accordion-one">
                                                            <div class="card mb-0">
                                                                <div class="card-header" id="headingOne">
                                                                    <h5 class="m-0 position-relative">
                                                                        <a class="custom-accordion-title text-reset d-block"
                                                                            data-toggle="collapse" href="#collapseOne"
                                                                            aria-expanded="true" aria-controls="collapseOne">
                                                                            Accuracy <i class="mdi mdi-chevron-down accordion-arrow"></i>
                                                                        </a>
                                                                    </h5>
                                                                </div>

                                                                <div id="collapseOne" class="collapse show"
                                                                    aria-labelledby="headingFour"
                                                                    data-parent="#custom-accordion-one">
                                                                    <div class="card-body">
                                                                        Accuracy is the percentage of classification that a model gets right during training. Higher the percentage, higher the model accuracy 
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="card mb-0">
                                                                <div class="card-header" id="headingTwo">
                                                                    <h5 class="m-0 position-relative">
                                                                        <a class="custom-accordion-title text-reset d-block"
                                                                            data-toggle="collapse" href="#collapseTwo"
                                                                            aria-expanded="true" aria-controls="collapseTwo">
                                                                            Precision <i class="mdi mdi-chevron-down accordion-arrow"></i>
                                                                        </a>
                                                                    </h5>
                                                                </div>

                                                                <div id="collapseTwo" class="collapse show"
                                                                    aria-labelledby="headingFour"
                                                                    data-parent="#custom-accordion-one">
                                                                    <div class="card-body">
                                                                        Precision is the ability of a classifier not to label an instance positive that is actually negative. The formula is TP/(TP + FP).
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="card mb-0">
                                                                <div class="card-header" id="headingThree">
                                                                    <h5 class="m-0 position-relative">
                                                                        <a class="custom-accordion-title text-reset d-block"
                                                                            data-toggle="collapse" href="#collapseThree"
                                                                            aria-expanded="true" aria-controls="collapseThree">
                                                                            Recall <i class="mdi mdi-chevron-down accordion-arrow"></i>
                                                                        </a>
                                                                    </h5>
                                                                </div>

                                                                <div id="collapseThree" class="collapse show"
                                                                    aria-labelledby="headingFour"
                                                                    data-parent="#custom-accordion-one">
                                                                    <div class="card-body">
                                                                        Recall is a measure of the classifier's completeness; the ability of a classifier to correctly find all positive instances.
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="card mb-0">
                                                                <div class="card-header" id="headingFour">
                                                                    <h5 class="m-0 position-relative">
                                                                        <a class="custom-accordion-title text-reset d-block"
                                                                            data-toggle="collapse" href="#collapseFour"
                                                                            aria-expanded="true" aria-controls="collapseFour">
                                                                            F-score <i class="mdi mdi-chevron-down accordion-arrow"></i>
                                                                        </a>
                                                                    </h5>
                                                                </div>

                                                                <div id="collapseFour" class="collapse show"
                                                                    aria-labelledby="headingFour"
                                                                    data-parent="#custom-accordion-one">
                                                                    <div class="card-body">
                                                                        F-score  is a measure of a test's accuracy. The highest possible value of an F-score is 1.0, indicating perfect precision and recall, and the lowest possible value is 0, if either the precision or the recall is zero.
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="card mb-0">
                                                                <div class="card-header" id="headingFive">
                                                                    <h5 class="m-0 position-relative">
                                                                        <a class="custom-accordion-title text-reset d-block"
                                                                            data-toggle="collapse" href="#collapseFive"
                                                                            aria-expanded="true" aria-controls="collapseFive">
                                                                            Score <i class="mdi mdi-chevron-down accordion-arrow"></i>
                                                                        </a>
                                                                    </h5>
                                                                </div>

                                                                <div id="collapseFive" class="collapse show"
                                                                    aria-labelledby="headingFour"
                                                                    data-parent="#custom-accordion-one">
                                                                    <div class="card-body">
                                                                        Score is the number of actual occurrences of the class in the specified dataset. Imbalanced score in the training data may indicate structural weaknesses in the reported scores of the classifier and could indicate the need for stratified sampling or rebalancing. Score doesn’t change between models but instead diagnoses the evaluation process.
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="card mb-0">
                                                                <div class="card-header" id="headingSix">
                                                                    <h5 class="m-0 position-relative">
                                                                        <a class="custom-accordion-title text-reset d-block"
                                                                            data-toggle="collapse" href="#collapseSix"
                                                                            aria-expanded="true" aria-controls="collapseSix">
                                                                            Error Rate <i class="mdi mdi-chevron-down accordion-arrow"></i>
                                                                        </a>
                                                                    </h5>
                                                                </div>

                                                                <div id="collapseSix" class="collapse show"
                                                                    aria-labelledby="headingFour"
                                                                    data-parent="#custom-accordion-one">
                                                                    <div class="card-body">
                                                                    Classification error rate is the proportion of instances misclassified over the whole set of instances. The lower the error rate, the better the model performance.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
													</div>
												</div>
											</div> <!-- end row -->
                                        </div>
                                    </div> <!-- end tab-content -->
                                </div> <!-- end card-box-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->  
                    </div> <!-- container -->
                </div> <!-- content -->
            </div>


                <!-- Footer Start -->
                <?php include "footer.php";?>
                <!-- end Footer -->
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

		<!-- Tippy js-->
		<script src="template/Template/Admin/dist/assets/libs/tippy.js/tippy.all.min.js"></script>

        <script>
            var iframe = document.getElementById("iframe");
            document.iframe.document.body.style.fontFamily = "Nunito";
            document.iframe.document.body.style.fontSize = "14px";
            document.iframe.document.body.style.color = "#6c757d";
        </script>

        <!-- Vendor js -->
        <script src="template/Template/Admin/dist/assets/js/vendor.min.js"></script>

        <!-- Plugins js -->
        <script src="template/Template/Admin/dist/assets/libs/dropzone/min/dropzone.min.js"></script>
        <script src="template/Template/Admin/dist/assets/libs/dropify/js/dropify.min.js"></script>

        <!-- Init js-->
        <script src="template/Template/Admin/dist/assets/js/pages/form-fileuploads.init.js"></script>

        <!-- App js -->
        <script src="template/Template/Admin/dist/assets/js/app.min.js"></script>

    </body>
</html>