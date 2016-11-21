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
?>
<?php include 'head.php'; ?>
<?php include 'header.php';?>
 
    <div class="box">
    	<?php searchResults(); ?>
    	
      
    </div>

    <footer>
     <p>&copy; Copyright  by piita</p>
    </footer>
  </div>
</body>
</html>
