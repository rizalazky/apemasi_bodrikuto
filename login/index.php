
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Sistem</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<script>
	addEventListener("load", function () {
		setTimeout(hideURLbar, 0);
	}, false);

	function hideURLbar() {
		window.scrollTo(0, 1);
	}
</script>
<link href="css/style2.css" rel='stylesheet' type='text/css' />

</head>
<body>
	<div id="particles-js"></div>

	<div class="w3ls-pos">
		<!-- <h1>Particles Login Form</h1> -->
		<span class="login100-form-title p-t-70">
			Welcome
		</span>
		<!-- <span class="login100-form-avatar">
			<img src="images/ava1.png" alt="AVATAR">
		</span> -->
		<div class="w3ls-login box">
			<!-- form starts here -->
			<form action="../cek_login.php" method="post">
				<!-- <div class="agile-field-txt">
					<input type="email" name="email" placeholder="info@example.com" required="" />
				</div>
				<div class="agile-field-txt">
					<input type="password" name="password" placeholder="******" required="" id="myInput" />
					<div class="agile_label">
						<input id="check3" name="check3" type="checkbox" value="show password">
						<label class="check" for="check3">Remember me</label>
					</div>
				</div> -->
				<div class="wrap-input100 validate-input m-t-30 m-b-35" data-validate = "Enter username">
					<input class="input100" type="text" name="username">
					<span class="focus-input100" data-placeholder="Username"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
					<input class="input100" type="password" name="password">
					<span class="focus-input100" data-placeholder="Password"></span>
				</div>
				<!-- <div class="w3ls-bot">
					<input  type="submit" value="LOGIN">
				</div> -->
				<div class="container-login100-form-btn">
				    <input  type="submit" name="submit" value="LOGIN" class="login100-form-btn">
					<!--<button class="login100-form-btn">-->
					<!--	<a href="./admin">Login</a>-->
					<!--</button>-->
				</div>
			</form>
		</div>
	
	<!-- <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-85 p-b-20">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-70">
						Welcome
					</span>
					<span class="login100-form-avatar">
						<img src="images/avatar-01.jpg" alt="AVATAR">
					</span>

					<div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "Enter username">
						<input class="input100" type="text" name="username">
						<span class="focus-input100" data-placeholder="Username"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
						<input class="input100" type="password" name="pass">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<ul class="login-more p-t-190">
						<li class="m-b-8">
							<span class="txt1">
								Forgot
							</span>

							<a href="#" class="txt2">
								Username / Password?
							</a>
						</li>

						<li>
							<span class="txt1">
								Don’t have an account?
							</span>

							<a href="#" class="txt2">
								Sign up
							</a>
						</li>
					</ul>
				</form>
			</div>
		</div>
	</div> -->
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<script src='js/particles.min.js'></script>
	<script src="js/index.js"></script>

</body>
</html>