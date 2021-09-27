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

		<!-- icons -->
		<link href="template/Template/Admin/dist/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    </head>

    <body data-layout-mode="horizontal">

        <script>
            const history123 = JSON.parse(window.localStorage.getItem("history123"));
            if (performance.navigation.type == performance.navigation.TYPE_RELOAD)
            {
                window.location.href = 'get_history.php';
            }
        </script>

        <?php
            $length = $_COOKIE["length"];
            $i = 0;
            $history = array();
            while($i < $length){
                $push_arr = array('metadata' => "<script>document.write(history123[".$i."].metadata)</script>",
                                    'preTrainedModel' => "<script>document.write(history123[".$i."].preTrainedModel)</script>",
                                    'epoch' => "<script>document.write(history123[".$i."].epoch)</script>",
                                    'batchSize' => "<script>document.write(history123[".$i."].batchSize)</script>",
                                    'accuracy' => "<script>document.write(history123[".$i."].accuracy)</script>",
                                    'precision' => "<script>document.write(history123[".$i."].precision)</script>",
                                    'recall' => "<script>document.write(history123[".$i."].recall)</script>",
                                    'fscore' => "<script>document.write(history123[".$i."].fscore)</script>",
                                    'score' => "<script>document.write(history123[".$i."].score)</script>",
                                    'errorRate' => "<script>document.write(history123[".$i."].errorRate)</script>");
                array_push($history, $push_arr);
                $i++;
            }
        ?>


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
                                                    <thead>
                                                        <tr>
                                                            <th>Hidden Data</th>
                                                            <th>Metadata + Number of image dataset</th>
                                                            <th>Pre-trained Model</th>
                                                            <th>Epoch</th>
                                                            <th>Batch Size</th>
                                                            <th>Accuracy </th>
                                                        </tr>
                                                    </thead>
                                                
                                                    <?php
                                                    $i = 0;
                                                    foreach($history as $his)
                                                    {?>
                                                    <tbody>
                                                        <tr>
                                                            <td><a data-toggle="collapse" class="collapsed" href=<?='#collapse'.$i?> role="button" aria-expanded="false" aria-controls="card_accu"><i class="mdi mdi-chevron-down"></i></a></td>
                                                            <td><?=$his['metadata']?></td>
                                                            <td><?=$his['preTrainedModel']?></td>
                                                            <td><?=$his['epoch']?></td>
                                                            <td><?=$his['batchSize']?></td>
                                                            <td><?=$his['accuracy']?></td>
                                                    </tr>
                                                    </tbody>
                                                    <?php
                                                    $i++;
                                                    }?>
                                                </table>
                                                
                                                <?php
                                                $i = 0;
                                                foreach($history as $his)
                                                {?>
                                                <div class="card">
                                                    <div id=<?='collapse'.$i?> class="collapse bg-light">
                                                        <div class="card-body text-white">
                                                        <table id="datatable-buttons2" class="table table-striped dt-responsive nowrap w-100 collapsed">
                                                            <thead>
                                                                <tr>
                                                                    <th>Precision</th>
                                                                    <th>Recall</th>
                                                                    <th>F-score</th>
                                                                    <th>Score</th>
                                                                    <th>Error Rate</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td><?=$his['precision']?></td>
                                                                    <td><?=$his['recall']?></td>
                                                                    <td><?=$his['fscore']?></td>
                                                                    <td><?=$his['score']?></td>
                                                                    <td><?=$his['errorRate']?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                $i++;
                                                }?>
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