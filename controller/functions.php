<?php

/* Masooma Bakhshi u3168789*/

//redirect
function redirect($path)
{
	header('location:'. $path);
} 

//create a function to retrieve all buildings info
	function get_buildings()
	{
		global $conn;
		$sql = 'SELECT * FROM buildings';
		$statement = $conn->prepare($sql);
		$result=$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
		return $result;	
	}	
	
//create a function to retrieve building info
	function get_building($ID)
	{
		global $conn;
		$sql = 'SELECT * FROM buildings WHERE ID = :ID';
		$statement = $conn->prepare($sql);
		$statement->bindValue(':ID', $ID);
		$result=$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
		return $result;	
	}	

//create a function to retrieve classes info
	function get_classes()
	{
		global $conn;
		$sql = 'SELECT * FROM classes';
		$statement = $conn->prepare($sql);
		$result=$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
		return $result;
	}
	
//create a function to retrieve class info
	function get_clas($ID)
	{
		global $conn;
		$sql = 'SELECT * FROM classes WHERE ID = :ID';
		$statement = $conn->prepare($sql);
		$statement->bindValue(':ID', $ID);
		$result=$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
		return $result;
	}	
	
//create a function to retrieve cafes info
	function get_cafes()
	{
		global $conn;
		$sql = 'SELECT * FROM cafes';
		$statement = $conn->prepare($sql);
		$result=$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
		return $result;	
	}	
	
//create a function to retrieve cafes info
	function get_cafe($ID)
	{
		global $conn;
		$sql = 'SELECT * FROM cafes WHERE ID = :ID';
		$statement = $conn->prepare($sql);
		$statement->bindValue(':ID', $ID);
		$result=$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
		return $result;	
	}	
	
//create a function to retrieve events info
	function get_events()
	{
		global $conn;
		$sql = 'SELECT * FROM events';
		$statement = $conn->prepare($sql);
		$result=$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
		return $result;
	}	
	
//create a function to retrieve events info
	function get_event($ID)
	{
		global $conn;
		$sql = 'SELECT * FROM events WHERE ID = :ID';
		$statement = $conn->prepare($sql);
		$statement->bindValue(':ID', $ID);
		$result=$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
		return $result;
	}			


//create a function to retrieve classes info
	function get_person($ID)
	{
		global $conn;
		$sql = 'SELECT * FROM people WHERE ID = :ID';
		$statement = $conn->prepare($sql);
		$statement->bindValue(':ID', $ID);
		$result=$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
		return $result;	
	}	
		
//create a function to retrieve classes info
	function get_people()
	{
		global $conn;
		$sql = 'SELECT * FROM people';
		$statement = $conn->prepare($sql);
		$result=$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
		return $result;	
	}
	
//create a function to retrieve classes info
	function get_office($ID)
	{
		global $conn;
		$sql = 'SELECT * FROM offices WHERE ID = :ID';
		$statement = $conn->prepare($sql);
		$statement->bindValue(':ID', $ID);
		$result=$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
		return $result;
	}	
	
//create a function to retrieve classes info
	function get_offices()
	{
		global $conn;
		$sql = 'SELECT * FROM offices';
		$statement = $conn->prepare($sql);
		$result=$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
		return $result;
	}	
//create a function to retrieve building info
	function get_join($ID)
	{
		global $conn;
		$sql = 'SELECT * FROM buildings WHERE ID = :ID UNION
				SELECT * FROM classes WHERE ID = :ID UNION
				SELECT * FROM cafes WHERE ID = :ID UNION 
				SELECT * FROM offices WHERE ID = :ID';
		$statement = $conn->prepare($sql);
		$statement->bindValue(':ID', $ID);
		$result=$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
		return $result;	
	}					
?>