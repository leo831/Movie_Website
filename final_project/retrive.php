<?php

  
	require '../dbConnection.php';
    $dbConn = getConnection();
	
	
$sql= "SELECT p.Id, image, tittle, director, year, rating, category, description FROM post_table p inner join table_info t on p.Id=t.Id ORDER BY Id DESC";
 $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $result= $stmt->fetchAll();
	
	echo json_encode($result);
	 

?>
