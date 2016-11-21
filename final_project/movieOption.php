<?php
session_start();
 require '../dbConnection.php';
 function getPost(){
     
  
    $dbConn = getConnection();
    $user=$_SESSION['username'];
    $sql = "SELECT *FROM user_login where username=:username";
    $stmt = $dbConn->prepare($sql);
	$namedParameters = array();
	$namedParameters[":username"]=$user;
    $stmt->execute($namedParameters);
    $result = $stmt->fetchAll();    
	
	foreach($result as $info){
	$_SESSION['userId']=$info['userId'];
		//echo "$section";
	}
	
	$sql = "SELECT *FROM post_table where userId=:userId";
    $stmt = $dbConn->prepare($sql);
	$namedParameters = array();
	$namedParameters[":userId"]=$_SESSION['userId'];
    $stmt->execute($namedParameters);
    $result = $stmt->fetchAll();   
	
    return $result;
 }
 
 if(isset($_POST['deleteForm'])){
 	
 	  $dbConn= getConnection();
	 
    $sql = "Delete FROM post_table WHERE Id = :Id";
    $namedParameters = array();
    $namedParameters[":Id"] = $_POST['Id'];
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($namedParameters);
	
	
 }

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>user </title>
  <meta name="description" content="">
  <meta name="author" content="piita">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
  
     <link rel="stylesheet" type="text/css" href="css/album.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
 <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
  
  <script>
  	function confirmDelete(tittle){
  		var remove = confirm("Do you rally want to delete it?");
  		
  		
  		return confirm("Do you rally want to delete" + tittle + "?");
  	}
  	
  	
  </script>
  
</head>

<body>
<div class="navbar navbar-static-top navbar-dark bg-inverse">
      <div class="container-fluid">
      <ul>
       <li> <a href="index.php" class="navbar-brand">Home</a></li>
       <?php if(!empty($_SESSION['username']))  {?>
    <li><a href="logout.php" class="navbar-brand">Logout</a></li>    
      <li><a href="movieOption.php" class="navbar-brand">User Section</a></li>   
  <?php if(!empty($_SESSION['admin'])) {?>
      <li><a href="admin.php" class="navbar-brand">Admin</a></li>
  <?php }?>
<?php }?>
</ul>
      </div>
    </div>
  <div id="wrapper">
	
       <div class="tableinfo">
      <table border='1'>
      	<th>Movie Title</th><th>Update</th><th>Delete</th>
        <?php
        
        $post = getPost();
        
		
           foreach ($post as $posts) {
            echo "<tr>";
            echo "<td>" . $posts['tittle'] . "</td>";
		   
     ?>    
            <td>
                <form action="updatePost.php" method="GET">
                  <input type="hidden"    name="Id" value="<?=$posts['Id']?>"/>
                  <input type="submit" value="Update" name="updateForm" />
                </form>
            </td>
            <td>
                <form method="post" onsubmit=" return confirmDelete('<?=$posts['tittle']?>')">
                  <input type="hidden"    name="Id" value="<?=$posts['Id']?>"/>                    
                  <input type="submit" value="Delete" name="deleteForm" />
                </form>
            </td>
            
            
         <?php        
            echo "</tr>";
        } //foreach ends
        
        ?>
        
        </table>
   
  
    <div id="movieForm">
      	<form action="insert.php" method="get">
      		<p> Create a new movie post.</p>
      	<input type="hidden"  value="<?=$_SESSION['userId'];?>" name="userId" id="userId" /> 
      	  tittle: <br /><input type="text" name="tittle" id="tittle" required/>  <br /> 
      	  Rating: <br /><input type="text" name="rating" id="rating" required/>  <br /> 
      	  director: <br /><input type="text" name="director" id="director" required/>  <br /> 
      	  year: <br /><input type="text" name="year" id="year" required/>  <br /> 
      	  Gross: <br /><input type="text" name="gross" id="gross" required/>  <br /> 
      	  Budget: <br /><input type="text" name="budget" id="budget" required/>  <br />
      	  category: <br /><input type="text" name="category" id="category" required/>  <br /> 
       description:<br/> <textarea rows="4" cols="50" name="description"id="description" required></textarea> <br /> 
        <input type="submit" value="submit!" name="submit" id="button" />
        </form>
      
    </div>
     </div>

    <footer>
     <p>&copy; Copyright  by lara4947</p>
    </footer>
  </div>
</body>
</html>
<script>
/*
function dataInsert(){	
$('#movieForm').submit(function(){      
    
        $.ajax({
            url: 'http://hosting.otterlabs.org/laraleobardo/cst336/final_project/insert.php', 
            type: 'GET',
        
            data: {
            	'userId': $("#userId").val(),
            	'tittle': $("#tittle").val(),
            	'rating': $("#rating").val(),
            	'director': $("#director").val(),
            	'year': $("#year").val(),
            	'category': $("#category").val(),
            	'description': $("#description").val(),
              	'submit':   'submit'
            	
            },
            success: function(){
            	  alert("success");
            	$("#edit").append("<br>" + "Information was saved").css("color","green");
        },
        
            error: function(){
            	alert("error");
            	$(".message").append("Information was saved").css("color","red");

        }
        });
       
        
  });
	 return false;
}*/
</script>
<script>
	
//$("#movieForm").change(dataInsert);
 
</script>
