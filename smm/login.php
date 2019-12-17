<DOCTYPE html>
<head>

	<title>Test login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://kit.fontawesome.com/e6e83e02f8.js" crossorigin="anonymous" integrity="sha384-YWiI0Cli0o/bFXCXg9qonZOGKZU9t3wy1U9oYWWmKJif85uQBcNQ2wlP91aRxKnV"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<style>

		html {
			margin: 0px;
			padding: 0px;
		}
		
		body {
			margin: 0px;
			padding: 0px;
			webkit-font-smoothing: antialiased;
			text-rendering: optimizeLegibility;
			font-family: Helvetica Neue,Helvetica,PingFang SC,Hiragino Sans GB,Microsoft YaHei,Arial,sans-serif;
			background-color: #f0f2f5;
		}

		h1 {
			margin-top: 5px;
			margin-bottom: 10px;
			color: #162e4b;
			font-size: 2em;
		}

		h2 {
			margin-top: 5px;
			margin-bottom: 10px;
			color: #162e4b;
			font-size: 1.5em;
		}

		h3 {
			margin-top: 3px;
			margin-bottom: 5px;
			color: #162e4b;
			font-size: 1em;
		}

		p {
			color:rgb(96, 98, 102);
			font-size: 0.9em;
		}

		.m-top-10 {
			margin-top: 10px;
		}

		.m-top-20 {
			margin-top: 20px;
		}

		.width-10-per { 
			width: 10%;
		}

		.width-20-per {
			width: 20%;
		}

		.width-30-per { 
			width: 30%;
		}

		.width-40-per {
			width: 40%;
		}

		.width-50-per { 
			width: 50%;
		}
		
		.width-60-per {
			width: 60%;
		}

		.width-70-per { 
			width: 70%;
		}

		.width-80-per {
			width: 80%;
		}

		.width-90-per { 
			width: 90%;
		}

		.f-right {
			float: right;
		}

		.f-left {
			float: left;
		}

		.cur-point {
			cursor: pointer;
		}

		#login {
			display: flex;
			height: 100%;
		}

		#login #login-left {
			background-color: rgb(48, 65, 86);
    		color: #fff;
			position: relative;
			padding: 10px;
			margin-right: 75px;
			padding-right: 85px;
			display: flex;
			flex-direction: column;
			justify-content: center;
		}

		#login #login-left::before {
			content: '';
			position: absolute;
			height: 150px;
			width: 150px;
			background-color:rgb(240, 242, 245);
			border-radius: 100%;
			right: -75px;
			top: 0;
			bottom: 0;
			margin: auto;
		}

		#login #login-left::after {
			content: '\f1d8';
			font-family: 'Font Awesome 5 Pro';
			position: absolute;
			height: 110px;
			width: 110px;
			background-color: rgb(48, 65, 86);
			border-radius: 100%;
			right: -55px;
			top: 0;
			bottom: 0;
			margin: auto;
			font-size: 55px;
			font-weight: 700;
			text-align: center;
			line-height: 110px;
		}

		#login #login-left h1 {
			margin: 0px;
    		font-weight: 300;
			color: #fff;
		}

		#login #login-left p {
			width: 80%;
			color: #fff;
		}

		#login #login-right {
			flex-grow: 1;
			display: flex;
			justify-content: center;
			align-items: center;
		}

		.login-register-form {
			width: 60%;
			max-width: 450px;
		}

		.login-register-form h2 {
			margin-bottom: 27px;
    		font-size: 30px;
			color: #959eaf;
		}

		.simple-link {
			color: #76797f;
			text-decoration: underline;
			font-size: 16px;
			margin: 5px 0px;
			display: inline-block;
			cursor: pointer
		}

		/* Input */
		.input-container {
			position: relative;
			width: 100%;
			margin: 20px 0px;
		}

		.input-container input {
			height: 36px;
			background-color: rgb(255, 255, 255);
			border: 1px solid rgb(220, 223, 230);
			border-radius: 4px;
			color: rgb(96, 98, 102);
			font-size: 14px;
			line-height: 36px;
			padding: 0px 10px;
			display: inline-block;
			transition: border-color 0.2s cubic-bezier(0.645, 0.045, 0.355, 1);
   		 	width: 100%;
			box-sizing: border-box;
		}

		.input-container input:focus {
			outline: none;
    		border-color: #1890ff;
		}

		.input-container input:hover {
			border-color: #C0C4CC;
		}

		.input-container.has-icon input {
			padding: 0px 30px;
		}

		.input-container.has-icon .pre-icon {
			position: absolute;
			height: 100%;
			left: 10px;
			top: 0;
			text-align: center;
			color: #C0C4CC;
			-webkit-transition: all .3s;
			transition: all .3s;
			line-height: 36px;
			font-size: 12px;
		}

		.input-container.has-icon .post-icon {
			position: absolute;
			height: 100%;
			right: 10px;
			top: 0;
			text-align: center;
			color: #C0C4CC;
			-webkit-transition: all .3s;
			transition: all .3s;
			line-height: 36px;
			font-size: 12px;
		}

		/* checkboxes */
		.checkbox-container {
			margin: 5px 0px;
		}

		.checkbox-container input[type="checkbox"], .checkbox-container input[type="radio"] {
			position: absolute;
			opacity: 0;
		}

		.checkbox-container label {
			padding-left: 10px;
			line-height: 14px;
			font-size: 14px;
			color: #606266;
		}

		.checkbox-container input[type="checkbox"] + label, .checkbox-container input[type="radio"] + label {
			position: relative;
			cursor: pointer;
			padding: 0;
			margin-right: 10px;
		}

		.checkbox-container input[type="checkbox"] + label:before, .checkbox-container input[type="radio"] + label:before {
			content: '';
			margin-right: 5px;
			display: inline-block;
			vertical-align: text-top;
			width: 14px;
			height: 14px;
			background: #FFFFFF;
			border: 1px solid #d9d9d9;
		}

		.checkbox-container input[type="radio"] + label:before {
			border-radius: 100%;
		}

		.checkbox-container input[type="checkbox"]:hover:not(:disabled) + label:before, .checkbox-container input[type="radio"]:hover:not(:disabled) + label:before {
			background: #1890ff;
		}

		.checkbox-container.negative input[type="checkbox"]:hover:not(:disabled) + label:before, .checkbox-container.negative input[type="radio"]:hover:not(:disabled) + label:before {
			background: #ff182d;
		}

		.checkbox-container.positive input[type="checkbox"]:hover:not(:disabled) + label:before, .checkbox-container.positive input[type="radio"]:hover:not(:disabled) + label:before {
			background: #13ce66;
		}

		.checkbox-container input[type="checkbox"]:focus + label:before, .checkbox-container input[type="radio"]:focus + label:before {
			border: 1px solid #1890ff;
		}

		.checkbox-container.negative input[type="checkbox"]:focus + label:before, .checkbox-container.negative input[type="radio"]:focus + label:before {
			border: 1px solid #ff182d;
		}

		.checkbox-container.positive input[type="checkbox"]:focus + label:before, .checkbox-container.positive input[type="radio"]:focus + label:before {
			border: 1px solid #13ce66;
		}

		.checkbox-container input[type="checkbox"]:checked + label:before, .checkbox-container input[type="radio"]:checked + label:before {
			background: #1890ff;
		}

		.checkbox-container.negative input[type="checkbox"]:checked + label:before, .checkbox-container.negative input[type="radio"]:checked + label:before {
			background: #ff182d;
		}

		.checkbox-container.positive input[type="checkbox"]:checked + label:before, .checkbox-container.positive input[type="radio"]:checked + label:before {
			background: #13ce66;
		}

		.checkbox-container input[type="checkbox"]:disabled + label, .checkbox-container input[type="radio"]:disabled + label {
			color: #b8b8b8;
			cursor: auto;
		}

		.checkbox-container input[type="checkbox"]:disabled + label:before, .checkbox-container input[type="radio"]:disabled + label:before {
			box-shadow: none;
			background: #ddd;
		}

		.checkbox-container input[type="checkbox"]:checked + label, .checkbox-container input[type="radio"]:checked + label {
			color: #1890ff;
		}

		.checkbox-container.negative input[type="checkbox"]:checked + label, .checkbox-container.negative input[type="radio"]:checked + label {
			color: #ff182d;
		}

		.checkbox-container.positive input[type="checkbox"]:checked + label, .checkbox-container.positive input[type="radio"]:checked + label {
			color: #13ce66;
		}

		.checkbox-container input[type="checkbox"]:checked + label:after, .checkbox-container input[type="radio"]:checked + label:after {
			content: '\f00c';
			position: absolute;
			left: 4px;
			top: 2px;
			color: #fff;
			font-size: 8px;
			font-family: "Font Awesome 5 Pro";
		}

		/* buttons */
		.button {
			padding: 10px 20px;
			font-size: 14px;
			border-radius: 4px;
			display: inline-block;
			line-height: 1;
			white-space: nowrap;
			cursor: pointer;
			text-align: center;
			box-sizing: border-box;
			outline: none;
			margin: 0;
			background: #FFFFFF;
			border: 1px solid #DCDFE6;
			border-color: #DCDFE6;
			color: #606266;
		}

		.button:hover, .button:focus {
			color: #1890ff;
			border-color: #badeff;
			background-color: #e8f4ff;
		}

		.button:active {
			color: #1682e6;
			border-color: #1682e6;
			outline: none;
		}

		.button.blue {
			color: #FFFFFF;
			background-color: #1890ff;
			border-color: #1890ff;
		}

		.button.blue:hover, .button.blue:focus {
			background: #46a6ff;
			border-color: #46a6ff;
			color: #FFFFFF;
		}

		.button.blue:active {
			background: #1682e6;
			border-color: #1682e6;
			color: #FFFFFF;
			outline: none;
		}


		@media all and (max-width: 940px) {
			
			#login {
				flex-direction: column;
			}

			#login #login-left {
				max-height: 25%;
    			padding-bottom: 80px;
				margin-right: 0px;
				padding-right: 10px;
				text-align: center;
			}

			#login #login-left p {
				width: 100%;
			}

			#login #login-left::before {
				top: unset;
				left: 0;
				right: 0;
				bottom: -75px;
			}

			#login #login-left::after {
				top: unset;
				left: 0;
				right: 0;
				bottom: -55px;
			}

			#login #login-right {
				padding-top: 55px;
			}

		}

		@media all and (max-width: 425px) {

			.login-register-form {
				width: 90%;
			}

		}

	</style>

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