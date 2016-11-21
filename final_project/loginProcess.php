
<?php
session_start(); // start a new session or resume an existing session

require"../dbConnection.php";
$dbConn= getConnection();

$username = $_POST['username'];
$password = sha1($_POST['password']); // ecription using sha1 method directly


//$sql = "SELECT	* FROM cup_admin WHERE username = '$username' AND password= '$password' "; //allowing sql injections
$sql = " SELECT * FROM user_login WHERE username= :username and password= :password";

$stmt=$dbConn -> prepare($sql);
$namedParameters = array();
$namedParameters[":username"] = $username;
$namedParameters[":password"] = $password;
$stmt -> execute($namedParameters);
$result = $stmt -> fetch();

foreach ($result as $admin){
	$_SESSION['admin']= $admin['admin'];
}

//print_r($result);
if(empty($result)){
	header("Location: index.php?error=wrong username or password!");
	 
}
else {
	$_SESSION['username'] = $result['username'];
	$_SESSION['adminName'] = $result['firstName'] . " " . $result['lastName'];
	
	
 
	//
	header("Location: index.php"); // redirects users to a new file.

 } 
  

?>



