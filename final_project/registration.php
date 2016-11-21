<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>registration</title>
  <meta name="description" content="">
  <meta name="author" content="piita">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
  
  
  
      <link rel="stylesheet" type="text/css" href="css/album.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/style.css"
</head>

<body >
 <div class="navbar navbar-static-top navbar-dark bg-inverse">
      <div class="container-fluid">
        <a href="index.php" class="navbar-brand">Home</a>
        <a href="index.php" class="navbar-brand">Login</a>
      </div>
    </div>
	<!--div class="menu">	
	 <ul>
	 	<li>
	 		<a href="index.php">Login</a>
	 	</li>
	 </ul>
	 </div-->
  <div>
    <header>
      <h1>Sign Up Form</h1>
    </header>
  

    <div id="loginForm">

     <form>
       First Name: <br /><input type="text" name="firstName" id="firstName" required> <br /><br />
       Last Name: <br /><input type="text" name="lastName" id="lastName" required> <br /><br />
       eMail:     <br /><input type="text" name="email" id="email" required> <br /><br />
       username: <br /><input type="text" name="username" id="username" required/>  <br /><br />
       password:<br/> <input type="text" name="password" id="password" required/><br /><br />
        <input type="submit" value="Sign up!" name="submit" id="button" /><br />
      	
       </form>
   
    </div>

    <footer>
     <p>&copy; Copyright  by lara4947</p>
    </footer>
  </div>
</body>
</html>
<script>
	
$('#loginForm').submit(function(){      
    
        $.ajax({
            url: 'http://hosting.otterlabs.org/laraleobardo/cst336/final_project/registrationInfo.php', 
            type: 'POST',
        
            data: {
            	'firstName': $("#firstName").val(),
            	'lastName': $("#lastName").val(),
            	'email': $("#email").val(),   
            	'username': $("#username").val(),
            	'password': $("#password").val(),   
            	'submit':   'submit'
            	
            },
            success: function(){
            	  alert("Registration was Successful. You can login now");
           		 window.location.replace("index.php");            	
        },
        
            error: function(){
            	alert("error");
            	$(".message").append("Information was saved").css("color","red");

        }
        });
        return false;
        
  });
	
	
</script>