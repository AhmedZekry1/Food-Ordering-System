<?php 
  session_start(); 
  if (!isset($_SESSION['admin'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
?>

<?php include('../server.php') ?>



<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
	
  <div class="header">
  	<h2>Edit Users</h2>
  </div>

	<div class="content">
		<div class="users">
		<div>ID</div>
		<div>Username</div>
		<div>Email</div>
		<div></div>
		<?php	
		$res = mysqli_query($db, "select * from users;", MYSQLI_USE_RESULT);
		if ($res) {
			while ($row = mysqli_fetch_row($res)) {
				$id=$row[0];
				print("<div>$id</div>");
				print("<div>".$row[4]."</div>");
				print("<div>".$row[6]."</div>");
				print("<div>");
				print("<i class='fa fa-window-close' onclick='del($id)'></i>");
				print(" <i class='fa fa-edit' onclick='mod($id)'></i>");
				print("</div>");
			}
		}
		?>
		</div>
	</div>

<script>
function del(id)
{
	window.location.href = "deluser.php?id="+id;	
}

function mod(id)
{
	window.location.href = "moduser.php?id="+id;	
}

</script>
	
</body>
</html>