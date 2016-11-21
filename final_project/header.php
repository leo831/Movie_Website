<!--div class="navbar navbar-static-top navbar-dark bg-inverse">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-header" aria-controls="navbar-header" aria-expanded="false" aria-label="Toggle navigation"></button>
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
    </div-->




<nav class="navbar navbar-dark bg-inverse">
  <!--a class="navbar-brand" href="#">He</a-->
  <ul class="nav navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
    </li>
  <?php if(!empty($_SESSION['username']))  {?>
    <li class="nav-item">
      <a class="nav-link" href="logout.php">Logout</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="movieOption.php">User Section</a>
    </li>
    <?php if(!empty($_SESSION['admin'])) {?>
    <li class="nav-item">
      <a class="nav-link" href="admin.php">Admin</a>
    </li>

	<?php }?>
       <?php }?> 
	     

 <?php if(empty($_SESSION['username'])) {?>
<li class="nav-item"><a class="nav-link" href="registration.php">SignUp</a></li>
  <form method="POST" action="loginProcess.php" class="form-inline float-xs-right">
    <input class="form-control" type="text" name="username" placeholder="username">
<input class="form-control" type="password" name="password" placeholder="password">
    <button class="btn btn-outline-success" type="submit">Login</button>
  </form>
 </ul>
<?php }?>
 <?php
        if(isset($_GET['error'])){
          echo $_GET['error'];
          $message = "Username and/or Password incorrect.Try again.";
          echo "<script type='text/javascript'>alert('$message');</script>";

        }
       ?>

</nav>