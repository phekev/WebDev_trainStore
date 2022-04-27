<?php
		require_once 'productStore.php';
		
		$user=$_POST['username'];
		$pass=$_POST['password'];
		
		$conn = new productStore();
		$data = $conn->login($user);	
		$row = $data->fetch_assoc();
			if($row['Password'] == ($pass)){
				echo "
					<script>
						
						localStorage.username = '" .$user. "';
						window.open ('main.php', '_self');
					</script>";
				$data -> free_result();
			} else {			// Username is not in database so go back to LOGIN page
				echo "
					<script>
						alert('Your username or password are incorrect');
						window.open ('index.html', '_self');
					</script>";
					$data -> free_result();
			}
		
		
		

		
		
	
?>