<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	
	<title>Product Page</title>
	
	<!-- Link to the code in connections.php -->
	<?php
		require_once 'connections.php';
	?>
	
	
	 <style type="text/css">
	 .parent {
		display: grid;
		grid-template-columns: 25% 50% 25%;
		grid-template-rows: repeat(3, 1fr);
		grid-column-gap: 10px;
		grid-row-gap: 0px;
	} 
	.carousel-inner{
		background-color: #cdc9c5 !important;
	}
	.carousel .carousel-item {
		float: left;
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
	.rightPanel{
		max-width: 180px
		float: right;
		padding-right: 10px;
		border: 3px, solid, blue;
		background-color: green;
		min-height: 400px;
		height: 100%;
	}
	/*.col {
	flex: 33.33%;
	  
	  padding: 10px;
	  margin: 5px;
	  background-color: #cccccc;
	  text-align: center;
	}
	 */
	.container-fluid {
	   display: flex;
	  /* grid-template-columns: 10% 65% 20%;*/
	   align-items: stretch;
	   padding-bottom: 8px;
	   height: 100%;
	   
	}	
	.div{
		height:100%;
	}
	.leftPanel{
	max-width: 90px;
	float: left;
	padding-left: 10px;
	background-color: lightblue;
	padding: 10px;
	height: 100%;
	}
	/* Was having an issue with a white band across bottom of screen so setting height, margin & padding to solve this */
	html, body {
		background-color: lightblue;
		height: 100%;
		margin: 0px;
		padding: 0px;
	}
	
	/* Gradient */
	.grad {
		height: 100%;
		font-family: cambria;
		
	}
	.title {
		font-size: 3em;
	}
	
	.desc, .price{
		float: left;
		font-size: 1.5em;
		text-align: justify;
	}
	.cart {
		margin-right: 20px;
		margin-bottom:50px;
	}
	.btn{
		float: left;
		background-color: #545b62;
		display:block;

	}
	/* Just here for spacing*/
	.blankSpace{
		height:70%;
	}
	
  </style>
 
  </head>
  <body>
    <h1>Product Page</h1>
  
  
<div class="py-5 grad">
	<div class="container-fluid parent"> 
		<div class="left column col-md-3">
			<p> 
				
			</p>
		</div>

		<!-- Get the id that was passed with the URL using $_POST-->
		<!-- Use the getByID function to get the accociated product info from the database -->
		<!-- Using that info, load the product photos into a carousel -->
		<!-- If the product doesn't have enough photos eg Tenders only have the *_A.jpg file -->
		<!-- Then load in the no-image.png as an alternative -->
		<?php
		
		$product = $_POST['id'];	//Gets the ProdID passed from main page
		$connection = new connections();
		$data = $connection->getByID($product);	//Get the data for the ProdID from the database
		
	
		
		
		// Carousel showing 4 images of the product selected. If the image doesn't exist a default NO-IMAGE image is shown
		// The images have a standard naming convention *ProdID*_(A/L/F/R).jpg
		while($row = $data->fetch_assoc()) {
				
					echo "<div id='carouselExampleControls' class='carousel slide col-md-6 center column' data-bs-ride='carousel'  data-bs-interval='1200' >";
						echo "<p> <h3 class='title'>" . $row['Name'] . "</h3> </p>";
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
							echo "<h2>Description</h2>";
							echo "<h5 class='desc'>" . $row['Desc'] . "</h5>";
						echo "</p>";
					echo "</div>";	
		// Create an with the ProductID, Name & Price
		$array = array(
					$row['ProdID'],
					$row['Name'],
					$row['Price']
		);
		}
		
		?>
		
		<div class="cart right column col-md-3 " align='right'>
			<div id="blankSpace" class="blankSpace">
			
			</div>
			
				<p>
					<label class="price" id="price" align="left"></label>
					<!-- Start of modal -->
						<!-- Button trigger modal -->
						<button type="button" class="btn btn-secondary btn-lg active btn-block w-100" data-bs-toggle="modal" data-bs-target="#cartModal">
						 ADD TO CART
						</button>
					
						<!-- Modal -->
						<div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
							<div class="modal-content">
							  <div class="modal-header">
								<h3 class="modal-title" id="addToCartTitle" ></h3>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							  </div>
							  <div class="modal-body" id="modal-body">
								
							  </div>
							  <div class="modal-footer">
								 <div class="quantity buttons_added">
									Quantity<input type="number" id="quantity" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode="">
								</div>
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
								<button type="button" class="btn btn-primary" id="addToCartButton" data-bs-dismiss="modal">Add to Cart</button>
							  </div>
							</div>
						  </div>
						</div>
					<!-- End of modal -->
				</p>
				
					<!-- Start of modal -->
						<!-- Button trigger modal -->
						<button type="button" class="btn btn-secondary btn-lg active btn-block w-100" data-bs-toggle="modal" data-bs-target="#buyNowModal">
						 BUY NOW
						</button>
					
						<!-- Modal -->
						<!-- When the modal closes the user will get redirected to the checkout -->
						<div class="modal fade" id="buyNowModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" onclosed="window.location.href='checkout.html';">
						  <div class="modal-dialog">
							<div class="modal-content">
							  <div class="modal-header">
								<h3 class="modal-title" id="buyNowTitle" ></h3>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							  </div>
							  <div class="modal-body" id="modal-bodyBuy">
								
							  </div>
							  <div class="modal-footer">
								 <div class="quantity buttons_added">
									Quantity<input type="number" id="quantity2" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode="">
								</div>
								
								<button type="button" class="btn btn-primary" id="buyButton" data-bs-dismiss="modal" >BUY</button>
							  </div>
							</div>
						  </div>
						</div>
					<!-- End of modal -->
			
		</div>	
	</div>

</div>	


</body>

</html>

<script type="text/javascript">

	// Use JSON_encode to get from a PHP array to a JS array
    var productArray = <?php echo json_encode($array); ?>;
	var id = productArray[0];
	var name = productArray[1];
	var price = productArray[2];
	
	// Use DOM to render product info 
	document.getElementById("price").innerHTML = "€" + price;	
	document.getElementById("addToCartTitle").innerHTML = name;
	document.getElementById("buyNowTitle").innerHTML = name;
	document.getElementById("modal-body").innerHTML ="Price €" + price;	
	document.getElementById("modal-bodyBuy").innerHTML ="Price €" + price;	
	
	// Add the product info and quantity to localStorage as an object 
	var addToCartFunc = function addToCart() {
		// So, the same id="quantity" is used for the addToCart and buyNow modals
		// Use Math.max to get which of them has the quantity value
		var quantity = Math.max(document.getElementById("quantity").value, document.getElementById("quantity2").value);
		
		// Create an object named product with the following properties
		// product.id
		// product.name
		// product.price
		// product.quantity
		var product = {id: id, name: name, price: price, quantity: quantity};
		
		// If the product is already in localStorage delete it and add it back with the new quantity
		// This is essentially updating the quantity field
		if (localStorage.getItem(id) != null) {
			localStorage.removeItem(id);
			// localStorage can only store strings - using JSON.stringify to ensure everything is stored correctly
			localStorage.setItem(id, JSON.stringify(product));
		} else {
			localStorage.setItem(id, JSON.stringify(product));
		}
		
	}
	
	document.getElementById('addToCartButton').onclick = addToCartFunc();
	
	jQuery(document).ready(function(e) {
    $('#buyNowModal').on('hidden.bs.modal', function () {
		addToCartFunc();
		window.location.href = "checkout.html"  
		})
	});
	
	

 </script>


