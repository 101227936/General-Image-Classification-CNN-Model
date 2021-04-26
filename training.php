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
            <div class="content-page" style="margin:15px; !important">
                <div class="content">
                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
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
                                            <i class="fas fa-question-circle" style="padding-right:5px;margin-bottom:7px;" title="Click Class Name to edit the name of class" data-plugin="tippy" data-tippy-placement="right-start" data-tippy-maxWidth="200px" data-tippy-offset="0, 0"></i>
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
                                    
                                        <form action="train_process.php" name="InputCacheCheck" id="InputCacheCheck" method="post" data-parsley-validate="">
                                            <div class="input-prepend input-append form-group" style="padding:5px;!important">
                                                <i class="fas fa-question-circle" style="padding-right:5px;margin-bottom:7px;" title="Select a net to train your model" data-plugin="tippy" data-tippy-placement="right-start" data-tippy-maxWidth="200px" data-tippy-offset="0, 0"></i>
                                                <h3 class="header-title" style="display: inline-block;">Pre-trained Model</h3>
                                                <select class="form-control" name="model_selection" id="model_selection" required="">
                                                    <option value="">Choose..</option>
                                                    <option value="MobileNetV2">MobileNetV2</option>
                                                    <option value="EfficientNetB3">EfficientNetB3</option>
                                                    <option value="InceptionV3">InceptionV3</option>
                                                    <option value="DenseNet201">DenseNet201</option>
                                                    <option value="VGG16">VGG16</option>
                                                    <option value="ResNet50V2">ResNet50V2</option>
                                                    <option value="Xception">Xception</option>
                                                </select>
                                            </div>

                                            <div class="input-prepend input-append form-group" style="padding:5px;!important">
                                            <i class="fas fa-question-circle" style="padding-right:5px;margin-bottom:7px;" title="Set your Epoch number. (Maximum 10)" data-plugin="tippy" data-tippy-placement="right-start" data-tippy-maxWidth="200px" data-tippy-offset="0, 0"></i>
                                                <h3 class="header-title" style="display: inline-block;">Epoch </h3>
                                                <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                                                    <span class="input-group-btn input-group-prepend">
                                                        <button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="epoch_size"><i class=" fas fa-angle-down"></i></button>
                                                    </span>
                                                    <input data-toggle="touchspin" class="form-control input-number" name="epoch_size" id="epoch_size" type="text" value="2" min="2" max="10" require="">
                                                    <span class="input-group-btn input-group-append"><button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="epoch_size"><i class="fas fa-angle-up"></i></button>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="input-prepend input-append form-group" style="padding:5px;!important">
                                            <i class="fas fa-question-circle" style="padding-right:5px;margin-bottom:7px;" title="Select a net to train your model" data-plugin="tippy" data-tippy-placement="right-start" data-tippy-maxWidth="200px" data-tippy-offset="0, 0"></i>
                                                <h3 class="header-title" style="display: inline-block;">Batch Size</h3>
                                                <select class="form-control" name="batch_size" id="batch_size" required="">
                                                    <option value="">Choose..</option>
                                                    <option value="16">16</option>
                                                    <option value="32">32</option>
                                                    <option value="64">64</option>
                                                    <option value="128">128</option>
                                                </select>
                                            </div>
                                            <a href="upload.php" class="btn btn-primary btn-block waves-effect waves-light float-end">Add Class</a>
                                     
                                            <?php
                                                $dirs = array_filter(glob('uploads/*'), 'is_dir');
                                                if(count($dirs)>1)
                                                {
                                                    ?>
                                                    <button type="submit" id='btn_submit' style="margin-top:1rem !important;" class="btn btn-primary btn-block waves-effect waves-light float-end">Train Model</button>
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
                    alert('Sorry, the minimum value was reached');
                    $(this).val($(this).data('oldValue'));
                }
                if(valueCurrent <= maxValue) {
                    $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
                } else {
                    alert('Sorry, the maximum value was reached');
                    $(this).val($(this).data('oldValue'));
                }
            });
        </script>

        <!-- Init js-->
		<script>
            $("#class_list").load("class_list.php");
		</script>

    </body>
</html>