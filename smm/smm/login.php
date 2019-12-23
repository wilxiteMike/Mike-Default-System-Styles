<DOCTYPE html>
<head>

	<title>Test login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://kit.fontawesome.com/e6e83e02f8.js" crossorigin="anonymous" integrity="sha384-YWiI0Cli0o/bFXCXg9qonZOGKZU9t3wy1U9oYWWmKJif85uQBcNQ2wlP91aRxKnV"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<link rel="stylesheet" href="style.css" type="text/css" />

</head>
<body>

	<div id="login">

		<div id="login-left">
			<h1>Shoot My Mail Admin</h1>
			<p>Welcome to the bulk email sending solution tailored for you.</p>
		</div>

		<div id="login-right">

			<form class="login-register-form" id="login-form">
				<h2>Login</h2>
				<div class="input-container has-icon">
					<i class="pre-icon fas fa-user"></i>
					<input type="text" name="email" placeholder="Email" />
				</div>
				<div class="input-container has-icon">
					<i class="pre-icon fas fa-lock"></i>
					<input type="password" name="password" placeholder="Password" />
					<i class="post-icon fas fa-eye cur-point revealPassword"></i>
				</div>
				<div class="checkbox-container"><input type="checkbox" name="rememberme" id="rememberme" /><label for="rememberme">Remember me</label></div>
				<a class="simple-link">Forgot your password?</a>
				<div class="m-top-20">
					<a class="button width-30-per" id="sign-up-form-btn">Sign Up</a>
					<a class="button blue width-60-per f-right" id="log-in-btn">Login</a>
				</div>
			</form>

			<form class="login-register-form" id="register-form" style="display: none;">
				<h2>Register</h2>
				<div class="input-container has-icon">
					<i class="pre-icon fas fa-user"></i>
					<input type="text" name="email" placeholder="Email" />
				</div>
				<div class="input-container has-icon">
					<i class="pre-icon fas fa-lock"></i>
					<input type="password" name="password" placeholder="Password" />
					<i class="post-icon fas fa-eye cur-point revealPassword"></i>
				</div>
				<div class="input-container has-icon">
					<i class="pre-icon fas fa-lock"></i>
					<input type="password" name="passwordConfirm" placeholder="Confirm Password" />
				</div>
				<div class="m-top-20">
					<a class="button width-60-per" id="log-in-form-btn">Already have an account?</a>
					<a class="button blue width-30-per f-right" id="sign-up-btn">Register</a>
				</div>
			</form>
		</div>

	</div>

	<script>

		$('#sign-up-form-btn').click( function(){

			$('#login-form').fadeOut( function(){
				$('#register-form').fadeIn();
			});

		});

		$('#log-in-form-btn').click( function(){

			$('#register-form').fadeOut( function(){
				$('#login-form').fadeIn();
			});

		});

		$('.revealPassword').click(function(){
            if($(this).hasClass('fa-eye')) {
				$(this).prev().attr('type', 'text');
				$(this).removeClass('fa-eye');
				$(this).addClass('fa-eye-slash');
			} else {
				$(this).prev().attr('type', 'password');
				$(this).removeClass('fa-eye-slash');
				$(this).addClass('fa-eye');
			}
        });

		var loginDisabled = 0;

		$('#log-in-btn').click( function(){
			if(!loginDisabled) {
				loginDisabled = 1;
				$(this).html('<i class="fas fa-spinner fa-spin"></i> Login');
				setTimeout(function() {
					window.location.href = "index.php";
				}, 2000);
			}
		});

	</script>

</body>