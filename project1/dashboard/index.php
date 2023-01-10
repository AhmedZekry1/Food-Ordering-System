<?php 
	error_reporting(E_ALL ^ E_NOTICE);  
  session_start(); 

  if (!isset($_SESSION['admin'])) {
  	$_SESSION['msg'] = "You must log in first";
	//die("username");
	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['admin']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <link rel="stylesheet" type="text/css" href="./style.css?v=1" />
</head>
<body>
  <div class="header">
  	<h2>Dashboard</h2>
  </div>
  <div class="content">			
  	<div class="input-group">
  		<button class="btn" id="addUser"><a href="adduser.php">Add User</a></button>
  	</div>
  	<div class="input-group">
  		<button class="btn" id="editUser"><a href="editusers.php">Edit Users</a></button>
  	</div>
  </div>
</body>
</html>