<?php
session_start();
require '../dbConnection.php';
$dbConn = getConnection();


    $sql = "SELECT * FROM post_table WHERE  Id=:Id";
    $namedParameters = array();
    $namedParameters[":Id"] = $_GET['Id'];
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($namedParameters);
    $result = $stmt -> fetchAll();

   
  foreach( $result as $table){
   $tittle= $table['tittle'];
	$rating= $table['rating'];
	$director= $table['director'];
	$year= $table['year'];
	$category= $table['category'];
	$description=$table['description'];
   }


if (isset ($_POST['saveForm'])) {  //checking if we have submitted the "save" form

    $sql = "UPDATE post_table 
            SET tittle = :tittle,
                       rating = :rating,
                       director=:director,
                       year=:year,
                       category=:category,
                     description = :description
            WHERE Id = :Id";
			 $namedParameters = array();
    $namedParameters[":tittle"] = $_POST['tittle'];
    $namedParameters[":rating"] = $_POST['rating'];
	$namedParameters[":director"] = $_POST['director'];
	$namedParameters[":year"] = $_POST['year'];
	$namedParameters[":category"] = $_POST['category'];
    $namedParameters[":description"] = $_POST['description'];
    $namedParameters[":Id"] = $_POST['Id'];                
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($namedParameters);  
    
    
    header("Location: movieOption.php"); // redirects users to a new file.
    
}


?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>updatePost</title>
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
    <header>
      <h1>Update Movie</h1>
    </header>
    

    <div>
    	 
      
        
        <?php
        

        ?>
        
        <form method="post">
        	
            Tittle Name: <input type="text" name="tittle"  value="<?=$tittle;?>" /><br /><br />
            Movie Rating: <input type="text" name="rating"  value="<?=$rating;?>" /> <br /><br />
            Director: <input type="text" name="director"  value="<?=$director;?>" /><br /><br />
            Movie year: <input type="text" name="year"  value="<?=$year;?>" /> <br /><br />
            Movie category: <input type="text" name="category"  value="<?=$category;?>" /> <br /><br />
            Description: <input type="text" name="description" value="<?=$description;?>" />  <br /><br />
    
            <input type="hidden" name="Id"  value="<?= $_GET['Id'];?>" />
            <input type="submit" value="Save Info!" name="saveForm" />
        </form>
        
    </div>

    <footer>
     <p>&copy; Copyright  by lara4947</p>
    </footer>
  </div>
</body>
</html>
