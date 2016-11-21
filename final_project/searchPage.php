<?php
session_start();
require '../dbConnection.php';
function searchResults() {
$dbConn = getConnection();

if(isset($_GET['submit'])){
	if(!empty($_GET['search'])){
	$search=$_GET['search'];
	$sql= "SELECT * FROM post_table WHERE tittle LIKE '%$search%'";
	$stmt=$dbConn -> prepare($sql);
	$stmt->execute();
	$result = $stmt -> fetchAll();
	foreach($result as $search) {
		echo "<span>Title: </span>".$search['tittle']."<br>";
		echo "<span>Director: </span>".$search['director']."<br>";
		echo "<span>Year: </span>".$search['year']."<br>";
		echo "<span>Rating: </span>".$search['rating']."<br>";
		echo "<span>Category: </span>".$search['category']."<br>";
		echo "<span>Description: </span>".$search['description']."<br>";
	}
	}
}


}
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>searchPage</title>
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
   <?php if(!empty($_SESSION['username']))  {?>
	  <li><a href="logout.php">Logout</a></li>   	
      <li><a href="movieOption.php">User Section</a></li>		
	<?php if(!empty($_SESSION['admin'])) {?>
      <li><a href="admin.php">Admin</a></li>
	<?php }?>
<?php }?>
      	</ul>
      	<form action="searchPage.php" method="get" class="src">
      	<input type="text" name="search" id="search"/>
      	<input type="submit" name="submit" value="search" id="submit" />
      	</form>
     </div>
      
    <div class="box">
    	<?php searchResults(); ?>
    	
      
    </div>

    <footer>
     <p>&copy; Copyright  by piita</p>
    </footer>
  </div>
</body>
</html>
