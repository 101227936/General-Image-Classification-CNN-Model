<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>User Profile - Image Classification System</title>
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
		
		 <!-- third party css -->
        <link href="template/Template/Admin/dist/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="template/Template/Admin/dist/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="template/Template/Admin/dist/assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- third party css end -->

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
                                    <h4 class="page-title">My Profile</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title --> 


                        <div class="row">
                            <div class="col-lg-5 col-xl-5">
                                <div class="card-box text-center">
                                    <img src="" id="imageUser" class="rounded-circle avatar-xl img-thumbnail" alt="profile-image">

                                    <h3 class="mb-0" id="userName">UserName</h4>
                                    <h4 class="mb-0" id="userEmail">useremail@gmail.com</h4>
                                    <br>
                                    <form>
                                        <h5 class="mb-3 text-uppercase bg-light p-2 text-left"><i class="mdi mdi-menu mr-1"></i>Edit Personal Info</h5>
                                            <div class="row text-left">
                                                <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label>Username</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" placeholder="Enter your username" id="username">
                                                            <div class="input-group-append">
                                                                <button class="btn btn-dark waves-effect waves-light" type="button" onclick="validateUsername()">Update</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- end row -->

                                            <div class="row text-left">
                                                <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label>Photo URL</label>
                                                        <div class="input-group">
                                                            <input type="url" class="form-control" placeholder="Enter your photo url" id="photourl" onkeyup="previewFile(this.value)">
                                                            <div class="input-group-append">
                                                                <button class="btn btn-dark waves-effect waves-light" type="button" onclick="validatePhotoURL()">Update</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label>Photo Preview</label>
                                                        <div class="input-group">
                                                            <div class="text-center">
                                                                <img id="image" class="rounded-circle avatar-xl img-thumbnail" src="" alt="Image preview...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- end row -->
                                        
                                        <h5 class="mb-3 text-uppercase text-left bg-light p-2"><i class="mdi mdi-account mr-1"></i>Edit Account</h5>
                                            <div class="row text-left">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label>Email</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" placeholder="Enter your email" id="email">
                                                                <div class="input-group-append">
                                                                    <button class="btn btn-dark waves-effect waves-light" type="button" onclick="validateEmail()">Update</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label>Password (at least 6 characters)</label>
                                                            <div class="input-group">
                                                                <input type="password" class="form-control" placeholder="Enter your new password" id="password">
                                                                <div class="input-group-append" data-password="false">
                                                                    <div class="input-group-text">
                                                                        <span class="password-eye"></span>
                                                                    </div>
                                                                    <button class="btn btn-dark waves-effect waves-light" type="button" onclick="validatePassword()">Update</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> <!-- end row -->
                                            </form>
                                </div> <!-- end card-box -->
                            </div> <!-- end col-->

                            <div class="col-lg-7 col-xl-7">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="page-title-box">
                                                <h6 class="page-title"> <i class="mdi mdi-history"></i> HISTORY RESULT</h6>
												<table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row-->

                    </div> <!-- container -->

                </div> <!-- content -->

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

            <!-- Footer Start -->
            <?php include "footer.php";?>
            <!-- Footer Start -->
            </div>
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
	   
	   <script src="template/Template/Admin/dist/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="template/Template/Admin/dist/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="template/Template/Admin/dist/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="template/Template/Admin/dist/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
        <script src="template/Template/Admin/dist/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="template/Template/Admin/dist/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="template/Template/Admin/dist/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="template/Template/Admin/dist/assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
        <script src="template/Template/Admin/dist/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="template/Template/Admin/dist/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <script src="template/Template/Admin/dist/assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>

       <!-- App js -->
       <script src="template/Template/Admin/dist/assets/js/app.min.js"></script>

       <script>
        firebase.auth().onAuthStateChanged(function(user)
        {
            document.getElementById('userName').textContent = user.displayName; 
            document.getElementById('username').value = user.displayName;           //textfield

            document.getElementById('userEmail').textContent = user.email;
            document.getElementById('email').value = user.email;                    //textfield

            document.getElementById('imageUser').src = user.photoURL;
            document.getElementById('photourl').value = user.photoURL;              //textfield

            document.getElementById('image').src = user.photoURL;

        });
       </script>
	   
		<script>
		function getDatainTable(){
			var dataSet = new Array();
			var i=1;
			var db = firebase.firestore();
			db.collection("Users").doc("<?=$_GET['id'];?>").collection("History").get().then((querySnapshot) => {
				querySnapshot.forEach((doc) => {
					console.log(doc.data());
					dataSet.push([doc.data().metadata,
									doc.data().preTrainedModel,
									doc.data().epoch,
									doc.data().batchSize,
									doc.data().accuracy,
									doc.data().precision,
									doc.data().recall,
									doc.data().fscore,
									doc.data().score,
									doc.data().errorRate]);
                    i=i+1;
				})
			}).then(function() {
				$("#datatable-buttons").DataTable({
				data: dataSet,
				"paging":   true,
				"lengthChange": false,
				"searching": false,
				"pageLength": 3,
				columns: [
					{ title: "Metadata + Number of image dataset" },
					{ title: "Pre-trained Model" },
					{ title: "Epoch" },
					{ title: "Batch Size" },
					{ title: "Accuracy" },
					{ title: "Precision", "className": "none" },
					{ title: "Recall", "className": "none" },
					{ title: "F-score", "className": "none" },
					{ title: "Score", "className": "none" },
					{ title: "Error Rate", "className": "none" }
				],
				"columnDefs": [
							{ responsivePriority: 1, targets: 0 },
							{ responsivePriority: 2, targets: 4 }
				],
				language: {
					paginate: {
						previous: "<i class='mdi mdi-chevron-left'>",
						next: "<i class='mdi mdi-chevron-right'>"
					}
				},
				drawCallback: function() {
					$(".dataTables_paginate > .pagination").addClass("pagination-rounded")
				}
			});
			});
			
			
		}
		$(document).ready(function() {
			getDatainTable();
		});
		</script>
		<script>
           function validateUsername()
           {
                firebase.auth().onAuthStateChanged(function(user)
                {
                    var uname = document.getElementById("username").value;
                    if (uname != "")
                    {
                        const user = firebase.auth().currentUser;
                        user.updateProfile({
                            displayName: uname,
                        }).then(() => {
                            swal({
                                title: 'Update Username Success',
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
                    else
                    {
                        swal({
                            title: 'Update Username Failed',
                            text:'Username column cannot be empty.',
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
                    }
                });
            
           }
        
           var PhotoURLCorrect = true; //bool
           function previewFile(value)
           {
				if(value.length>=0)
				{
					var myImageElement = document.getElementById('image');
					myImageElement.src = 'https://media4.giphy.com/media/3oEjI6SIIHBdRxXI40/200.gif';
					var url = value;
					var img = new Image();
					img.src = url;
					img.addEventListener('load', function() {
                        PhotoURLCorrect = true;
						var myImageElement = document.getElementById('image');
						myImageElement.src = url;
					});
                    img.addEventListener('error', function() {
						PhotoURLCorrect = false;
					});
				}
			}

           function validatePhotoURL()
           {
                firebase.auth().onAuthStateChanged(function(user)
                {
                    var uphotourl = document.getElementById("photourl").value;
                    if (uphotourl != "")
                    {
                        if(PhotoURLCorrect != false)
                        {
                            const user = firebase.auth().currentUser;
                            user.updateProfile({
                                photoURL: uphotourl,
                            }).then(() => {
                                swal({
                                title: 'Update Photo URL Success',
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
                                //
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
                        else
                        {
                            swal({
                                title: 'Update Photo URL Failed',
                                text:'Photo URL incorrect, cannot link to the image.',
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
                        }
                    }
                    else
                    {
                        swal({
                            title: 'Update Photo URL Failed',
                            text:'Photo URL column cannot be empty.',
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
                    }
                }); 
           }

           function validateEmail()
           {
                firebase.auth().onAuthStateChanged(function(user)
                {
                    var uemail = document.getElementById("email").value;
                    if (uemail != "")
                    {
                        const user = firebase.auth().currentUser;

                        user.updateEmail(uemail).then(() => {
                            swal({
                            title: 'Update Email Success',
                            type: 'success',
                            confirmButtonColor: '#6658dd',
                            backdrop:'#eeeff3',
                            confirmButtonText: 'Yes',
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
                            confirmButtonText: 'Ok',
                            allowOutsideClick: false,
                            animation:true,
                            }).then(function (result) {
                                if (result.value) {
                                    location.reload();
                            }
                            })
                        });
                    }
                    else
                    {
                        swal({
                            title: 'Update Email Failed',
                            text:'Email column cannot be empty.',
                            type: 'error',
                            confirmButtonColor: '#6658dd',
                            backdrop:'#eeeff3',
                            confirmButtonText: 'Ok',
                            allowOutsideClick: false,
                            animation:true,
                            }).then(function (result) {
                                if (result.value) {
                                    location.reload();
                            }
                        })
                    }
                });
           }

           function validatePassword()
           {
                firebase.auth().onAuthStateChanged(function(user)
                {
                    var upassword = document.getElementById("password").value;
                    if (upassword != "")
                    {
                        const user = firebase.auth().currentUser;

                        user.updatePassword(upassword).then(() => {
                            swal({
                            title: 'Update Password Success',
                            type: 'success',
                            confirmButtonColor: '#6658dd',
                            backdrop:'#eeeff3',
                            confirmButtonText: 'Yes',
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
                            confirmButtonText: 'Ok',
                            allowOutsideClick: false,
                            animation:true,
                            }).then(function (result) {
                                if (result.value) {
                                    location.reload();
                            }
                            })
                        });
                    }
                    else
                    {
                        swal({
                            title: 'Update Password Failed',
                            text:'Password column cannot be empty.',
                            type: 'error',
                            confirmButtonColor: '#6658dd',
                            backdrop:'#eeeff3',
                            confirmButtonText: 'Ok',
                            allowOutsideClick: false,
                            animation:true,
                            }).then(function (result) {
                                if (result.value) {
                                    location.reload();
                            }
                        })
                    }
                });
           }
       </script>

        <script>
			
		</script>

    </body>
    
</html>
