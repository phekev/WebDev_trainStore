<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Hello, world!</title>
	<?php
		require_once 'productStore.php';
	?>
	
	 <style type="text/css">
	 /* Card width for each product */
	 /* Inherits the gradient from the body background */
    .card{
		max-width: 350px;
		background: inherit;		
    }
	/* Margin needed on product name - was getting collisions with 'More info' button */
	.productName{
		margin: 5px;
		color: white
	}
	/* Centers the inmage in the card */
	.productImage img {
		position: absolute;   
		top: 50%;
		transform: translateY(-50%);
		object-fit:cover;		
	}
	/* Background colour gradient going from blue -> red  */
	.grad {
		background-image: linear-gradient(#64caf1, #cc2f2d);
	}
	.submit {
		border: 1px solid black;
		padding: 6px 10px;
		width: auto;
		text-align: center;
		vertical-align: middle;
		margin: 0px;
	}
	.zoom {
		transition: transform .2s; /* Animation */
		margin: 0 auto;
	}

	.zoom:hover {
		transform: scale(1.1); /* (110% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
	}
  </style>
  
  </head>
  <body>
    <h1>Train Store</h1>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  
 <div class="py-5 grad">
	<div class="container">
	
	<?php
	session_start();
	
	$store = new productStore();
	$data = $store->getAll();	//Get every product from the product table
	$count = 0;
	$newRow = true; //Start a new row
	
	
	
	while($row = $data->fetch_assoc()) {
		
		/*
		* There should be 3 cards in a  row
		* 
		* Check if new row needs to be started 
		*/
		if ($newRow) {
			echo "<div class='row hidden-md-up'>";
				
			$newRow = false;
		}
		
		/*
		* Show main product photo
		* Print product name
		* Button to goto product page
		*/
		
		echo "<div class='col-md-4' >";
			echo "<div class='card text-center' id='" .$row['ProdID']."'>";
				echo "<form method='post' action='productDetails.php?query=".$row['ProdID']."'>";
					echo "<input type='hidden' name='id' value='".$row['ProdID']."'>";
					echo "<input type='image' class='mx-auto productImage zoom' src='images/" .$row['ProdID']."_A.jpg' alt='". $row['Name'] ." image' height='200' width='342' >";
				echo "</form>";
				echo "<div class='card-body'>";
					echo "<h5 class='card-title productName'>" . $row['Name'] . "</h5>";
					echo "<form method='POST' action='productDetails.php?query=".$row['ProdID']."'>";		// Load full product page
						echo "<input type='hidden' name='id' value='".$row['ProdID']."'>";
						echo "<input class='submit' type='submit' value='LEARN MORE'>";
					echo "</form>";
				echo "</div>";
			echo "</div>";
		echo "</div>";
		
		$count++;		//Add to the count of cards in the row
		
		
		/*
		* If there is 3 cards in the row
		* Reset $newRow and $count to start a new row for the next card
		*/
		if ($count == 3) {
			
			echo "</div>";
			echo "<br>";
			$newRow = true;
			$count = 0;
		}
	}
	
	?>
	</div>
</div>
</body>
						
</html>	

<script>

</script>						
	
	