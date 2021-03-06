<!-- Sweet Alert-->
<link href="template/Template/Admin/dist/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

<script src="https://www.gstatic.com/firebasejs/ui/4.8.1/firebase-ui-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.6.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.6.1/firebase-auth.js"></script>    
<script src="https://www.gstatic.com/firebasejs/7.6.1/firebase-firestore.js"></script>   
<link type="text/css" rel="stylesheet" href="https://www.gstatic.com/firebasejs/ui/4.8.1/firebase-ui-auth.css" />

<!-- End Preloader-->
<script src="firebase.js"></script>

<!-- Pre-loader -->
<div id="preloader">
	<div id="status">
		<div class="spinner">Loading...</div>
	</div>
</div>

<script>
	firebase.auth().onAuthStateChanged((user) => {
	  if (user) {
		// User is signed in, see docs for a list of available properties
		// https://firebase.google.com/docs/reference/js/firebase.User
		<?php
			if(!isset($_GET['id']))
			{
				?>
				window.location=window.location.href+"?id="+user.uid;
				<?php
			}
			else
			{
				?>
				const queryString = window.location.search;
				const urlParams = new URLSearchParams(queryString);
				const id = urlParams.get('id')
				if(user.uid!=id)window.location=location.protocol + '//' + location.host + location.pathname+"?id="+user.uid;
				<?php
			}
		?>
		$.ajax({
			method: "POST",
			url: "create_folder.php",
			data: {'uid': user.uid}
		})
		.done(function( msg ) {
			
		});
	  } else {
		window.location.href="index.php";
	  }
	});
</script>

<!-- Topbar Start -->
  <div class="navbar-custom">
    <div class="container-fluid">
        <div class="navbar-custom">
            <!-- LOGO -->
            <div class="logo-box">
                <a href="index.php" class="logo logo-light text-center">
                    <span class="logo-lg">
                        <img src="Landing/Logo/light-logo.png" alt="" height="40">
                    </span>
                </a>
				<a href="index.php" class="logo logo-light text-center">
                    <span class="logo-sm">
                        <img src="Landing/Logo/light-logo-sm.png" alt="" height="30">
                    </span>
                </a>
            </div>

			<ul class="list-unstyled topnav-menu topnav-menu-left m-0">
				
                <li class="dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-light" href="home.php" role="button" style="padding:0px 5px !important;">
                        <i class="mdi mdi-home"></i> 
                        Home
                    </a>
                </li>	
				<li class="dropdown d-xl-block">
                    <a class="nav-link dropdown-toggle waves-effect waves-light" href="predict_result_table.php" role="button" style="padding:0px 8px !important;">
                        <i class="mdi mdi-information-outline"></i> 
                        Overview
                    </a>
                </li>			
            </ul>

            <div class="container-fluid">
				<ul class="list-unstyled topnav-menu float-right mb-0">

					<li class="dropdown notification-list topbar-dropdown">
						<a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" style="padding:0px 5px !important;" role="button" aria-haspopup="false" aria-expanded="false">
							<img src="Landing/Logo/light-logo.png" id="uImage" alt="user-image" class="rounded-circle">
							<span class="pro-user-name ml-1" id="uName">
								Default Username
							</span>
							<i class="mdi mdi-chevron-down"></i> 
						</a>
						<div class="dropdown-menu dropdown-menu-right profile-dropdown" style="">
							<!-- item-->
							<a href="user_profile.php" class="dropdown-item notify-item">
								<i class="fe-user"></i>
								<span>My Account</span>
							</a>

							<div class="dropdown-divider"></div>

							<!-- item-->
							<button onclick="askSignOut()" class="dropdown-item notify-item">
								<i class="fe-log-out"></i>
								<span>Logout</span>
							</button>
						</div>
					</li>
				</ul> 
			</div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- end Topbar -->

<!-- Sweet Alerts js -->
<script src="template/Template/Admin/dist/assets/libs/sweetalert2/sweetalert2.min.js"></script>

<script>
firebase.auth().onAuthStateChanged(function(user)
{
	document.getElementById('uName').textContent = user.displayName;               //display Name
	if(user.photoURL == null)
	{
		document.getElementById('uImage').src = "Landing/images/defaultUser.jpg";
		user.updateProfile({
			photoURL: "Landing/images/defaultUser.jpg"
		});
	}
	else
	{
		document.getElementById('uImage').src = user.photoURL;               //display Name

	}
});

function askSignOut()
{
	swal({
	title: 'Are you sure?',
	text:'You will be return to the landing page and you will need to log in again next time',
	type: 'warning',
	showCancelButton: true,
	confirmButtonColor: '#6658dd',
	backdrop:'#eeeff3',
	cancelButtonColor: '#d33',
	confirmButtonText: 'Yes',
	allowOutsideClick: false,
    animation:true,
	}).then(function (result) {
		if (result.value) {
			firebase.auth().signOut();
		}
	})
}
</script>

