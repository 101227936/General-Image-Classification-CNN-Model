<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Training Model Single Class - Image Classification System</title>
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
            <div class="content-page" style="margin:3px; !important">
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
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-body" style="padding-bottom:5px;!important">

										<div class="col-md-12 col-sm-12">
                                            <form action="upload_files.php" method="post" class="dropzone" style="min-height: 0px !important;" id="myAwesomeDropzone" name="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews"
												data-upload-preview-template="#uploadPreviewTemplate">
												<div class="fallback">
													<input name="file[]" type="file" multiple />
												</div>
												<div class="dz-message needsclick" style="margin:5.5rem;!important">
													<i class="h1 dripicons-cloud-upload"></i>
													<h3>Drop files here or click to upload</h3>
													<span class="text-muted font-13">(Please upload the images with less than 1MB and maximum of 100 images allowed only)</span>
												</div>
											</form>

                                            <div class="modal-footer" style="padding-top:0px;!important">
                                                <button type="button" class="btn btn-primary btn-lg btn-block waves-effect waves-light float-end">Predict</button>
                                                <button type="button" class="btn btn-primary btn-lg btn-block waves-effect waves-light float-end">Export Model</button>
                                            </div>
										</div>

										<!-- Preview -->                                                
                                        <div class="dropzone-previews mt-3" id="file-previews" style="margin-top:0.7rem !important; max-height: 328px; overflow-y: auto;"></div>
                                    
									</div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div><!-- end col -->
                            <!-- End Upload Image -->

                        
                            <!-- Start Training Model -->
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-body" style="padding-bottom:5px;!important">
                                    
                                        <form action="#" name="InputCacheCheck" method="post">
                                            <div class="input-prepend input-append" style="padding:5px;!important">
                                                <h3 class="page-title">Pre-trained Model <i class="fas fa-question-circle" style="padding-right:5px;margin-bottom:7px;" title="Select a net to train your model" data-plugin="tippy" data-tippy-placement="right-start" data-tippy-maxWidth="200px" data-tippy-offset="0, 0"></i></h3>
                                                <div class="btn-group mb-2">
                                                    <button class="btn btn-primary dropdown-toggle btn-lg btn-block" name="recordinput" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> --- Please Select --- <i class="mdi mdi-chevron-down"></i>
                                                    <span class="caret"></span>
                                                    </button>
                                                    <ul id="myInput" class="dropdown-menu">
                                                        <li><a href="#">MobileNet V2</a></li>
                                                        <li><a href="#">MobileNet V3</a></li>
                                                        <li><a href="#">MobileNet V4</a></li>
                                                        <li><a href="#">MobileNet V5</a></li>
                                                    </ul>
                                            
                                                </div>
                                            </div>
                                        


                                       
                                            <div class="input-prepend input-append" style="padding:5px;!important">
                                                <h3 class="page-title">Epoch <i class="fas fa-question-circle" style="padding-right:5px;margin-bottom:7px;" title="Maximum epoch is 10" data-plugin="tippy" data-tippy-placement="right-start" data-tippy-maxWidth="200px" data-tippy-offset="0, 0"></i></h3>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                                                            <i class="ti-arrow-circle-down"></i>
                                                        </button>
                                                    </span>
                                                    <input type="text" name="quant[1]" class="form-control input-number" value="1" min="1" max="10">
                                                    <span class="input-group-btn">
                                                        <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
                                                            <i class="ti-arrow-circle-up"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                                
                                            </div>
                                       

                                        
                                            <div class="input-prepend input-append" style="padding:5px;!important">
                                                <h3 class="page-title">Batch Size <i class="fas fa-question-circle" style="padding-right:5px;margin-bottom:7px;" title="Select the batch size of your model" data-plugin="tippy" data-tippy-placement="right-start" data-tippy-maxWidth="200px" data-tippy-offset="0, 0"></i></h3>
                                                <div class="btn-group mb-2">
                                                    <button class="btn btn-primary dropdown-toggle btn-lg btn-block" name="recordinput" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> --- Please Select --- <i class="mdi mdi-chevron-down"></i>
                                                    <span id="myBatchSize" class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#">16</a></li>
                                                        <li><a href="#">32</a></li>
                                                        <li><a href="#">64</a></li>
                                                        <li><a href="#">128</a></li>
                                                    </ul>
                                            
                                                </div>
                                            </div>
                                        </form>

                                        <br>
                                        <br>
                                        <br>
                                        <button type="button"  onclick="myFunction()"class="btn btn-info btn-lg btn-block waves-effect waves-light float-end">Add Class</button>
                                        <button type="button" class="btn btn-info btn-lg btn-block waves-effect waves-light float-end">Train Model</button>

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

        <!-- Plugins js -->
        <script src="template/Template/Admin/dist/assets/libs/dropzone/min/dropzone.min.js"></script>
        <script src="template/Template/Admin/dist/assets/libs/dropify/js/dropify.min.js"></script>

        <!-- App js -->
        <script src="template/Template/Admin/dist/assets/js/app.min.js"></script>

        <script>
            $(".dropdown-menu li a").click(function(){
                var selText = $(this).text();
                $(this).parents('.btn-group').find('.dropdown-toggle').html(selText+' <span class="caret"></span>');
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
            
            

            function myFunction()
            {
                var card = document.getElementById("myInput");
                var batchSize = document.getElementById("myBatchSize");

                if(card.selectedIndex == 0 && batchSize.selectedIndex == 0) {
                    alert("ok");
                }
                else {
                    alert('select one answer');
                }
            }

        </script>
    </body>
</html>