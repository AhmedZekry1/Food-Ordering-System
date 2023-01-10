<?php 
  session_start(); 
  if (!isset($_SESSION['admin'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
?>

<?php 
	include('../server.php') ;
	$id=$_GET['id'];
	$res = mysqli_query($db, "delete from users where id=$id;", MYSQLI_USE_RESULT);
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
	<script>
	alert("User Deleted");		
	//window.location.href = "deluser.php?id="+id;	
	history.back();
	</script>
	
</body>
</html>