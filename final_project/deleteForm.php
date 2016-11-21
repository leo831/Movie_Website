 <?php
 
 if(isset($_GET['submit'])){
 	
 	require '../dbConnection.php';
    $dbConn = getConnection();
	
 	$sql= "DELETE tittle, image, description FROM post_table where  ";
 $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $result= $stmt->fetchAll();
	
		echo json_encode($result);
 }
?>