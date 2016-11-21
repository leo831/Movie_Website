<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Main Page</title>
  <meta name="description" content="">
  <meta name="author" content="piita">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
  
  <link rel="stylesheet" type="text/css" href="css/album.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  

</head>

<body>
    <div class="navbar navbar-static-top navbar-dark bg-inverse">
      <div class="container-fluid">
        <!--button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-header" aria-controls="navbar-header" aria-expanded="false" aria-label="Toggle navigation"></button-->
        <ul>
        <li><a href="index.php" class="navbar-brand">Home</a></li>
       
        <?php if(empty($_SESSION['username'])) {?>     
       <form method="post" action="loginProcess.php" class="log">
       <input type="text" name="username"  placeholder="Username"/>
       <input type="password" name="password"  placeholder="password" />
       <input type="submit" class="button" value="login!" />
       </form>
       <li><a href="registration.php" class="navbar-brand">Create Acount</a></li>
       <?php
        if(isset($_GET['error'])){
          echo $_GET['error'];
          $message = "Username and/or Password incorrect.Try again.";
          echo "<script type='text/javascript'>alert('$message');</script>";

        }
       ?>
       <?php }?>
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
    <section class="jumbotron text-xs-center">
      <div class="container">
        <h1 class="jumbotron-heading">Movie Catalog Website Project</h1>
        <ul class="right">      
    <li>
        <form action="searchPage.php" method="get" class="search">
        <input type="text" name="search" id="search"/>
        <input type="submit" name="submit" value="search" id="submit" />
        </form>
        </li>
        </ul>
     </div>
        <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
        
      </div>
    </section>

  <div id="wrapper">
   	
    	  
    	   <div class="album text-muted">
      <div class="container">

    <div class="row"> </div>
</div>
</div>

  </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>

<script src="js/ie10-viewport-bug-workaround.js"></script>
<script src="js/bootstrap.min.js"></script>


<script>
	 	 function getInfo(){
  	      $.ajax({
            
            url: "retrive.php",
            type: "GET",
            dataType: "json",
          
                success: function(data) {
                	//alert("helo");
                   $.each(data, function(i, item){
                        	
                        var tittle = item.tittle;
                        var Id = item.Id;
                        var rating = item.rating;
                        var director = item.director;
                        var year = item.year;
                        var category = item.category;
						var description = item.description;
						if(item.image.length!=0) {
							var img = $("<img>").attr("src","img/posters/"+item.image);
						}
						var post_id = $("<a class='btn'>").attr("href", "description.php?post="+Id).append("More Details")
            var post = $("<div class='card'>").append(img).append("<strong>Title:</strong> "+tittle+"<br>", "<strong>Director:</strong> "+director+"<br>","<strong>Year:</strong> "+ year+"<br>","<strong>Rating:</strong> "+ rating+"<br>","<strong>Category:</strong> "+ category+"<br>").append(post_id);
                		   $(".row").append(post);
                		 
                        }); 
                 },                
                error: function (data){
              		 	alert("fail");
              		 }    
              		 });                
         }
  
  getInfo();
  
  function deleteInput(){
  	 $.ajax
  	 ({

        url: "http://hosting.otterlabs.org/laraleobardo/cst336/final_project/retrive.php",
        type: "GET",
        dataType: "json",          
          success: function(data) {
           	      alert("helo");                        	
                 },                        	
          error: function (data){
             	 	alert("fail");
              	 }    
      });   
    }
  
</script>
</body>
</html>

