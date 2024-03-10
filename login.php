<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sidharth Kumar - OnePage Portfolio HTML5 Template</title>
	<link rel="icon" type="image/x-icon" href="images/favicon.png">

	<!-- Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">

	<!-- Stylesheet -->
	<link rel="stylesheet" href="css/line-awesome.min.css">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/animate.min.css">
	<link rel="stylesheet" href="css/smooth-scrollbar.css">
	<link rel="stylesheet" href="css/lightbox.min.css">

	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/responsive.css">

</head>

<body class="home1-page">

	<?php
	include 'inc/NavBar.php';
	?>

	<section class="contact-area page-section scroll-content mt-5 pt-5" id="contact">
		<div class="custom-container">
			<div class="contact-content content-width">
				<div class="section-header">
					<h4 class="subtitle scroll-animation" data-animation="fade_from_bottom">
						<i class="las la-dollar-sign"></i> Login
					</h4>
					<h1 class="scroll-animation" data-animation="fade_from_bottom">Let's
						<span>Login!</span>
					</h1>
				</div>
				<p id="required-msg">* Marked fields are required to fill.</p>

				<form class="contact-form scroll-animation" data-animation="fade_from_bottom" action="php/login.php" method="post">

					<?php if (isset($_GET['error'])) { ?>
						<div class="alert alert-success messenger-box-contact__msg" role="alert">
							<?php echo htmlspecialchars($_GET['error']); ?>
						</div>
					<?php } ?>

					<div class="row">
						<div class="col-md-12">
							<div class="input-group">
								<label for="uname">User Name <sup>*</sup></label>
								<input type="text" name="uname" id="uname" placeholder="User Name" value="<?php echo (isset($_GET['uname'])) ? htmlspecialchars($_GET['uname']) : "" ?>">
							</div>
						</div>
						<div class="col-md-12">
							<div class="input-group">
								<label for="password">Password <sup>*</sup></label>
								<input type="password" name="pass" id="pass" placeholder="Password" value="<?php echo (isset($_GET['pass'])) ? htmlspecialchars($_GET['pass']) : "" ?>">
							</div>
						</div>
						<div class="col-md-12">
							<div class="input-group submit-btn-wrap">
								<button class="theme-btn" name="submit" type="submit">Login</button>
							</div>
						</div>
						<p class="mt-3">Not have an account?<a href="signup.php" class="link-secondary"> Register</a></p>

						<a href="admin-login.php" class="link-secondary">Admin Login</a>
						&nbsp;&nbsp;&nbsp;
						<a href="blog.php" class="link-secondary"><u>Visit my latest Blog<u></a>

					</div>
				</form>

			</div>
		</div>
	</section>
	</div>
	</div>
	</main>


	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/owl.carousel.js"></script>
	<script src="js/gsap.min.js"></script>
	<script src="js/ScrollTrigger.min.js"></script>
	<script src="js/ScrollToPlugin.min.js"></script>
	<script src="js/lightbox.min.js"></script>

	<script src="js/main.js"></script>
	<!-- <script src="js/ajax-form.js"></script> -->
	<script src="js/color.js"></script>

</body>

</html>