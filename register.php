<?php
	//1. Check if the username already exists (If the user didn't check at registration)
	//2. Check if the passwords match (Again, this was highlighted on the registration page. This is redundant but this was written first, so it get let in...)
	//3. Add the new user to the customer database
	//4. Add CustID to localStorage and redirect to main page
	
	require_once 'connections.php';
		
	$username=$_POST['r_username'];
	$pass=$_POST['r_password'];
	$confirmPass=$_POST['confirm-password'];
	$email = $_POST['email'];
	$fName = $_POST['first-name'];
	$lName = $_POST['last-name'];
	$address1 = $_POST['address1'];
	$address2 = $_POST['address2'];
	$address3 = $_POST['address3'];
	$county = $_POST['county'];
	
	$register = new newUser();
	$register->checkIfUsernameExists ($username);	
	$register->checkIfPasswordsMatch ($pass, $confirmPass);
	$register->addNewUser ($username, $pass, $fName, $lName, $email, $address1, $address2, $address3, $county);
	
		
		
class newUser {		
	// Check if the username is already in the database
	// If it is in the database you get kicked back to the login page. This is a bad way to do this as you lose all your form data
	function checkIfUsernameExists ($username) {	
		require_once 'connections.php';
		$conn = new connections();
		$data = $conn->login($username);	
		$row = $data->fetch_assoc();
		if(!empty($row['Username'])){			//Checks that $row is not empty. If it is empty then the username is not in the database
				echo "
					<script>
						alert('Username already exists');
						window.open ('index.php', '_self');
					</script>";
				$data -> free_result();
		} 
	}
	
	// Check is the 2 password fields match
	// If they don't match you get kicked back to the login page. Again a bad way to do this.
	function checkIfPasswordsMatch ($pass, $confirmPass) {
		if($pass != $confirmPass) {
			echo "
				<script>
					alert('Passwords do not match');
					window.open ('index.php', '_self');
				</script>";
		}
	}
	
	// Add the user to the database
	// Then move on to the main site
	function addNewUser ($username, $pass, $fName, $lName, $email, $address1, $address2, $address3, $county) {
		$connection = new mysqli("localhost", "root", "", "g00228349");
			
			if(mysqli_connect_errno()){
				die("DB connection failed: " .
					mysqli_connect_error() .
						" (". mysqli_connect_errno() . ")"
					);
			}
		
			if (!$connection)
			{
				die('Could not connect: ' . mysqli_error());
			}
		$query = "INSERT INTO g00228349.customers (Username ,Password , F_Name, L_Name, Email, Address1, Address2, Address3, County)VALUES('$username', '$pass', '$fName', '$lName', '$email', '$address1', '$address2', '$address3', '$county')";
        if(mysqli_query($connection,$query)){
            echo "
				<script>
					alert('You are now registered');
					// Clearing localStorage and then store the CustomerID 
					localStorage.clear();
					localStorage.setItem('custID', JSON.stringify('" .$row['CustID']. "'));
					window.open ('main.php', '_self');
				</script>";
        }
        else {
            $msg = "Error Registering";
			echo $msg;
		}
	}
		
	
}
		
		
	
?>
		
		
		