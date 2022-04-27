<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Product Page</title>
	
	<!-- Link to the code in productStore.php -->
	<?php
		require_once 'productStore.php';
	?>
	
	 <style type="text/css">
	 /* Setting container width for carousel */
	.carousel-inner{
		background-color: #cdc9c5 !important;
	}
	.carousel .carousel-item {
		position: relative;
		height: 500px;
		
	}
	
	.carousel-item img {
		position: absolute;   
		top: 50%;
		transform: translateY(-50%);
		object-fit:cover;
		min-height: 350px;
		
		
	}
	
	/* Margin on H5 elements */
	.h5{
		margin: 1rem;
	}
	
	/* Shopping cart styling */
	#cart{
		float: right;
		border: 3px, solid, blue;
		background-color: green;
		min-height: 400px;
	}
	.col {
	  flex: 33.33%;
	  height: 500px;
	  padding: 10px;
	  margin: 5px;
	  background-color: #cccccc;
	  text-align: center;
	}
	.container {
	   display: flex;
	}	
	.leftPanel{
	background-color: lightblue;
	padding: 10px;
	
	
	}
  </style>
  
  </head>
  <body>
    <h1>Product Page</h1>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  
  

	<div class="container"> 
		<div class="leftPanel col-md-2">
			<p> 
				<h5>Home</h5>
				<h4>Checkout</>
			</p>
		</div>

		<!-- Get the id that was passed with the URL using $_POST-->
		<!-- Use the getByID function to get the accociated product info from the database -->
		<!-- Using that info, load the product photos into a carousel -->
		<!-- If the product doesn't have enough photos eg Tenders only have the *_A.jpg file -->
		<!-- Then load in the no-image.png as an alternative -->
		<!-- The speed of the carousel is very unpredicatble so there are controls to move also -->
		<?php
		
		$prod = $_POST['id'];	//Gets the ProdID passed from main page
		
		$store = new productStore();
		$data = $store->getByID($prod);
		
		
		//Carousel showing 4 images of the product selected. If the image doesn't exist a default NO-IMAGE image is shown
		while($row = $data->fetch_assoc()) {
					echo "<div id='carouselExampleControls' class='carousel slide col-md-6' data-bs-ride='carousel'  data-bs-interval='1200'>";
						echo "<div class='carousel-inner'>";
							echo "<div class='carousel-item active'>";
								echo "<img src='images/" .$row['ProdID']."_A.jpg' class='img-fluid d-inline-block w-100' alt='". $row['Name'] ." image'>";
							echo "</div>";
							echo "<div class='carousel-item'>";
								echo "<img src='images/" .$row['ProdID']."_L.jpg'  onError='this.onerror=null; this.src=\"images/no-image.png\"' class='img-fluid d-inline-block w-100' alt='". $row['Name'] ." image'>";
							echo "</div>";
							echo "<div class='carousel-item'>";
								echo "<img src='images/" .$row['ProdID']."_F.jpg' onError='this.onerror=null; this.src=\"images/no-image.png\"' class='img-fluid d-inline-block w-100' alt='". $row['Name'] ." image'>";
							echo "</div>";
							echo "<div class='carousel-item'>";
								echo "<img src='images/" .$row['ProdID']."_R.jpg' onError='this.onerror=null; this.src=\"images/no-image.png\"' class='img-fluid d-inline-block w-100' alt='". $row['Name'] ." image'>";
							echo "</div>";			
						echo "</div>";
						echo "<button class='carousel-control-prev' type='button' data-bs-target='#carouselExampleControls' data-bs-slide='prev'>";
							echo "<span class='carousel-control-prev-icon' aria-hidden='true'></span>";
							echo "<span class='visually-hidden'>Previous</span>";
						echo "</button>";
						echo "<button class='carousel-control-next' type='button' data-bs-target='#carouselExampleControls' data-bs-slide='next'>";
							echo "<span class='carousel-control-next-icon' aria-hidden='true'></span>";
							echo "<span class='visually-hidden'>Next</span>";
						echo "</button>";
						echo "<p>";
							echo "<h5 class='title'>" . $row['Name'] . "</h5>";
							echo "<h5 class='title'>€" . $row['Price'] . "</h5>";
						echo "</p>";
					echo "</div>";
					echo "<div>";
						
					echo "</div>";	
						
			
		}
		?>
		
		<div class="col-md-4" id="cart" >
			<p>
				<h5>Cart</h5>

			</p>
		</div>	
	</div>

	


</body>

</html>