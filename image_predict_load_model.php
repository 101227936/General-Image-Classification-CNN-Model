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
        
        <!-- Sweet Alert-->
		<link href="template/Template/Admin/dist/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
		
        <!-- App css -->
		<link href="template/Template/Admin/dist/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
		<link href="template/Template/Admin/dist/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

		<link href="template/Template/Admin/dist/assets/css/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
		<link href="template/Template/Admin/dist/assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet"  disabled />

		<!-- icons -->
		<link href="template/Template/Admin/dist/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
		<style>
			p.zoom { position:absolute; top:0px; right:0px; color:#555; font:bold 12px/1 sans-serif;}

			/* these styles are for the demo, but are not required for the plugin */
			.zoom {
				display:inline-block;
				position: relative;
			}

			/* magnifying glass icon */
			.zoom:after {
				content:'';
				display:block; 
				width:33px; 
				height:33px; 
				position:absolute; 
				top:0;
				right:0;
				background:url(icon.png);
			}

			.zoom img {
				display: block;
			}

			.zoom img::selection { background-color: transparent; }
		</style>
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
                                            <li class="breadcrumb-item active"><a href="load_model.php">Load Model</a></li>
                                            <li class="breadcrumb-item active">Predict</li>
                                        </ol>
                                    </div>
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
                                                <form action="predict_process.php?id=<?=$_GET['id']?>" name="image_predict" id="image_predict" enctype="multipart/form-data" method="post" data-parsley-validate=""> 
                                                    <input type="file" name="image" id="image" data-plugins="dropify" data-max-file-size="200M" data-allowed-file-extensions="jpg jpeg png nii" data-height="300">
                                                    <input type="hidden" name="proc" value="load">
                                                    <button type="submit" form="image_predict" id='btn_predict' class="btn btn-primary btn-block waves-effect waves-light float-end" style="margin-top:40px;">Predict Image</button>
                                                </form>
                                                <button type="button" onclick="saveRecord()" class="btn btn-primary btn-block waves-effect waves-light float-end" style="margin-top:40px;">Save Record</button>
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
												<div class="card-body text-white">
													<span class='zoom' id='ex0'>
														<img src="model/<?=$_GET['id']?>/result.png?<?=time()?>" + new Date().getTime() alt="result.png" onError="this.src ='template/Template/Admin/dist/assets/images/wait_predict_result.png'" class="img-fluid" style="width:100%;display: block;margin-left: auto;margin-right: auto;padding-top: 15%;padding-bottom: 15%;">
														<p class="zoom">Click and Drag to Zoom</p>
													</span>
												</div> 
											</div>												
                                        </div> <!-- end row -->

                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div><!-- end col -->

							<div class="col-lg-5 col-xl-5">
                                <div class="card-box" style="overflow-y:auto;max-height:545px;">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="col-md-12 col-sm-12">
                                                <i class="fas fa-question-circle" style="padding-right:5px;margin-bottom:7px;" title="Show the summary of the model." data-plugin="tippy" data-tippy-placement="right-start" data-tippy-maxWidth="200px" data-tippy-offset="0, 0"></i>
                                                <h3 class="header-title" style="display: inline-block;">Summary</h3>
                                            </div>
                                        </div>
                                    </div> <!-- end row -->
                                    <div class="card">
                                        <div class="card-header bg-primary py-3 text-white">
                                            <div class="card-widgets">
                                                <a data-toggle="collapse" href="#card_metadata" role="button" aria-expanded="false" aria-controls="card_metadata"><i class="mdi mdi-chevron-up"></i></a>
                                            </div>
                                            <i class="fas fa-question-circle" style="padding-right:10px;" title="Metadata is data that describes the dataset." data-plugin="tippy" data-tippy-placement="right-start" data-tippy-maxWidth="300px" data-tippy-offset="0, 0"></i>
                                            <h5 class="card-title mb-0 text-white" style="display: inline-block;" id="class_name">Metadata</h4>
                                        </div>
                                        <div id="card_metadata" class="collapse show bg-light">
                                            <div class="card-body text-white">
                                                <?php
                                                    $no_of_lines = count(file("model/".$_GET['id']."/label.txt")); 
                                                    //echo "There are $no_of_lines lines in $file"."\n";
                                                    print_r("<pre>");
                                                    for($i=$no_of_lines-1;$i>=0;$i--)
                                                    {
                                                        print_r(explode(' ', file("model/".$_GET['id']."/label.txt")[$i], 2)[1]);
                                                    }                                                         
                                                    print_r("</pre>");
                                                ?>
                                            </div>
                                        </div>
                                    </div> <!-- end card-->

                                    <div class="card">
                                        <div class="card-header bg-primary py-3 text-white">
                                            <div class="card-widgets">
                                                <a data-toggle="collapse" class="collapsed" href="#card_cr" role="button" aria-expanded="false" aria-controls="card_cr"><i class="mdi mdi-chevron-up"></i></a>
                                            </div>
                                            <i class="fas fa-question-circle" style="padding-right:10px;" title="A Classification report is used to measure the quality of predictions from a classification algorithm." data-plugin="tippy" data-tippy-placement="right-start" data-tippy-maxWidth="300px" data-tippy-offset="0, 0"></i>
                                            <h5 class="card-title mb-0 text-white" style="display: inline-block;" id="class_name">Classification Report</h4>
                                        </div>
                                        <div id="card_cr" class="collapse bg-light">
                                            <div class="card-body text-white">
                                            <?php
                                                print_r("<pre>");
                                                
                                                print_r("<i class='fas fa-question-circle' style='padding-right:5px;margin-bottom:7px;' title='Accuracy is the percentage of classification that a model gets right during training. Higher the percentage, higher the model accuracy.' data-plugin='tippy' data-tippy-placement='right-start' data-tippy-maxWidth='300px' data-tippy-offset='0, 0'></i>");
                                                print_r(file("model/".$_GET['id']."/report.txt")[0]."\n");

                                                print_r("<i class='fas fa-question-circle' style='padding-right:5px;margin-bottom:7px;' title='Precision is the ability of a classifier not to label an instance positive that is actually negative. The formula is TP/(TP + FP).' data-plugin='tippy' data-tippy-placement='right-start' data-tippy-maxWidth='300px' data-tippy-offset='0, 0'></i>");
                                                print_r(file("model/".$_GET['id']."/report.txt")[1]."\n");

                                                print_r("<i class='fas fa-question-circle' style='padding-right:5px;margin-bottom:7px;' title='Recall is a measure of the classifier&#39s completeness; the ability of a classifier to correctly find all positive instances.' data-plugin='tippy' data-tippy-placement='right-start' data-tippy-maxWidth='300px' data-tippy-offset='0, 0'></i>");
                                                print_r(file("model/".$_GET['id']."/report.txt")[2]."\n");

                                                print_r("<i class='fas fa-question-circle' style='padding-right:5px;margin-bottom:7px;' title='F-score  is a measure of a test&#39s accuracy. The highest possible value of an F-score is 1.0, indicating perfect precision and recall, and the lowest possible value is 0, if either the precision or the recall is zero.' data-plugin='tippy' data-tippy-placement='right-start' data-tippy-maxWidth='300px' data-tippy-offset='0, 0'></i>");
                                                print_r(file("model/".$_GET['id']."/report.txt")[3]."\n");

                                                print_r("<i class='fas fa-question-circle' style='padding-right:5px;margin-bottom:7px;' title='Score is the number of actual occurrences of the class in the specified dataset. Imbalanced score in the training data may indicate structural weaknesses in the reported scores of the classifier and could indicate the need for stratified sampling or rebalancing. Score doesn&#39t change between models but instead diagnoses the evaluation process.' data-plugin='tippy' data-tippy-placement='right-start' data-tippy-maxWidth='300px' data-tippy-offset='0, 0'></i>");
                                                print_r(file("model/".$_GET['id']."/report.txt")[4]."\n");

                                                print_r("<i class='fas fa-question-circle' style='padding-right:5px;margin-bottom:7px;' title='Classification error rate is the proportion of instances misclassified over the whole set of instances. The lower the error rate, the better the model performance.' data-plugin='tippy' data-tippy-placement='right-start' data-tippy-maxWidth='300px' data-tippy-offset='0, 0'></i>");
                                                print_r(file("model/".$_GET['id']."/report.txt")[5]);

                                                print_r("</pre>");
                                            ?>
                                            </div>
                                        </div>
                                    </div> <!-- end card-->

                                    <div class="card">
                                        <div class="card-header bg-primary py-3 text-white">
                                            <div class="card-widgets">
                                                <a data-toggle="collapse" class="collapsed" href="#card_accu" role="button" aria-expanded="false" aria-controls="card_accu"><i class="mdi mdi-chevron-up"></i></a>
                                            </div>
                                            <i class="fas fa-question-circle" style="padding-right:10px;" title="Accuracy is the percentage of classification that a model gets right during training. If the modal prediction is perfect, the accuracy will be one, else the accuracy is below one." data-plugin="tippy" data-tippy-placement="right-start" data-tippy-maxWidth="200px" data-tippy-offset="0, 0"></i>
                                            <h5 class="card-title mb-0 text-white" style="display: inline-block;" id="class_name">Training and Validation Accuracy</h4>
                                        </div>
                                        <div id="card_accu" class="collapse bg-light">
                                            <div class="card-body text-white">
												<span class='zoom' id='ex1'>
													<img src="model/<?=$_GET['id']?>/accuracy.png?<?=time()?>" alt="accuracy" class="img-fluid" style="height:400px; display: block;margin-left: auto;margin-right: auto;">
													<p class="zoom">Click and Drag to Zoom</p>
												</span>
                                            </div>
                                        </div>
                                    </div> <!-- end card-->

                                    <div class="card">
                                        <div class="card-header bg-primary py-3 text-white">
                                            <div class="card-widgets">
                                                <a data-toggle="collapse" class="collapsed" href="#card_loss" role="button" aria-expanded="false" aria-controls="card_loss"><i class="mdi mdi-chevron-up"></i></a>
                                            </div>
                                            <i class="fas fa-question-circle" style="padding-right:10px;" title="Loss is a measure for evaluating how well a model learned to predict the right classifications for a given set of samples." data-plugin="tippy" data-tippy-placement="right-start" data-tippy-maxWidth="200px" data-tippy-offset="0, 0"></i>
                                            <h5 class="card-title mb-0 text-white" style="display: inline-block;" id="class_name">Training and Validation Loss</h4>
                                        </div>
                                        <div id="card_loss" class="collapse bg-light">
                                            <div class="card-body text-white">
												<span class='zoom' id='ex2'>
													<img src="model/<?=$_GET['id']?>/loss.png?<?=time()?>" alt="loss" class="img-fluid" style="height:400px; display: block;margin-left: auto;margin-right: auto;">
													<p class="zoom">Click and Drag to Zoom</p>
												</span>
                                            </div>
                                        </div>
                                    </div> <!-- end card-->

                                    <div class="card">
                                        <div class="card-header bg-primary py-3 text-white">
                                            <div class="card-widgets">
                                                <a data-toggle="collapse" class="collapsed" href="#card_roc" role="button" aria-expanded="false" aria-controls="card_roc"><i class="mdi mdi-chevron-up"></i></a>
                                            </div>
                                            <i class="fas fa-question-circle" style="padding-right:10px;" title="ROC curve shows the trade-off between sensitivity (or TPR) and specificity (1 ??? FPR). Classifiers that give curves closer to the top-left corner indicate a better performance. The closer the curve comes to the 45-degree diagonal of the ROC space, the less accurate the test." data-plugin="tippy" data-tippy-placement="right-start" data-tippy-maxWidth="300px" data-tippy-offset="0, 0"></i>
                                            <h5 class="card-title mb-0 text-white" style="display: inline-block;" id="class_name">ROC Curve</h4>
                                        </div>
                                        <div id="card_roc" class="collapse bg-light">
                                            <div class="card-body text-white">
												<span class='zoom' id='ex3'>
													<img src="model/<?=$_GET['id']?>/roc.png?<?=time()?>" alt="roc" class="img-fluid" style="height:400px; display: block;margin-left: auto;margin-right: auto;">
													<p class="zoom">Click and Drag to Zoom</p>
												</span>
                                            </div>
                                        </div>
                                    </div> <!-- end card-->

                                    <div class="card">
                                        <div class="card-header bg-primary py-3 text-white">
                                            <div class="card-widgets">
                                                <a data-toggle="collapse" class="collapsed" href="#card_cm" role="button" aria-expanded="false" aria-controls="card_cm"><i class="mdi mdi-chevron-up"></i></a>
                                            </div>
                                            <i class="fas fa-question-circle" style="padding-right:10px;" title="Confusion Matrix summarizes how accurate the model's prediction are. User can use this to figure out which classes the model gets confused about." data-plugin="tippy" data-tippy-placement="right-start" data-tippy-maxWidth="300px" data-tippy-offset="0, 0"></i>
                                            <h5 class="card-title mb-0 text-white" style="display: inline-block;" id="class_name">Confusion Matrix</h4>
                                        </div>
                                        <div id="card_cm" class="collapse bg-light">
                                            <div class="card-body text-white">
												<span class='zoom' id='ex4'>
													<img src="model/<?=$_GET['id']?>/cm.png?<?=time()?>" alt="confusion Matrix" class="img-fluid" style="height:400px; display: block;margin-left: auto;margin-right: auto;">
													<p class="zoom">Click and Drag to Zoom</p>
												</span>
                                            </div>
                                        </div>
                                    </div> <!-- end card-->
                                </div>
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

        <!-- Vendor js -->
        <script src="template/Template/Admin/dist/assets/js/vendor.min.js"></script>

        <!-- Plugins js -->
        <script src="template/Template/Admin/dist/assets/libs/dropzone/min/dropzone.min.js"></script>
        <script src="template/Template/Admin/dist/assets/libs/dropify/js/dropify.min.js"></script>

        <!-- Init js-->
        <script src="template/Template/Admin/dist/assets/js/pages/form-fileuploads.init.js"></script>

        <!-- App js -->
        <script src="template/Template/Admin/dist/assets/js/app.min.js"></script>

        <!-- Sweet Alerts js -->
		<script src="template/Template/Admin/dist/assets/libs/sweetalert2/sweetalert2.min.js"></script>

        <!-- Sweet alert init js-->
        <script src="template/Template/Admin/dist/assets/js/pages/sweet-alerts.init.js"></script>

        <script>
            $('#btn_predict').click(function(e){
                if($('#image').val()!="")
                {
                    $("#status").delay(500).fadeIn();
                    $("#preloader").delay(500).fadeIn("fast");
                }
                else
                {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Failure',
                        html: 'Please upload an image file (.jpg, .jpeg, .png, .nii) with size smaller than 200 MB',
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
           function saveRecord()
           { 
                $("#status").delay(500).fadeIn();
                $("#preloader").delay(500).fadeIn("fast");
                <?php
                    $myFile = "model/".$_GET['id']."/history.txt";
                    $lines = file($myFile);
                ?>
                var db = firebase.firestore();
                db.collection("Users").doc("<?=$_GET['id'];?>").collection("History").doc("<?=time()?>").set({
                    metadata: '<?=trim($lines[0])?>',
                    preTrainedModel: '<?=trim($lines[1])?>',
                    epoch: '<?=trim($lines[2])?>',
                    batchSize: '<?=trim($lines[3])?>',
                    accuracy: '<?=trim($lines[4])?>',
                    precision: '<?=trim($lines[5])?>',
                    recall: '<?=trim($lines[6])?>',
                    fscore: '<?=trim($lines[7])?>',
                    score: '<?=trim($lines[8])?>',
                    errorRate: '<?=trim($lines[9])?>'
                    }).then(() => {
                        $("#status").delay(500).fadeOut();
                		$("#preloader").delay(500).fadeOut("fast");
                        swal({
                                title: 'Success',
								text: 'Save metadata & classification report successful',
                                type: 'success',
                                confirmButtonColor: '#6658dd',
                                backdrop:'#eeeff3',
                                allowOutsideClick: false,
                                animation:true,
                                }).then(function (result) {
                                    if (result.value) {
                                        location.reload();
                                    }
                                })
                    }).catch((error) => {
                        swal({
                                title: 'Failure',
                                text: error.message,
                                type: 'error',
                                confirmButtonColor: '#6658dd',
                                backdrop:'#eeeff3',
                                allowOutsideClick: false,
                                animation:true,
                                }).then(function (result) {
                                    if (result.value) {
                                        location.reload();
                                }
                            })
                    });
            }
		</script>
		<script src="template/Template/Admin/dist/assets/js/jquery.zoom.js"></script>
		<script>
			$(document).ready(function(){
				$('#ex0').zoom({ on:'grab' });
				$('#ex1').zoom({ on:'grab' });
				$('#ex2').zoom({ on:'grab' });
				$('#ex3').zoom({ on:'grab' });
				$('#ex4').zoom({ on:'grab' });
			});
		</script>
    </body>
</html>