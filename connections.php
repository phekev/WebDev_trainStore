<?php

// Connects to the database

class connections
{		
		
		public function getAll() {
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
			
			$query = "SELECT * FROM g00228349.products";
			$result = $connection->query($query);
			return $result;
		}
		
		public function getByName($name) {
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
			
			$query = "SELECT * FROM g00228349.products WHERE Name LIKE '%$name%'";
			$result = $connection->query($query);
			return $result;
		}
		
		public function login($name) {
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
			
			$query = "SELECT Username,Password FROM g00228349.customers WHERE Username = '$name'";
				
				$result = $connection->query($query);
				return $result;
			
		}
		
		public function getByID($id) {
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
			
			$query = "SELECT * FROM g00228349.products WHERE ProdID = '$id'";
			$result = $connection->query($query);
			return $result;
		}

}
?>

		
		