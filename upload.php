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
                                            <li class="breadcrumb-item active">Upload</li>
											<li class="breadcrumb-item"><a href="training.php">Training</a></li>
											<?php
											$num = count(glob("model/".$_GET['id']."/*"));
											if($num!=0)
											{
											?>
												<li class="breadcrumb-item"><a href="image_predict_train_model.php">Predict</a></li>
											<?php
											}
											?>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Upload Your Images</h4>
								</div>
                            </div>
                        </div>
                        <!-- end page title --> 
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body" style="padding-bottom:5px !important;">
										<?php
											$dirs = array_filter(glob('uploads/'.$_GET['id'].'/*'), 'is_dir');
											$name = "Class ".count($dirs);
											$new_name=$name;
											$count=0;
											while(in_array('uploads/'.$_GET['id'].'/'.$new_name, $dirs))
											{
												$count++;
												$new_name=$name.'('.$count.')';
											}
										?>
									
										<div class="row">
											<div class="col-md-6 col-sm-12">
												<i class="fas fa-question-circle" style="padding-right:5px;margin-bottom:7px;" title="Click Class Name to edit the name of class" data-plugin="tippy" data-tippy-placement="right-start" data-tippy-maxWidth="200px" data-tippy-offset="0, 0"></i>
												<h4 class="header-title" style="display: inline-block;" id="class_name" contenteditable="true"><?=$new_name?></h4>
												
												<i class="mdi mdi-square-edit-outline"></i>
												<form action="upload_files.php?id=<?=$_GET['id']?>" method="post" class="dropzone" style="min-height: 0px !important;" id="myAwesomeDropzone" name="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews"
													data-upload-preview-template="#uploadPreviewTemplate">
													<div class="fallback">
														<input name="file[]" type="file" multiple />
													</div>
													<div class="dz-message needsclick" style="margin:5.5rem !important;">
														<i class="h1 text-muted dripicons-cloud-upload"></i>
														<h3>Drop files here or click to upload</h3>
														<span class="text-muted font-16">Note: The system do support either IMAGE file (.jpeg,.jpg,.png) or NIFTI file (.nii)</span>
														<br><br>
														<span class="text-secondary font-13">Please upload the files with less than <strong>200 MB</strong>, total minimum of <strong>20</strong> and maximum of <strong>150</strong> files for one class.</span>
														<br><br>
														<span class="text-secondary font-13"><em>*You can upload the IMAGE and NIFTI files together in one class.</em></span>
													</div>
												</form>
											</div>
											<div class="col-6">
												<!-- Preview -->
                                                <i class="fas fa-question-circle" style="padding-right:5px;margin-bottom:7px;" title="Preview your uploaded images" data-plugin="tippy" data-tippy-placement="right-start" data-tippy-maxWidth="200px" data-tippy-offset="0, 0"></i>
                                                <h4 class="header-title" style="display: inline-block;">Preview Container</h4>
												<h4 class="header-title" id="output" style="display: inline-block;position: absolute; right: 0px;">Total Files: 0</h4>
                                                <div class="dropzone-previews mt-3" id="file-previews" style="margin-top:0.7rem !important; max-height: 428px; overflow-y: auto;"></div>
											</div>
										</div>
                                    </div> <!-- end card-body-->
									<div class="modal-footer" style="padding-top:0px !important;">
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

		<!-- Sweet Alerts js -->
		<script src="template/Template/Admin/dist/assets/libs/sweetalert2/sweetalert2.min.js"></script>

		<!-- Sweet alert init js-->
		<script src="template/Template/Admin/dist/assets/js/pages/sweet-alerts.init.js"></script>
		
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
							acceptedFiles: "image/jpeg,image/png,image/jpg,.nii",
							url:e,
							maxFilesize: 200,
							autoProcessQueue: false,
							maxFiles: 150,
							parallelUploads: 150,
							init: function() {
								myDropzone = this;
								$("#upload").click(function (e) {
									e.preventDefault();
									if(myDropzone.getAcceptedFiles().length>=20)
									{
										myDropzone.processQueue();
										$("#status").delay(500).fadeIn();
                						$("#preloader").delay(500).fadeIn("fast");
									}
									else
									{
										Swal.fire({
											title: 'Failure',
											html: 'Please upload the files<br>(Less than 200 MB and  20 - 150 files allowed only)',
											type: 'error',
											backdrop:'#eeeff3',
											confirmButtonColor: '#6658dd',
											allowOutsideClick: false,
											animation:true,
										});
									} 
								});
								myDropzone.on("addedfile", function(file) {
									$("#output").html('Total Files: ' + myDropzone.files.length);
								});
								myDropzone.on("removedfile", function(file) {
									$("#output").html('Total Files: ' + myDropzone.files.length);
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
									$("#status").delay(500).fadeOut();
                					$("#preloader").delay(500).fadeOut("fast");
									Swal.fire({
										title: 'Success',
										text: 'Upload files successful',
										type: 'success',
										confirmButtonColor: '#6658dd',
										backdrop:'#eeeff3',
										allowOutsideClick: false,
										animation:true,
										}).then(function(){
											window.location='training.php?id=<?=$_GET['id']?>';
										});
								}			
							},
							error: function(file, response){
								this.removeFile(file);
								Swal.fire({
									title:'Failure',
									html: file.name+" is not added because "+response,
									type: 'error',
									backdrop:'#eeeff3',
									confirmButtonColor: '#6658dd',
									allowOutsideClick: false,
									animation:true,
								});
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
					if(event.target.textContent.match(/[/:?\\*\"<>|]/))
					{
						Swal.fire({
							title: 'Failure',
							html: "Class name can't contain any of the following characters: <br> \\ / : * ? \" < > |",
							type: 'error',
							backdrop:'#eeeff3',
							showConfirmButton: true,
							confirmButtonColor: '#6658dd',
							allowOutsideClick: false,
							animation:true,
						}).then(function(){
							event.target.innerText="<?=$new_name?>";
						});
					}
					else
					{
						$.ajax({
							type: "POST",
							dataType : 'json',
							url: "check_duplicate_class.php?id=<?=$_GET['id']?>",
							data: { 
								name: event.target.textContent,
							},
							success: function(result) {
								if(result.Status==true)
								{
									Swal.fire({
										title: 'Failure',
										text: result.Result,
										type: 'error',
										backdrop:'#eeeff3',
										showConfirmButton: true,
										confirmButtonColor: '#6658dd',
										allowOutsideClick: false,
										animation:true,
									}).then(function(){
										event.target.innerText="<?=$new_name?>";
									});
								}
							},
							error: function(result) {
								console.log(result);
								console.clear();
							}
						});
					}
				})
			})
		</script>
    </body>
</html>