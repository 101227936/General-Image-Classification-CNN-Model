<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Sign In - Image Classification System</title>
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

        <!--firebse-->
        <script src="template/Template/Admin/dist/assets/js/firebase-ui-auth.js"></script>
        <script src="https://www.gstatic.com/firebasejs/7.6.1/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/7.6.1/firebase-auth.js"></script>    
        <link type="text/css" rel="stylesheet" href="https://www.gstatic.com/firebasejs/ui/4.8.1/firebase-ui-auth.css" />
        <script src="firebase.js"></script>
        <script>
            firebase.auth().onAuthStateChanged((user) => {
                if (user) {
                    window.location.href="home.php";
                }
            });
        </script>

    </head>

    <body class="auth-fluid-pages pb-0">
        <!-- Pre-loader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner">Loading...</div>
            </div>
        </div>
        <div class="auth-fluid">
            <!--Auth fluid left content -->
            <div class="auth-fluid-form-box">
                <div class="align-items-center d-flex h-100">
                    <div class="card-body">

                       <!-- Logo -->
                       <div class="auth-brand text-center text-lg-left">
                            <div class="auth-logo">
                                <a href="index.php" class="logo logo-dark text-center">
                                    <span class="logo-lg">
                                        <img src="Landing/Logo/dark-logo.png" alt="" height="50">
                                    </span>
                                </a>
            
                                <a href="index.php" class="logo logo-light text-center">
                                    <span class="logo-lg">
                                        <img src="Landing/Logo/light-logo.png" alt="" height="50">
                                    </span>
                                </a>
                            </div>
                        </div>

                        <!-- title-->
                        <h4 class="mt-0">Sign In / Sign Up</h4>
                        <p class="text-muted mb-5">Sign in / Sign Up With Email or Google to access account.</p>

                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-9">
                                    <div id="firebaseui-auth-container"></div>
                                    <div id="loader">Loading...</div>
                                </div>
                            </div>
                        </div>

                        <!-- Footer-->
                        <footer class="footer footer-alt">
                            <p class="text-dark">2021 © Image Classification <a href="index.php" class="text-dark ml-1"><b>Return To Landing Page</b></a></p>
                        </footer>

                    </div> <!-- end .card-body -->
                </div> <!-- end .align-items-center.d-flex.h-100-->
            </div>
            <!-- end auth-fluid-form-box-->

            <!-- Auth fluid right content -->
            <div class="auth-fluid-right text-center">
                <div class="auth-user-testimonial">
                    <h2 class="mb-3 text-white">Image classification</h2>
                    <p class="lead"><i class="mdi mdi-format-quote-open"></i> the process of categorizing and labeling groups of pixels or vectors within an image based on specific rules. <i class="mdi mdi-format-quote-close"></i>
                    </p>
                    <h5 class="text-white">
                        - The Cognitive Approach in Cloud Computing and Internet of Things Technologies for Surveillance Tracking Systems, 2020
                    </h5>
                </div> <!-- end auth-user-testimonial-->
            </div>
            <!-- end Auth fluid right content -->
   
        </div>
        <!-- end auth-fluid-->

        <!-- Vendor js -->
        <script src="template/Template/Admin/dist/assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="template/Template/Admin/dist/assets/js/app.min.js"></script>
                
        <script>
            // Initialize the FirebaseUI Widget using Firebase.
            var ui = new firebaseui.auth.AuthUI(firebase.auth());

            var uiConfig =
            {
                callbacks:
                {
                    signInSuccessWithAuthResult: function(authResult, redirectUrl)
                    {
                        console.log(authResult);
                        // User successfully signed in.
                        // Return type determines whether we continue the redirect automatically
                        // or whether we leave that to developer to handle.
                        $.ajax({
                            method: "POST",
                            url: "create_folder.php",
                            data: {'uid': authResult.user.uid}
                        })
                        .done(function( msg ) {
                            console.log(msg);
                        });
                        return true;
                    },
                    uiShown: function() 
                    {
                        // The widget is rendered.
                        // Hide the loader.
                        document.getElementById('loader').style.display = 'none';
                    }
                },
                // Will use popup for IDP Providers sign-in flow instead of the default, redirect.
                signInFlow: 'redirect',
                signInSuccessUrl: 'home.php',
                signInOptions: [
					{
						  provider: firebase.auth.EmailAuthProvider.PROVIDER_ID,
						  fullLabel: 'With Email Account',
					  
					},
					{
					    provider: firebase.auth.GoogleAuthProvider.PROVIDER_ID,
						fullLabel: 'With Google Account'
					  
					}
                ]
            };
            // The start method will wait until the DOM is loaded.
            ui.start('#firebaseui-auth-container', uiConfig);
			setTimeout(function() {
				var button = document.querySelector('[data-provider-id="google.com"]');
				if (button) {
				  button.innerHTML = `Sign up with Google`;
				}
			  });
        </script>
    </body>
</html>