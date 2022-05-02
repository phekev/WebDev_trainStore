<?php
// This page is probably redundant
// TODO shift this into connections
class productStore 
{
	
	
	//Returns every product in the database
	public function getAll() {
		require_once 'connections.php';
		$connections = new connections();
		
		$data = $connections->getAll(); 
		
		if ($data) {
			return $data;
		} else {
			$_SESSION['SearchErrorMessage'] = "Did not return any data";
			return false;
		}
	}
		
	//Returns a specific product in the database by name	 
	public function getByName ($name) {
		require_once 'connections.php';
		$connections = new connections();
				
		if ($data = $connections->getByName($name)) {
			return $data;
		} else {
			return false;
		}
	}
	
	//Returns a specific product in the database by ID
	public function getByID ($id) {
		require_once 'connections.php';
		$connections = new connections();
				
		if ($data = $connections->getByID($id)) {
			return $data;
		} else {
			return false;
		}
	}
	
	// 
	public function login ($user) {
		require_once 'connections.php';
		$connections = new connections();
				
		if ($data = $connections->login($user)) {
			return $data;
		} else {
			return false;
		}
	}
	
	// Search is incomplete
	public function search($query) {
		require_once 'connections.php';
		
		$connections = new connections();
		
		
		
		return $connections->getByName($query);
		
	} 
}
		
	

?>
		
		
		
		