<?php
session_start();
if(!isset($_SESSION['user_id'])){
	echo "<meta http-equiv=refresh content=0;URL=index.php>";
}
include("conection.php");
$interface = new Conection();
$interface::connect();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<title>S-System</title>
		<link href="inc/css/reset.css" rel="stylesheet" type="text/css">
		<link href="inc/css/style.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="inc/js/functions.js"></script>
	</head>
	<body>
		<div id="top_container" >
			<div id="top_left">
				<h4>Time: <?php echo date("H:i:s"); ?></h4>
				<h4>Balance: <?php echo $_SESSION['user_money'] ?>$</h4>
			</div>
			<div id="top_center">
				<h1>Saltena System</h1>
				<?php if(isset($_SESSION['user_login'])) echo "<h2><a href='index2.php'>Ticon</a></h2>"; ?>
			</div>
			<div id="top_right">
				<h4><a href="logout.php">Logout</a></h4>
				<h4><span id="user_id"><?php echo $_SESSION['user_login']; ?></span></h4>
				<?php if($_SESSION['admin_today'] == 1){ echo "<a href='admin.php' >Administrator</a>"; } ?>
			</div>
		</div>
		<div id="body_container">
			<form name = "form" method = "post" action = "edit_user.php">
				<table>
				<tr><td>Login *:</td><td><input name = "user_login" type = "text" value="<?php
					if($_POST['user_login'] == null || !isset($_POST['user_login'])){ echo $_SESSION['user_login']; }
					else{ echo $_POST['user_login']; }
					?>" ></td></tr>
				<tr><td>Password *:</td><td><input name = "password1" type = "password" value=""></td></tr>
				<tr><td>Confirm Password *:</td><td><input name = "password2" type = "password" value=""></td></tr>
				<tr><td>Name *:</td><td><input name = "user_name" type = "text" value="<?php
					if($_POST['user_name'] == null || !isset($_POST['user_name'])){ echo $_SESSION['user_name']; }
					else{ echo $_POST['user_name']; }
					?>" ></td></tr>
				<tr><td><input type = "submit" name = "submit" value = "Submit"/></td></tr>
				</table>
			</form>
		</div>
	<?php
	if(isset($_POST['submit'])){
		if($_POST['user_login'] == null){
			echo "<b>Please the 'Login' is required.</b></br>";
		}
		if($_POST['password1'] == null){
			echo "<b>Please the 'Password' is required.</b></br>";
		}
		if($_POST['password2'] == null){
			echo "<b>Please confirm the 'Password'.</b></br>";
		}
		if($_POST['user_name'] == null){
			echo "<b>Please the 'Name' is required.</b></br>";
		}
		else{
			if($_POST['password1'] != $_POST['password2']){
				echo "<b>The password confirmation is not equal.</b></br>";
			}
			else{
				$interface = new Conection();
				$interface::connect();
				$sql = "update users set ";
				$sql.= "user_name = '".$_POST['user_name']."', ";
				$sql.= "user_pass = '".$_POST['password1']."', ";
				$sql.= "user_login = '".$_POST['user_login']."' ";
				$sql.= "where user_id = '".$_SESSION['user_id']."' ";
				$interface::queryExe($sql);
				$data = $interface::query("select * from users where user_id = '".$_POST['user']."'");
				$_SESSION['user_id']		= $data['user_id'];
				$_SESSION['user_login']		= $data['user_login'];
				$_SESSION['user_name']		= $data['user_name'];
				$_SESSION['user_time']		= $data['user_time'];
				$_SESSION['user_money']		= $data['user_money'];
				$_SESSION['admin_today']	= $data['admin_today'];
				$_SESSION['mod_id']			= $data['mod_id'];
				$interface::disconnect();
			}
		}
	}
	?>
	</body>
</html>

