<?php
	require '../dbConnection.php';
    $dbConn = getConnection();
	
	if(isset($_POST['submit'])) {
		$userId=$_POST['userId'];
		$tittle=$_POST['tittle'];
		$year=$_POST['year'];
		$rating=$_POST['rating'];
		$category=$_POST['category'];
		$director=$_POST['director'];
		$description= $_POST['description'];
		
		$gross=$_POST['gross'];
		$budget=$_POST['budget'];
		
$sql= "INSERT INTO post_table  (userId, tittle, rating, director, year, category, description) VALUES 
('$userId', '$tittle', '$rating','$director', '$year', '$category', '$description')";
 
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();

    $imageType =  exif_imagetype($_FILES['fileName']['tmp_name']); //returns 1=gif, 2=jpg, or 3=png
    
    if ($imageType != 1  && $imageType != 2 && $imageType != 3) {
    
       unlink($_FILES['fileName']['tmp_name']); //deletes file if not an image    
        
    } else {
    
     
	$dir = "img/posters/";
    
       move_uploaded_file($_FILES['fileName']['tmp_name'], $dir . "/" . $_FILES['fileName']['name'] );
	   	$image = $_FILES['fileName']['name'];
	   	}
$sql= "INSERT INTO table_info  (gross, budget, image) VALUES ('$gross', '$budget','$image') ";
 
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
	
	 //echo $tittle;
	 header("Location: movieOption.php"); 
 
	}
?>
