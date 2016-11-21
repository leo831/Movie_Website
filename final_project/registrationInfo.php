<?php
require"../dbConnection.php";
$dbConn = getConnection(); 


if(isset($_POST['submit'])) {
 	$firstName = $_POST['firstName'];
	$lastName= $_POST['lastName'];
	$email= $_POST['email'];
	$username= $_POST['username'];
	$password= sha1($_POST['password']);
	
	$sql= "INSERT INTO user_login (firstName, lastName, email, username, password) 
	values ('$firstName', '$lastName','$email', '$username', '$password')";
	
$stmt = $dbConn->prepare($sql); 
$stmt->execute(); 



 }
 
?>