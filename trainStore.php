<?php

class trainStore 
{
	
	public function search($query) {
		require_once './products.php';
		
		$products = new products();
		$nameNotFound = false;
		
		
		return = $products->getByName($query);
	}
		
		