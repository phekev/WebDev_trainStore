<?php

// Connects to the database for various 
class connections
{		

		// Gets a new connection to the database. Every function needs this
		public function getConnection() {
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
			return $connection;		
		}
		
		// Returns everything from the products table
		public function getAll() {
			$connection = $this->getConnection();
			$query = "SELECT * FROM g00228349.products";
			$result = $connection->query($query);
			return $result;
		}
		
		// Returns a specific product by name
		// Used to load the data for productDetails.php
		// And to retrieve price for the shopping cart
		public function getByName($name) {
			$connection = getConnection();
			$query = "SELECT * FROM g00228349.products WHERE Name LIKE '%$name%'";
			$result = $connection->query($query);
			return $result;
		}
		
		
		// Checks if username is present
		// Returns the username, password & custID. 
		// custID is put in localStorage and used to associate a purchase with the current user
		public function login($name) {
			$connection = $this->getConnection();
			$query = "SELECT Username,Password, CustID FROM g00228349.customers WHERE Username = '$name'";
			$result = $connection->query($query);
			return $result;
		}
		
		
		// Returns all the usernames in the customer table
		// Used to check availibility of usernames at registration
		// This is a bad way to do this. If there was a large amount of users it would make the index page very laggy
		// If I was actaully implementing this I would probably use AJAX to do a query to the database and not load anything from the database
		public function getUsernames () {
			$connection = $this->getConnection();
			$query = "SELECT Username FROM g00228349.customers";
			$result = $connection->query($query);
			return $result;
		}
		
		
		// Returns a product by its ID
		public function getByID($id) {
			$connection = $this->getConnection();
			$query = "SELECT * FROM g00228349.products WHERE ProdID = '$id'";
			$result = $connection->query($query);
			return $result;
		}
		
		// Get the ID of the last row inserted in the orders table
		// Used as a value in the orders_details table
		public function getLastInsertID() {
			$connection = $this->getConnection();
			$query = "SELECT LAST_INSERT_ID() FROM g00228349.orders";
			$result = $connection->query($query);
			return $result;
		}
		
		public function addUser ($username, $pass, $fName, $lName, $email, $address1, $address2, $address3, $county) {
			$connection = $this->getConnection();
			
			$query = "INSERT INTO g00228349.customers (Username ,Password , F_Name, L_Name, Email, Address1, Address2, Address3, County)VALUES('$username', '$pass', '$fName', '$lName', '$email', '$address1', '$address2', '$address3', '$county')";
        //$connection->query($query);	
		}
}
?>

		
		