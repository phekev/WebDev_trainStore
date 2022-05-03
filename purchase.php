<?php
	//1. Check if the username already exists (If the user didn't check at registration)
	//2. Check if the passwords match (Again, this was highlighted on the registration page but you can still submit with non-matching passwords
	//3. Add the new user to the customer database
	
	require_once 'connections.php';
		
	$array=json_decode($_POST['purchaseButton']);
	
	var_dump($array);

	
	//$register = new newUser();
	//$register->checkIfUsernameExists ($username);	
	//$register->checkIfPasswordsMatch ($pass, $confirmPass);
	//$register->addNewUser ($username, $pass, $fName, $lName, $email, $address1, $address2, $address3, $county);
	
		
		
		
		
		
?>