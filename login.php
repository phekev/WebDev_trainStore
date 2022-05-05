<?php
		require_once 'connections.php';
		// Use POST to get username and password from index.php
		$user=$_POST['username'];
		$pass=$_POST['password'];
		
		
		// Connect to the database check that the username exists
		// Then check that the supplied password corresponds to the stored password
		$conn = new connections();
		$data = $conn->login($user);	
		$row = $data->fetch_assoc();
			// If passwords are the same load the main site
			if($row['Password'] == ($pass)){
				echo "
					<script>
						// Clearing localStorage and then store the CustomerID 
						localStorage.clear();
						localStorage.setItem('custID', JSON.stringify('" .$row['CustID']. "'));
						window.open ('main.php', '_self');
					</script>";
				$data -> free_result();
			} else {			// Username is not in database so go back to LOGIN page
				echo "
					<script>
						alert('Your username or password are incorrect');
						window.open ('index.php', '_self');
					</script>";
					$data -> free_result();
			}
		

?>