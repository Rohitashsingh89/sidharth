<?php
// session_start();
$logged = false;
if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
	$logged = true;
	$user_id = $_SESSION['user_id'];
}
$notFound = 0;
?>


<video class="body-overlay" muted="" autoplay="" loop="">
	<source src="media/video1.mp4" type="video/mp4">
</video>

<div class="page-loader">
	<div class="bounceball"></div>
</div>

<span class="icon-menu">
	<span class="bar"></span>
	<span class="bar"></span>
</span>

<!-- <div class="global-color">
	<span class="setting-toggle">
		<i class="las la-cog"></i>
	</span>
	<div class="inner">
		<div class="overlay"></div>
		<div class="global-color-option">
			<span class="close-settings">
				<i class="las la-times"></i>
			</span>
			<h2>Configuration</h2>
			<div class="global-color-option-inner">
				<p>Colors</p>
				<div class="color-boxed">
					<a href="#" class="clr-active" onclick="color1();"></a>
					<a href="#" onclick="color2();"></a>
					<a href="#" onclick="color3();"></a>
					<a href="#" onclick="color4();"></a>
					<a href="#" onclick="color5();"></a>
					<a href="#" onclick="color6();"></a>
					<a href="#" onclick="color7();"></a>
					<a href="#" onclick="color8();"></a>
				</div>

				<p>THREE DIMENSIONAL SHAPES</p>
				<ul class="themes">
					<li class="active"><a href="./home1.html">Earth Lines Sphere</a></li>
					<li><a href="./home2.html">3D Abstract Ball</a></li>
					<li><a href="./home3.html">Water Waves</a></li>
					<li><a href="./home4.html">Liquids Wavy</a></li>
					<li><a href="./home6.html">Solid Color</a></li>
					<li><a href="./home5.html">Simple Strings</a></li>
				</ul>
			</div>
		</div>
	</div>
</div> -->

<div class="responsive-sidebar-menu">
	<div class="overlay"></div>
	<div class="sidebar-menu-inner">
		<div class="menu-wrap">
			<p>Menu</p>
			<ul class="menu scroll-nav-responsive d-flex">
				<li>
					<a class="scroll-to" href="index.php">
						<i class="las la-home"></i> <span>Home</span>
					</a>
				</li>
				<li>
					<a class="scroll-to" href="#about">
						<i class="las la-info-circle"></i> <span>About</span>
					</a>
				</li>
				<li>
					<a class="scroll-to" href="#resume">
						<i class="las la-briefcase"></i> <span>Resume</span>
					</a>
				</li>
				<li>
					<a class="scroll-to" href="#services">
						<i class="las la-stream"></i> <span>Services</span>
					</a>
				</li>
				<li>
					<a class="scroll-to" href="#skills">
						<i class="las la-shapes"></i> <span>Skills</span>
					</a>
				</li>
				<li>
					<a class="scroll-to" href="#portfolio">
						<i class="las la-grip-vertical"></i> <span>Portfolios</span>
					</a>
				</li>
				<li>
					<a class="scroll-to" href="#testimonial">
						<i class="lar la-comment"></i> <span>Testimonial</span>
					</a>
				</li>
				<li>
					<a class="scroll-to" href="blog.php">
						<i class="las la-newspaper"></i> <span>Blog</span>
					</a>
				</li>
				<li>
					<a class="scroll-to" href="event.php">
						<i class="las la-calendar-alt"></i> <span>Book and Event</span>
					</a>
				</li>
				<li>
					<a class="scroll-to" href="contact.php">
						<i class="las la-envelope"></i> <span>Contact</span>
					</a>
				</li>

				<?php if ($logged) { ?>
					<li>
						<a class="scroll-to" href="profile.php">
							<i class="las la-user-circle"></i> <span>Profile</span>
						</a>
					</li>
					<li>
						<a class="scroll-to" href="logout.php">
							<i class="las la-sign-out-alt"></i> <span>Logout</span>
						</a>
					</li>
					<!-- <li>
						<a class="scroll-to" href="dashboard.php">
							<i class="las la-sign-out-alt"></i> <span>Dashboard</span>
						</a>
					</li> -->
				<?php } else { ?>
					<li>
						<a class="scroll-to" href="#contact">
							<i class="las la-sign-in-alt"></i> <span>Login</span>
						</a>
					</li>
					<li>
						<a class="scroll-to" href="#contact">
							<i class="las la-user-plus"></i> <span>Register</span>
						</a>
					</li>
				<?php } ?>
			</ul>
		</div>

		<div class="sidebar-social">
			<p>Social</p>
			<ul class="social-links d-flex align-items-center">
				<li>
					<a href=""><i class="lab la-twitter"></i></a>
				</li>
				<li>
					<a href=""><i class="lab la-dribbble"></i></a>
				</li>
				<li>
					<a href=""><i class="lab la-instagram"></i></a>
				</li>
			</ul>
		</div>
	</div>
