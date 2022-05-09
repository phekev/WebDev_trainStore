<!DOCTYPE html>
<html lang="en" style="padding-top: clamp(15px, 5%, 50px);">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" 
		integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
		crossorigin="anonymous">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	
	
	<!-- Link to the CSS file for this page -->
	
	<link rel="stylesheet" type="text/css" href="login_style.css"  />
	<title>Login</title>
	
	<!-- Connect to the database -->
	<!-- Get all existing usernames -->
	<!-- Put them in an array -->
	<!-- Convert array to JS at bottom of page -->
	<?php
		require_once 'connections.php';
		$conn = new connections();
		$data = $conn->getUsernames();	
		$array = array();
		$count = 0;
		while($row = $data->fetch_assoc()) {
			$array[$count] = $row['Username'];
			$count++;
		}
	
	?>
</head>

<!------ Login form -->
<!------ Source https://bootsnipp.com/snippets/z1Bpy -->


<body style="background-color: lightblue;">
	<div class="container container-login">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="panel panel-login">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-6">
									<a href="#" class="active" id="login-form-link">Login</a>
								</div>
								<div class="col-xs-6">
									<a href="#" id="register-form-link">Register</a>
								</div>
							</div>
							<hr>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-12">
									<form id="login-form" action="login.php" method="POST" role="form" style="display: block;">
										<div class="form-group">
											<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
											
										</div>
										<div class="form-group">
											<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-sm-6 col-sm-offset-3">
													<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
												</div>
											</div>
										</div>
									</form>
									<form id="register-form" action="register.php" method="POST" role="form" style="display: none;">
										<div class="form-group">
											<input type="text" name="r_username" id="r_username" tabindex="1" class="form-control" placeholder="Username" value="" required>
											<button type="button" id="checkUsername" class="btn btn-info">Check Username Availability</button> 
										</div>
										<div class="form-group">
											<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="" required>
											<h2 id="result"></h2>
										</div>
										<div class="form-group">
											<input type="password" name="r_password" id="r_password" tabindex="2" class="form-control" placeholder="Password" onkeyup='checkPasswords()' required>
											<span id='message'></span>
										</div>
										<div class="form-group">
											<input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password" onkeyup='checkPasswords()' required>
											<span id='message'></span>
										</div>
										<div class="form-group">
											<input type="text" name="first-name" id="first-name" tabindex="3" class="form-control" placeholder="First Name" >
										</div>
										<div class="form-group">
											<input type="text" name="last-name" id="last-name" tabindex="3" class="form-control" placeholder="Last Name" >
										</div>
										<div class="form-group">
											<input type="text" name="address1" id="address1" tabindex="4" class="form-control" placeholder="Apartment / House No.">
										</div>
										<div class="form-group">
											<input type="text" name="address2" id="address2" tabindex="4" class="form-control" placeholder="Street">
										</div>
										<div class="form-group">
											<input type="text" name="address3" id="address3" tabindex="4" class="form-control" placeholder="Town">
										</div>
										<div class="form-group county">
											 <select id="county" name="county" style="background: white; color: #999999; font-size: 16px; ">
												<option value="county">County</option>
												<option value="antrim">Antrim</option>
												<option value="armagh">Armagh</option>
												<option value="carlow">Carlow</option>
												<option value="cavan">Cavan</option>
												<option value="clare">Clare</option>
												<option value="cork">Cork</option>
												<option value="derry">Derry</option>
												<option value="donegal">Donegal</option>
												<option value="down">Down</option>
												<option value="dublin">Dublin</option>
												<option value="fermanagh">Fermanagh</option>
												<option value="galway">Galway</option>
												<option value="kerry">Kerry</option>
												<option value="kildare">Kildare</option>
												<option value="kilkenny">Kilkenny</option>
												<option value="laois">Laois</option>
												<option value="leitrim">Leitrim</option>
												<option value="limerick">Limerick</option>
												<option value="longford">Longford</option>
												<option value="louth">Louth</option>
												<option value="mayo">Mayo</option>
												<option value="meath">Meath</option>
												<option value="monaghan">Monaghan</option>
												<option value="offaly">Offaly</option>
												<option value="roscommon">Roscommon</option>
												<option value="sligo">Sligo</option>
												<option value="tipperary">Tipperary</option>
												<option value="tyrone">Tyrone</option>
												<option value="waterford">Waterford</option>
												<option value="westmeath">Westmeath</option>
												<option value="wexford">Wexford</option>
												<option value="wicklow">Wicklow</option>
											  </select>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-sm-6 col-sm-offset-3">
													<input type="submit" name="register-submit" id="register-submit" tabindex="5" class="form-control btn btn-register" onclick='validateEmail(document.register-form.email)' value="Register Now">
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div>
	
</body>

</html>




<script type="text/javascript">

	//	Use json_encode to convert the php array to javascript array
	//	Use this array to check if a username alreay exists when registering a new user

	// Cycle through each name in the nameArray and compare it to the users preferred username
	// Eitherway give an alert to say if the name is ok or not
    var nameArray = <?php echo json_encode($array); ?>;
	document.getElementById('checkUsername').onclick = function checkUsername() {
		for(let i=0; i < nameArray.length; i++) {
			if (document.getElementById('r_username').value == nameArray[i]){
				alert("This username " + document.getElementById('r_username').value + " is already taken");
				return;
			}	
		}
		alert("Username is available :)");
	}
   
	// Compare the 2 passwords and say if they match or not
	var checkPasswords = function() {
		const submit =  document.getElementById('register-submit');
		if (document.getElementById('r_password').value ==
			document.getElementById('confirm-password').value) {
				// If passwords match you can submit
				submit.disabled = false;									
				document.getElementById('message').style.color = 'green';
				document.getElementById('message').innerHTML = 'Passwords match';
			} else {
				// If passwords DO NOT match you cannot submit the form
				submit.disabled = true;										
				document.getElementById('message').style.color = 'red';
				document.getElementById('message').innerHTML = 'Passwords do not match';
		}
	}
	
	//	Source https://stackoverflow.com/questions/46155/how-can-i-validate-an-email-address-in-javascript
	//	Using regex magic and arrow functions to ensure an @ (at) sign and a . (dot) plus some other checks
	const validateEmail = (email) => {
		return email.match(
			/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
		);
	};

	const validate = () => {
		const $result = $('#result');
		const email = $('#email').val();
		$result.text('');

		if (validateEmail(email)) {
			$result.text(email + ' is valid :)');
			$result.css('color', 'green');
		} else {
		$result.text(email + ' is not valid :(');
		$result.css('color', 'red');
		}
	return false;
	}

	$('#email').on('input', validate);

 </script>

   

 <script src="login_js.js"></script> 