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
                                    <img src="https://www.computerhope.com/jargon/g/guest-user.jpg" id="imageUser" class="rounded-circle avatar-xl img-thumbnail" alt="profile-image">

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
                                                            <label>Password</label>
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

                            <div class="col-lg-7 col-xl-7 ">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="page-title-box">
                                                <h6 class="page-title">History Result</h6>      
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
    </body>

</html>