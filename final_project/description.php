<?php
session_start();
 

	require '../dbConnection.php';
	
	function getDescription(){
		
	
    $dbConn = getConnection();
 
	$post_id = $_GET['post'];
	
	$sql= "SELECT * FROM table_info t inner join post_table p on t.Id=p.Id where p.Id='$post_id' ";
 	$stmt = $dbConn->prepare($sql);
    $stmt->execute();
	
    $result= $stmt->fetchAll();
	foreach($result as $results){
		
		echo "<span>Title: </span>" .$results['tittle']. "<br>";
		echo "<span>Year: </span>" . $results['year']. "<br>";
		echo "<span>Rating: </span>" . $results['rating']. "<br>";
		echo "<span>Director: </span>" . $results['director']. "<br>";
		echo "<span>Category: </span>" . $results['category']. "<br>";
		echo "<span>Gross: </span>" . $results['gross']. "<br>";
		echo "<span>Budget: </span>" . $results['budget']. "<br>";
		echo "<span>Description: </span>" .$results['description']. "<br>";
	}
 	
	}
?>
<?php include 'head.php'; ?>
<?php include 'header.php';?>


    <div class="box">
    	
    
    	<form method="get">
      
       <?php $info = getDescription(); ?>
      </form>
    </div>

    <footer>
     <p>&copy; Copyright  by lara4947</p>
    </footer>
  </div>
</body>
</html>
