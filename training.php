<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Training Model - Image Classification System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="Landing/Logo/faviconLogo.ico">

		<!-- App css -->
		<link href="template/Template/Admin/dist/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
		<link href="template/Template/Admin/dist/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

		<link href="template/Template/Admin/dist/assets/css/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
		<link href="template/Template/Admin/dist/assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet"  disabled />

        <!-- Sweet Alert-->
        <link href="template/Template/Admin/dist/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

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
                                            <li class="breadcrumb-item"><a href="upload.php">Upload</a></li>
                                            <li class="breadcrumb-item active">Training</li>
                                            <?php
                                            $num = count(glob("model/".$_GET['id']. "/*"));
											if($num!=0)
											{
											?>
												<li class="breadcrumb-item"><a href="image_predict_train_model.php">Predict</a></li>
											<?php
											}
											?>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Training Model</h4>
								</div>
                            </div>
                        </div>
                        <!-- end page title --> 

                        <div class="row">

                            <!-- Start Upload Image -->
                            <div class="col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="col-md-12 col-sm-12">
                                            <i class="fas fa-question-circle" style="padding-right:5px;margin-bottom:7px;" title="Show the images inside the class, you can edit the class name by clicking it" data-plugin="tippy" data-tippy-placement="right-start" data-tippy-maxWidth="200px" data-tippy-offset="0, 0"></i>
                                            <h3 class="header-title" style="display: inline-block;">Class List</h3>
                                            <div id="class_list" style="max-height: 335px; overflow-y: auto;"></div>
                                        </div>
									</div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div><!-- end col -->
                            <!-- End Upload Image -->

                        
                            <!-- Start Training Model -->
                            <div class="col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="train_process.php?id=<?=$_GET['id']?>" name="InputCacheCheck" id="InputCacheCheck" method="post" data-parsley-validate="">
                                            <div class="input-prepend input-append form-group" style="padding:5px !important;">
                                                <i class="fas fa-question-circle" style="padding-right:5px;margin-bottom:7px;" title="A pre-trained model is a model that was trained on a large benchmark dataset to solve a problem similar to the one that we want to solve" data-plugin="tippy" data-tippy-placement="right-start" data-tippy-maxWidth="200px" data-tippy-offset="0, 0"></i>
                                                <h3 class="header-title" style="display: inline-block;">Pre-trained Model</h3>
                                                
                                                <div class="alert alert-success alert-dismissible fade show" id="suggest" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    *Notes: More info in Overall Best Models Classifier Metric (Under User Account)*
                                                    <br>
                                                    <br>
                                                    Best Performance Pre-trained Model Based On Your Previous Training: *-*
                                                </div>

                                                <select class="form-control" name="model_selection" id="model_selection" required="">
                                                    <optgroup label="--Available Model--">
                                                        <option value="MobileNetV2">MobileNetV2</option>
                                                        <option value="EfficientNetB3">EfficientNetB3</option>
                                                        <option value="InceptionV3">InceptionV3</option>
                                                        <option value="DenseNet201">DenseNet201</option>
                                                        <option value="ResNet50V2">ResNet50V2</option>
                                                        <option value="VGG16">VGG16</option>
                                                        <option value="Xception">Xception</option>
                                                    </optgroup>
                                                </select>
                                            </div>

                                            <div class="input-prepend input-append form-group" style="padding:5px !important;">
                                            <i class="fas fa-question-circle" style="padding-right:5px;margin-bottom:7px;" title="The model that you are training will work through the enitre training dataset by the number of times that you set, you might tend to increase this number to get a good training result (Maximum: 10)" data-plugin="tippy" data-tippy-placement="right-start" data-tippy-maxWidth="300px" data-tippy-offset="0, 0"></i>
                                                <h3 class="header-title" style="display: inline-block;">Epoch</h3>
                                                <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                                                    <span class="input-group-btn input-group-prepend">
                                                        <button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="epoch_size"><i class=" fas fa-angle-down"></i></button>
                                                    </span>
                                                    <input data-toggle="touchspin" class="form-control input-number" name="epoch_size" id="epoch_size" type="text" value="2" min="2" max="10" require="">
                                                    <span class="input-group-btn input-group-append"><button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="epoch_size"><i class="fas fa-angle-up"></i></button>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="input-prepend input-append form-group" style="padding:5px !important;">
                                            <i class="fas fa-question-circle" style="padding-right:5px;margin-bottom:7px;" title="The data will be split into the number of batches which the total number of images divided by the batch size number. One epoch will be complete once all the batches have been fed through the model, you might not need to increase this number to get a good training result" data-plugin="tippy" data-tippy-placement="right-start" data-tippy-maxWidth="300px" data-tippy-offset="0, 0"></i>
                                                <h3 class="header-title" style="display: inline-block;">Batch Size</h3>
                                                <select class="form-control" name="batch_size" id="batch_size" required="">
                                                    <option value="">Choose..</option>
                                                    <option value="8">8</option>
                                                    <option value="16">16</option>
                                                    <option value="32">32</option>
                                                    <option value="64">64</option>
                                                </select>
                                            </div>
                                            <a href="upload.php" class="btn btn-primary btn-block waves-effect waves-light float-end">Add Class</a>
                                     
                                            <?php
                                                $dirs = array_filter(glob('uploads/'.$_GET['id'].'/*'), 'is_dir');
                                                if(count($dirs)>1)
                                                {
                                                    ?>
                                                    <button type="submit" id='btn_submit' style="margin-top:20px !important;" class="btn btn-primary btn-block waves-effect waves-light float-end">Train Model</button>
                                                    <?php
                                                }
                                            ?>                                                    
                                            
                                        </form>
									</div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div><!-- end col -->
                            <!-- End Training Model -->

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

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="template/Template/Admin/dist/assets/js/vendor.min.js"></script>
		
		<!-- Tippy js-->
        <script src="template/Template/Admin/dist/assets/libs/tippy.js/tippy.all.min.js"></script>

        <!-- Plugin js-->
        <script src="template/Template/Admin/dist/assets/libs/parsleyjs/parsley.min.js"></script>

        <!-- App js -->
        <script src="template/Template/Admin/dist/assets/js/app.min.js"></script>
		
		<script>
			function getTopModel(){
				var dataSet = new Array();
				var i=1;
				var db = firebase.firestore();
				db.collection("Users").doc("<?=$_GET['id'];?>").collection("History").get().then((querySnapshot) => {
					querySnapshot.forEach((doc) => {
						dataSet.push({"model":doc.data().preTrainedModel,"accuracy":parseFloat(doc.data().accuracy)});
						i=i+1;
					})
				}).then(function() {
									
					var groupedData = dataSet.reduce(function(l, r) {
					  var key = r.model;
					  if (typeof l[key] === "undefined") {
						l[key] = {
						  accuracy: r.accuracy
						};
					  }
					  if(l[key].accuracy<r.accuracy)l[key].accuracy = r.accuracy;
					  return l;
					}, {});
									
					var avgGroupedData = Object.keys(groupedData).map(function(key) {
						return {
						  model: key,
						  accuracy: groupedData[key].accuracy
						};
					  });
					
					var highest = new Array();
					
					avgGroupedData.forEach(function(element){
					  highest.push([element.model,element.accuracy]);
					});
					if(highest.length>0)
					{
						var text = $("#suggest[role=alert]").html();
						text = text.replace("*-*", highest.sort(function(a, b) {return a[1] - b[1];}).reverse()[0]);	
						text = text.replace(",", " : ");
						$("#suggest[role=alert]").html(text).append(" % of accuracy");
					}
				});
			}
		</script>

        <script>
            $('#btn_submit').click(function(e){
                if($('#model_selection').val()!="" && $('#batch_size').val()!="")
                {
                    $("#status").delay(500).fadeIn();
                    $("#preloader").delay(500).fadeIn("fast");
                }
            });

            $('.btn-number').click(function(e){
                e.preventDefault();
                
                fieldName = $(this).attr('data-field');
                type      = $(this).attr('data-type');
                var input = $("input[name='"+fieldName+"']");
                var currentVal = parseInt(input.val());
                if (!isNaN(currentVal)) {
                    if(type == 'minus') {
                        
                        if(currentVal > input.attr('min')) {
                            input.val(currentVal - 1).change();
                        } 
                        if(parseInt(input.val()) == input.attr('min')) {
                            $(this).attr('disabled', true);
                        }
                    } else if(type == 'plus') {
                        if(currentVal < input.attr('max')) {
                            input.val(currentVal + 1).change();
                        }
                        if(parseInt(input.val()) == input.attr('max')) {
                            $(this).attr('disabled', true);
                        }
                    }
                } else {
                    input.val(0);
                }
            });

            $('.input-number').focusin(function(){
            $(this).data('oldValue', $(this).val());
            });

            $('.input-number').change(function() {
                minValue =  parseInt($(this).attr('min'));
                maxValue =  parseInt($(this).attr('max'));
                valueCurrent = parseInt($(this).val());
                
                name = $(this).attr('name');
                if(valueCurrent >= minValue) {
                    $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
                } else {
                    Swal.fire({
                        title: 'Failure',
                        text: 'The number of Epoch can only be an integer value between 2 - 10',
                        type: 'error',
                        backdrop:'#eeeff3',
                        showConfirmButton: true,
                        confirmButtonColor: '#6658dd',
                        allowOutsideClick: false,
                    });
                    $(this).val($(this).data('oldValue'));
                }
                if(valueCurrent <= maxValue) {
                    $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
                } else {
                    Swal.fire({
                        title: 'Failure',
                        text: 'The number of Epoch can only be an integer value between 2 - 10',
                        type: 'error',
                        backdrop:'#eeeff3',
                        showConfirmButton: true,
                        confirmButtonColor: '#6658dd',
                        allowOutsideClick: false,
                    });
                    $(this).val($(this).data('oldValue'));
                }
            });
        </script>

        <!-- Init js-->
		<script>
            $("#class_list").load("class_list.php?id=<?=$_GET['id']?>");
			getTopModel();
		</script>

    </body>
</html>