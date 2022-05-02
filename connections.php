<?php

// Connects to the database for vaiour use cases

class connections
{		
		// Returns everything from the products table
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
		
		// Returns a specific product by name
		// Used to load the data for productDetails.php
		// And to retrieve price for the shopping cart
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
		
		
		// Checks if username is present
		// Returns the username and password
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
		
		
		// Returns all the usernames in the customer table
		// Used to check availibility of usernames at registration
		// This is a bad way to do this. If there was a large amount of users it would make the index page very laggy
		// If I was actaully implementing this I would probably use AJAX to do a query to the database and not load anything from the database
		public function getUsernames () {
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
			
			$query = "SELECT Username FROM g00228349.customers";
				
				$result = $connection->query($query);
				return $result;
			
		}
		
		
		// Returns a product by its ID
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

		
		