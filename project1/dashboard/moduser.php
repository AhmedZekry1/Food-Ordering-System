<?php 
  session_start(); 
  if (!isset($_SESSION['admin'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
?>
<?php 
	include('../server.php'); 
	$id=$_GET['id'];
	$res = mysqli_query($db, "select * from users where id=$id;", MYSQLI_USE_RESULT);
	$row = mysqli_fetch_row($res); 
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
	
  <div class="header">
  	<h2>Modify User</h2>
  </div>
	
  <form method="post" action="update.php">
  	<?php include('../errors.php'); ?>
  	<div class="input-group">
  	  <label>ID</label>
  	  <input type="text" readonly name="id" value="<?php echo $id; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $row[4]; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $row[6]; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="mod_user">Modify</button>
  	</div>
  </form>
</body>
</html>