</div>

<ul class="menu scroll-nav d-flex">
	<li>
		<a class="scroll-to" href="index.php">
			<span>Home</span> <i class="las la-home"></i>
		</a>
	</li>
	<li>
		<a class="scroll-to" href="index.php">
			<span>About</span> <i class="las la-info-circle"></i>
		</a>
	</li>
	<li>
		<a class="scroll-to" href="#resume">
			<span>Resume</span> <i class="las la-briefcase"></i>
		</a>
	</li>
	<li>
		<a href="#services">
			<span>Services</span> <i class="las la-stream"></i>
		</a>
	</li>
	<li>
		<a class="scroll-to" href="#skills">
			<span>Skills</span> <i class="las la-shapes"></i>
		</a>
	</li>
	<li>
		<a class="scroll-to" href="#portfolio">
			<span>Portfolios</span> <i class="las la-grip-vertical"></i>
		</a>
	</li>
	<li>
		<a class="scroll-to" href="#testimonial">
			<span>Testimonial</span> <i class="lar la-comment"></i>
		</a>
	</li>
	<li>
		<a class="scroll-to" href="blog.php">
			<span>Blog</span> <i class="las la-newspaper"></i>
		</a>
	</li>
	<li>
		<a class="scroll-to" href="event.php">
			<span>Book an event</span> <i class="las la-calendar-alt"></i>
		</a>
	</li>
	<li>
		<a class="scroll-to" href="#contact">
			<span>Contact</span> <i class="las la-envelope"></i>
		</a>
	</li>

	<?php if ($logged) { ?>

		<li>
			<a class="scroll-to" href="profile.php">
				<span>Profile</span> <i class="las la-user-circle"></i>
			</a>
		</li>
		<li>
			<a class="scroll-to" href="logout.php">
				<span>Logout</span> <i class="las la-sign-out-alt"></i>
			</a>
		</li>
		<!-- <li>
			<a class="scroll-to" href="dashboard.php">
				<span>Dashboard</span> <i class="las la-sign-out-alt"></i>
			</a>
		</li> -->
	<?php } else { ?>
		<li>
			<a class="scroll-to" href="login.php">
				<span>Login</span> <i class="las la-sign-in-alt"></i>
			</a>
		</li>

		<li>
			<a class="scroll-to" href="signup.php">
				<span>Register</span> <i class="las la-user-plus"></i>
			</a>
		</li>
	<?php } ?>
</ul>

<div class="left-sidebar">
	<div class="sidebar-header d-flex align-items-center justify-content-between">
		<a href="index.php"><img src="images/logo1.png" alt="Logo"></a>
		<span class="designation">Consultant &amp; Developer</span>
	</div>
	<img class="me" src="images/sid.png" alt="Me">
	<h2 class="email">hello@sidharthkumar</h2>
	<h2 class="address">Delhi, India</h2>
	<p class="copyright">© 2022 SidharthKumar. All Rights Reserved</p>
	<ul class="social-profile d-flex align-items-center flex-wrap justify-content-center">
		<li>
			<a href=""><i class="lab la-twitter"></i></a>
		</li>
		<li>
			<a href=""><i class="lab la-dribbble"></i></a>
		</li>
		<li>
			<a href=""><i class="lab la-instagram"></i></a>
		</li>
		<li>
			<a href=""><i class="lab la-github"></i></a>
		</li>
	</ul>
	<a href="#" class="theme-btn">
		<i class="las la-envelope"></i> Hire Me!
	</a>
</div>

<main class="drake-main">
	<div id="smooth-wrapper">
		<div id="smooth-content">

			<div class="left-sidebar">
				<div class="sidebar-header d-flex align-items-center justify-content-between">
					<a href="index.php"><img src="images/logo1.png" alt="Logo"></a>
					<span class="designation">Consultant &amp; Developer</span>
				</div>
				<img class="me" src="images/sid.png" alt="Me">
				<h2 class="email">hello @sidharthkumar</h2>
				<h2 class="address">Delhi, India</h2>
				<p class="copyright">© 2022 SidharthKumar. All Rights Reserved</p>
				<ul class="social-profile d-flex align-items-center flex-wrap justify-content-center">
					<li>
						<a href=""><i class="lab la-twitter"></i></a>
					</li>
					<li>
						<a href=""><i class="lab la-dribbble"></i></a>
					</li>
					<li>
						<a href=""><i class="lab la-instagram"></i></a>
					</li>
					<li>
						<a href=""><i class="lab la-github"></i></a>
					</li>
				</ul>
				<a href="#" class="theme-btn">
					<i class="las la-envelope"></i> Hire Me!
				</a>
			</div>