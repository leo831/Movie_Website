<?php
session_start();
if (empty($_SESSION['admin'])) {
    header('Location: index.php');
    exit;
}
 require '../dbConnection.php';
 function getPost(){
     
  
    $dbConn = getConnection();
    
    $sql = "SELECT Id, tittle FROM post_table";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
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
 function getAggregate(){
 	$dbConn = getConnection();
 $sql="SELECT count(tittle), avg(rating) FROM post_table";
 $stmt = $dbConn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll();  
   
   foreach ($result as $title){
	 	echo "  <strong> There is a total of " . $title['count(tittle)'] . " movies - AVG Rating: ".$title['avg(rating)']. "</strong>";
	 }
 }
 

 ?>
<?php include 'head.php'; ?>
<?php include 'header.php';?>

  <script>
  	function confirmDelete(tittle){
  		var remove = confirm("Do you rally want to delete it?");
  		
  		// its the same as using the return only
  		/*
  		if(remove){
  			return true;
  		}
  		else {
  			return false;
  		}*/
  		
  		return confirm("Do you rally want to delete" + tittle + "?");
  	}
  	
  	
  </script>



  <div id="wrapper">

     <?php 
     echo "<div class='movie'>";$movies = getAggregate();
	 echo "</div>";
	
     ?>
     
        
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
      	<form method="POST" action="insert.php" enctype="multipart/form-data">
      		
      		<input type="hidden"  value="<?=$_SESSION['userId'];?>" name="userId" id="userId" />  
      		<input type="file" name="fileName" />    <br /> 		 
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
</body>
</html>
<script>
/*function dataInsert(){	
$('#movieForm').submit(function(){      
    
        $.ajax({
            url: 'http://hosting.otterlabs.org/laraleobardo/cst336/final_project/insert.php', 
            type: 'GET',
        
            data: {
            	'tittle': $("#tittle").val(),
            	'rating': $("#rating").val(),
            	'director': $("#director").val(),
            	'year': $("#year").val(),
            	'gross': $("#gross").val(),
            	'year': $("#year").val(),
            	'budget': $("#budget").val(),
            	'description': $("#description").val(),
              	'submit':   'submit'
            	
            },
            success: function(){
            	  //alert("success");
            	$("#edit").append("<br>" + "Information was saved").css("color","green");
        },
        
            error: function(){
            	//alert("error");
            	$(".message").append("Information was saved").css("color","red");

        }
        });
       
        
  });
	 return false;
}
</script>
<script>
	
//$("#movieForm").change(dataInsert);
 
</script>