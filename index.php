<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Image Classification System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="Landing/Logo/faviconLogo.ico">

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="Landing/css/bootstrap.min.css" type="text/css">

        <!--Material Icon -->
        <link rel="stylesheet" type="text/css" href="Landing/css/materialdesignicons.min.css" />

        <!-- Custom  sCss -->
        <link rel="stylesheet" type="text/css" href="Landing/css/style.css" />

    </head>

    <body>
        <!--Navbar Start-->
        <nav class="navbar navbar-expand-lg fixed-top navbar-custom sticky sticky-dark">
            <div class="container-fluid">
                <!-- LOGO -->
                <a class="logo text-uppercase" href="index.php">
                    <img src="Landing/Logo/light-logo.png" alt="" class="logo-light" height="21" style="max-width: 404px;height: 70px;" />
                    
                    <img src="Landing/Logo/dark-logo.png" alt="" class="logo-dark" height="21" style="max-width: 380px;height: 70px;" />
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="mdi mdi-menu"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mx-auto navbar-center" id="mySidenav">
                        <li class="nav-item active">
                            <a href="#home" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="#features" class="nav-link">Features</a>
                        </li>
                        <li class="nav-item">
                            <a href="#tutorial" class="nav-link">Tutorial</a>
                        </li>
                        <li class="nav-item">
                            <a href="#about" class="nav-link">Our Team</a>
                        </li>
                    </ul>
                    <button onclick="window.location.href='signin.php'" class="btn btn-info navbar-btn">Sign In / Sign Up</button>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->

        <!-- home start -->
        <section class="bg-home bg-gradient" id="home" style="background: linear-gradient(to right, #000428, #6658dd);">
            <div class="home-center">
                <div class="home-desc-center">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="home-title mo-mb-20">
                                    <h1 class="mb-4 text-white">Image Classification System</h1>
                                    <p class="text-white-50 home-desc mb-5">Image Classification System is a web application system where users can input images into different classes, train the model and test the model to see whether it can correctly classify the image.</p>
                                    <div class="subscribe">
                                        <div class="col-md-4" style="padding-bottom: 50px;padding-left: 0px;">
                                            <button onclick="window.location.href='signin.php'" class="btn btn-info">Get Started</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 offset-xl-2 col-lg-5 offset-lg-1 col-md-7">
                                <div class="home-img position-relative">
                                    <img src="Landing/images/Home1.png" alt="" class="home-first-img">
                                    <img src="Landing/images/Home2.png" alt="" class="home-second-img mx-auto d-block">
                                    <img src="Landing/images/Home3.png" alt="" class="home-third-img">
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end container-fluid -->
                </div>
            </div>
        </section>
        <!-- home end -->

        <!-- features start -->
        <section class="section-sm" id="features">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="text-center mb-4 pb-1">
                            <h1 class="mb-3"><em>System Features</em></h1>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-lg-4">
                        <div class="features-box">
                            <div class="features-img mb-4">
                                <img src="Landing/images/icons/layers.png" alt="">
                            </div>
                            <h4 class="mb-2">Multiple Classes</h4>
                            <p class="text-muted">Allows user input different category of image dataset</p>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-lg-4">
                        <div class="features-box">
                            <div class="features-img mb-4">
                                <img src="Landing/images/icons/connections.png" alt="">
                            </div>
                            <h4 class="mb-2">Model Selection</h4>
                            <p class="text-muted">Allows user choose different model to train the model</p>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-lg-4">
                        <div class="features-box">
                            <div class="features-img mb-4">
                                <img src="Landing/images/icons/datatext.png" alt="">
                            </div>
                            <h4 class="mb-2">Customize Parameters</h4>
                            <p class="text-muted">Allows user specifiy the number of batch-size & epoch</p>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="features-box">
                            <div class="features-img mb-6">
                                <img src="Landing/images/icons/financestat.png" alt="">
                            </div>
                            <h4 class="mb-3">Model Summary</h4>
                            <p class="text-muted">Provide several graph to represent the summary of the model</p>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-lg-6">
                        <div class="features-box">
                            <div class="features-img mb-6">
                                <img src="Landing/images/icons/download.png" alt="">
                                <img src="Landing/images/icons/upload.png" alt="">
                            </div>
                            <h4 class="mb-3">Export & Load Model</h4>
                            <p class="text-muted">Allows user download or upload the model including the model summary</p>
                        </div>
                    </div>
                    <!-- end col -->
                </div> <!-- end row -->
            </div> <!-- end container-fluid -->
        </section>
        <!-- features end -->

        <!-- available demos start -->
        <section class="section bg-light" id="tutorial">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="title text-center mb-3">
                            <h1 class="mb-3"><em>Tutorial</em></h1>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="demo-box bg-white mt-4 p-2">
                            <img src="Landing/images/Tutorial1.png" alt="" class="img-fluid mx-auto d-block">
                            <div class="p-3" style="padding-bottom: 8px!important;">
                                <h3 class="mb-3">Group</h3>
                                <p class="text-muted">Upload your image and group into different classes that you want the computer to learn.</p>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-lg-4 col-md-6">
                        <div class="demo-box bg-white mt-4 p-2">
                            <img src="Landing/images/Tutorial2.png" alt="" class="img-fluid mx-auto d-block">
                            <div class="p-3" style="padding-bottom: 8px!important;">
                                <h3 class="mb-3">Set & Train</h3>
                                <p class="text-muted">Select the model & set the number of batch-size, epoch, then train your model.</p>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-lg-4 col-md-6">
                        <div class="demo-box bg-white mt-4 p-2">
                            <img src="Landing/images/Tutorial3.png" alt="" class="img-fluid mx-auto d-block">
                            <div class="p-3" style="padding-bottom: 8px!important;">
                                <h3 class="mb-3">Predict</h3>
                                <p class="text-muted">Upload your predict image to test the model to see whether it can correctly classify your image.</p>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div> <!-- end container-fluid -->
        </section>
        <!-- available demos end -->

        <!-- faqs start -->
        <section class="section-sm" id="about">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="text-center mb-5">
                            <h1 class="mb-3"><em>Our Team</em></h1>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                <div class="row">
                    <div class="col-lg-3">
                        <div class="features-box">
                            <div class="features-img mb-6">
                                <img src="Landing/TeamPhoto/Elaine.jpg" alt="" class="img-fluid rounded-circle" style="max-height:100px;width:100px;">
                            </div>
                            <h4 class="mb-2" style="padding-top:10px;">Elaine Wong Wen Rou</h4>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="features-box">
                            <div class="features-img mb-6">
                                <img src="Landing/TeamPhoto/Chua.jpg" alt="" class="img-fluid rounded-circle" style="max-height:100px">
                            </div>
                            <h4 class="mb-2" style="padding-top:10px;">Chua Chung Long</h4>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="features-box">
                            <div class="features-img mb-6">
                                <img src="Landing/TeamPhoto/Harold.jpg" alt="" class="img-fluid rounded-circle" style="max-height:100px; width:100px;">
                            </div>
                            <h4 class="mb-2" style="padding-top:10px;">Harold Mah Wei Jing</h4>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="features-box">
                            <div class="features-img mb-6">
                                <img src="Landing/TeamPhoto/Jasmin.jpg" alt="" class="img-fluid rounded-circle" style="max-height:100px">
                            </div>
                            <h4 class="mb-2" style="padding-top:10px;">Jasmin Chu Ze Kee</h4>
                        </div>
                    </div>
                </div>
                <!-- end row -->

            </div> <!-- end container-fluid -->
        </section>
        <!-- faqs end -->

        <!-- footer start -->
        <footer class="bg-dark footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="float-left pull-none">
                            <p class="text-white-50"> <script>document.write(new Date().getFullYear())</script> &copy; Image Classification</p>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- container-fluid -->
        </footer>
        <!-- footer end -->
        
        <!-- Back to top -->    
        <a href="#" class="back-to-top" id="back-to-top"> <i class="mdi mdi-chevron-up" style="background:#4FC6E1"> </i> </a>


        <!-- javascript -->
        <script src="Landing/js/jquery.min.js"></script>
        <script src="Landing/js/bootstrap.bundle.min.js"></script>
        <script src="Landing/js/jquery.easing.min.js"></script>
        <script src="Landing/js/scrollspy.min.js"></script>

        <!-- custom js -->
        <script src="Landing/js/app.js"></script>
    </body>

</html>