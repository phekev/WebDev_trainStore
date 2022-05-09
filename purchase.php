<?php
	//1. Check if the username already exists (If the user didn't check at registration)
	//2. Check if the passwords match (Again, this was highlighted on the registration page but you can still submit with non-matching passwords
	//3. Add the new user to the customer database
	
	require_once 'connections.php';
		
	$array=json_decode($_POST['purchaseButton']);
	
	
	$thisOrder = new newOrder();
	$orderID = $thisOrder->addAnOrderToDatabase ($array);	
	$thisOrder->addProductDetailsToOrderDetails ($array, $orderID);


class newOrder {
	
	// The username object was getting added to the end $array. 
	// So it has to be retrieved seperately and before accessing the products
	// Using property_exists to get back the value associated with 'username'
	public function addAnOrderToDatabase ($array) {
		for($i = 0; $i < count($array); $i++) {
			if(property_exists($array[$i], "custID")) {
				$custID = $array[$i]->custID;
				$orderID = $this->addNewOrder($custID);
				break;
			}
		}
		return $orderID;
	}
	
	// Add the new order to the orders table
	// Then move on to the main site
	function addNewOrder($custID) {
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
		$date = date("d/m/Y");
		$query = "INSERT INTO g00228349.orders (CustID, OrderDate)VALUES('$custID', '$date')";
		$connection->query($query);
		$orderID = mysqli_insert_id($connection);
        if(mysqli_query($connection,$query)){
			
        }
        else {
            $msg = "Error ordering at orders table";
			echo $msg;
		}
		return $orderID;
	}
	
	// Iterate over each product being purchased 
	public function addProductDetailsToOrderDetails ($array, $orderID) {
		for($i = 0; $i < count($array); $i++) {
			if (property_exists($array[$i], "id") ) {
				$id = $array[$i]->id;
				$price = $array[$i]->price;
				$quantity = $array[$i]->quantity;
				$total = $array[$i]->price * $array[$i]->quantity;
				$this->addOrderDetails($orderID, $id, $price, $quantity, $total);
			}
		}
	}
	
	public function addOrderDetails ($orderID, $id, $price, $quantity, $total) {
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
		$query = "INSERT INTO g00228349.orders_details (OrderID, ProdID, Price, Quantity, Total)VALUES('$orderID','$id','$price','$quantity','$total')";
		if(mysqli_query($connection,$query)){
			echo "
				<script>
					alert('Order placed');
					window.open ('main.php', '_self');
				</script>";
        }
        else {
            $msg = "Error ordering at orders_details";
			echo $msg;
		}
		
	}
	
}	
	
	
	
		
		
		
		
		
?>