<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


	<!-- General meta information -->
	<title>Form Login</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="robots" content="index, follow" />
	<meta charset="utf-8" />
	<!-- // General meta information -->
	
	
	<!-- Load Javascript -->
	<script type="text/javascript" src="<?php echo base_url() . 'assets/js/login/jquery.min.js' ?>"></script>
	<script type="text/javascript" src="<?php echo base_url() . 'assets/js/login/rainbows.js' ?>"></script>
	<!-- // Load Javascipt -->

	<!-- Load stylesheets -->
	<link type="text/css" rel="stylesheet" href="<?php echo base_url() . 'assets/css/login/style.css' ?>" media="screen" />
	<!-- // Load stylesheets -->
	
<script>


	$(document).ready(function(){
 
		$("#submit1").click(function() {
			$("#login").submit();
		});

	});


</script>
	
</head>
<body>
	<form id="login" method="post" action="login/authenticate">
	<div id="wrapper">
		<div id="wrappertop"></div>

		<div id="wrappermiddle">

			<h2>Login</h2>

			<div id="username_input">

				<div id="username_inputleft"></div>

				<div id="username_inputmiddle">

					<input type="text" name="username" id="url" value="Username" onclick="this.value = ''">
					<img id="url_user" src="assets/img/login/mailicon.png" alt="">

				</div>

				<div id="username_inputright"></div>

			</div>

			<div id="password_input">

				<div id="password_inputleft"></div>

				<div id="password_inputmiddle">
					<input type="password" name="password" id="url" value="Password" onclick="this.value = ''">
					<img id="url_password" src="assets/img/login/passicon.png" alt="">
				</div>

				<div id="password_inputright"></div>

			</div>

			<div id="submit">
				<input type="image" src="assets/img/login/submit_hover.png" id="submit1" value="Sign In">
				<input type="image" src="assets/img/login/submit.png" id="submit2" value="Sign In">
			</div>


			<div id="links_left">

			<a href="#"></a>

			</div>

			<div id="links_right"><a href="#"></a></div>

		</div>

		<div id="wrapperbottom"></div>

		<div id="powered">

		</div>
	</div>

	</form>

</body>
</html>