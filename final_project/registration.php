<?php  include 'head.php'; ?>
<?php include 'header.php'; ?>

    <h1>Sign Up Form</h1>  

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