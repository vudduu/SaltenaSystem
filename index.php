<?php
session_start();
if(isset($_SESSION['user_id'])){
	echo "<meta http-equiv=refresh content=0;URL=index2.php>";
}
include("conection.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<title>S-System</title>
		<link href="inc/css/reset.css" rel="stylesheet" type="text/css">
		<link href="inc/css/style.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="inc/js/functions.js"></script>
	</head>
	<body>
		<div id="top_container" class="trans">
			<div id="top_left"><h4>Time: <?php echo date("H:i:s"); ?></h4></div>
			<div id="top_center"><h1>Saltena System</h1></div>
			<div id="top_right"></div>
		</div>
		<div id="body_container" class="trans">
			<form name = "form" method = "post" action = "index.php">
				<table>
					<tr><td>Login   :</td><td><input name = "user" type = "text"></td></tr>
					<tr><td>Password:</td><td><input name = "password" type = "password"></td></tr>
					<tr><td><input type = "submit" name = "submit" value = "Submit"/></td></tr>
				</table>
			</form>
		</div>
		<?php
		if(isset($_POST['submit'])){
			$interface = new Conection();
			$interface::connect();
			$data = $interface::queryTable("select * from users where user_login = '".$_POST['user']."'");
			if(sizeof($data) <= 0){
				$data = $interface::queryTable("select * from users where user_id = '".$_POST['user']."'");
				if(strlen($data[0]['user_login']) > 0){
					echo "<b>The password is wrong.</b>";
				}
				elseif(sizeof($data) >= 1){
					$_SESSION['user_id'] = $_POST['user'];
					echo "<meta http-equiv=refresh content=0;URL=edit_user.php>";
				}
				else{
					echo "<b>The user or C.I. is wrong.</b>";
				}
			}
			elseif($_POST['password'] == null){
				echo "<b>The password is wrong</b>";
			}
			elseif($data[0]['user_pass'] != $_POST['password']) {
				echo "<b>The password is wrong</b>";
			}
			else{
				$_SESSION['user_id']	= $data[0]['user_id'];
				$_SESSION['user_login']	= $data[0]['user_login'];
				$_SESSION['user_name']	= $data[0]['user_name'];
				$_SESSION['user_time']	= $data[0]['user_time'];
				$_SESSION['user_money']	= $data[0]['user_money'];
				$_SESSION['user_admin'] = $data[0]['user_admin'];
				$_SESSION['mod_id']		= $data[0]['mod_id'];
				echo "<meta http-equiv=refresh content=0;URL=index2.php>";
			}
			$interface::disconnect();
		}
		?>
	</body>
</html>

