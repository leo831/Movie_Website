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
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>description</title>
  <meta name="description" content="">
  <meta name="author" content="piita">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
  <div id="wrapper">
  <div class="menu">
  		<ul>
	<li><a href="index.php">Home</a></li>
	</ul>
  	
  </div>
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
