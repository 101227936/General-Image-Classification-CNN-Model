<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Upload Image - Image Classification System</title>
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
                                    <h4 class="page-title">Upload your images</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body" style="padding-bottom:5px;!important">
										<?php
											$dirs = array_filter(glob('uploads/*'), 'is_dir');
											$name = "Class ".count($dirs);
											$new_name=$name;
											$count=0;
											while(in_array('uploads/'.$new_name, $dirs))
											{
												$count++;
												$new_name=$name.'('.$count.')';
											}
										?>
										<div class="row">
											<div class="col-md-6 col-sm-12">
												<i class="fas fa-question-circle" style="padding-right:5px;margin-bottom:7px;" title="Click Class Name to edit the name of class" data-plugin="tippy" data-tippy-placement="right-start" data-tippy-maxWidth="200px" data-tippy-offset="0, 0"></i>
												<h4 class="header-title" style="display: inline-block;" id="class_name" contenteditable="true"><?=$new_name?></h4>
                                                <form action="upload_files.php" method="post" class="dropzone" style="min-height: 0px !important;" id="myAwesomeDropzone" name="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews"
													data-upload-preview-template="#uploadPreviewTemplate">
													<div class="fallback">
														<input name="file[]" type="file" multiple />
													</div>
													<div class="dz-message needsclick" style="margin:5.5rem;!important">
														<i class="h1 text-muted dripicons-cloud-upload"></i>
														<h3>Drop files here or click to upload</h3>
														<span class="text-muted font-13">(Please upload the images with less than 1MB and minimum 50 and maximum of 150 images allowed only)</span>
													</div>
												</form>
											</div>
											<div class="col-6">
												<!-- Preview -->
                                                <i class="fas fa-question-circle" style="padding-right:5px;margin-bottom:7px;" title="Preview your uploaded images" data-plugin="tippy" data-tippy-placement="right-start" data-tippy-maxWidth="200px" data-tippy-offset="0, 0"></i>
                                                <h4 class="header-title" style="display: inline-block;">Preview Container</h4>
                                                <div class="dropzone-previews mt-3" id="file-previews" style="margin-top:0.7rem !important; max-height: 328px; overflow-y: auto;"></div>
											</div>
										</div>
                                    </div> <!-- end card-body-->
									<div class="modal-footer" style="padding-top:0px;!important">
										<button id='upload' name='upload' class="btn btn-primary waves-effect waves-light float-end">Upload</button>
									</div>
                                </div> <!-- end card-->
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->  

                        <!-- file preview template -->
                        <div class="d-none" id="uploadPreviewTemplate">
                            <div class="card mt-1 mb-0 shadow-none border">
                                <div class="p-2">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <img data-dz-thumbnail src="#" class="avatar-sm rounded bg-light" alt="">
                                        </div>
                                        <div class="col pl-0">
                                            <a href="javascript:void(0);" class="text-muted font-weight-bold" data-dz-name></a>
                                            <p class="mb-0" data-dz-size></p>
                                        </div>
                                        <div class="col-auto">
                                            <!-- Button -->
                                            <a href="" class="btn btn-link btn-lg text-muted" data-dz-remove>
                                                <i class="dripicons-cross"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
		
		<!-- Init js-->
		<script>
            var myDropzone;
			!function(t){
				"use strict";
				function e(){
					this.$body=t("body")
				}
				e.prototype.init=function(){
					Dropzone.autoDiscover=false,
					t('[data-plugin="dropzone"]').each(function(){
						var e=t(this).attr("action"),
						o=t(this).data("previewsContainer"),
						i={
							acceptedFiles: "image/jpeg,image/png,image/jpg",
							url:e,
							maxFilesize: 1,
							autoProcessQueue: false,
							maxFiles: 150,
							parallelUploads: 150,
							init: function() {
								myDropzone = this;
								$("#upload").click(function (e) {
									e.preventDefault();
									if(myDropzone.getAcceptedFiles().length>=50)myDropzone.processQueue();
									else alert('Please select images');
								});
							},
							processing: function(file) {
							  this.options.params = {name: $('#class_name').text()};
							},
							queuecomplete : function(file, response){
								if (myDropzone.getAcceptedFiles().length>0 && 
                                    myDropzone.getUploadingFiles().length === 0 && 
                                    myDropzone.getQueuedFiles().length === 0) 
                                {
									alert("Image Upload Successful");
									window.location='training.php';
								}			
							},
							error: function(file, response){
								alert(file.name+" is not added because "+response);
								this.removeFile(file);
							},
							totaluploadprogress: function(progress) {
								console.log(progress);
							}
						};
						o&&(i.previewsContainer=o);
						var r=t(this).data("uploadPreviewTemplate");
						r&&(i.previewTemplate=t(r).html());
						t(this).dropzone(i)
					})
				},
				t.FileUpload=new e,
				t.FileUpload.Constructor=e
			}(window.jQuery),function(){
				"use strict";
				window.jQuery.FileUpload.init()
			}()

			Array.from(document.querySelectorAll('#class_name')).forEach(function(element, index, array){
				element.addEventListener('focusout', function(event){
					event.preventDefault();
					$.ajax({
						type: "POST",
						dataType : 'json',
						url: "check_duplicate_class.php",
						data: { 
							name: event.target.textContent,
						},
						success: function(result) {
							if(result.Status==true)
							{
								alert(result.Result);
								event.target.innerText="<?=$new_name?>";
							}
						},
						error: function(result) {
							console.log(result);
							console.clear();
						}
					});
					
				})
			})
		</script>
    </body>
</html>