<?php
session_start();
if(!isset($_SESSION['user_id'])){
	echo "<meta http-equiv=refresh content=0;URL=index.php>";
}
include("conection.php");
include("functions.php");

$interface = new Conection();
$interface::connect();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<title>S-System</title>
		<link href="inc/css/reset.css" rel="stylesheet" type="text/css">
		<link href="inc/css/style_new.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="inc/js/functions.js"></script>
	</head>
	<body>
		<div id="container">
			<div id="header_container" class="trans">
				<div id="top_left">
					<h4>Time: <?php echo date("H:i:s"); ?></h4>
					<h4>Balance: <?php echo $_SESSION['user_money'] ?>$</h4>
				</div>
				<div id="top_center">
					<img class="logo" src="img/logo.png" alt="Saltena System">
				</div>
				<div id="top_right">
					<h4><a href="logout.php">Logout</a></h4>
					<h4><a href="edit_user.php"><?php echo $_SESSION['user_login'] ?></a></h4>
					<?php if($_SESSION['user_admin'] == 1){ echo "<h4><a href='admin.php' >Administrator</a></h4>"; } ?>
				</div>
			</div>
			<div id="navigation">
				<ul id="nav">
					<li><a href="ticon.php">Ticon</a></li>
					<li><a href="activities.php">Activities</a></li>
					<li><a href="orders.php">Orders</a></li>
					<li><a href="questions.php">Questions</a></li>
					<li><a href="wall_of_honor.php">Wall of Honor</a></li>
				</ul>
			</div>
		
			<div id="content_container" class="trans">
				<div id="txtHint">
				<form name = "form" method = "post" action = "edit_user.php">
					<table>
						<tr><td>Login *:</td><td><input name = "user_login" type = "text" value="<?php
							if($_POST['user_login'] == null || !isset($_POST['user_login'])){ echo $_SESSION['user_login']; }
							else{ echo $_POST['user_login']; }
							?>" size="35" maxlength="20" ></td></tr>
						<tr><td>Password *:</td><td><input name = "password1" type = "password" value="" size="35" maxlength="10"></td></tr>
						<tr><td>Confirm Password *:</td><td><input name = "password2" type = "password" value="" size="35" maxlength="10"></td></tr>
						<tr><td>Name *:</td><td><input name = "user_name" type = "text" value="<?php
							if($_POST['user_name'] == null || !isset($_POST['user_name'])){ echo $_SESSION['user_name']; }
							else{ echo $_POST['user_name']; }
							?>" size="35" maxlength="30" ></td></tr>
						<tr><td>Date of Birth *:</td><td><input name = "user_date" type = "text" value="<?php
							if($_POST['user_date'] == null || !isset($_POST['user_date'])){ echo $_SESSION['user_date']; }
							else{ echo $_POST['user_date']; }
							?>" size="35" maxlength="10" >"YYYY-MM-DD"</td></tr>
						<tr><td><input type = "submit" name = "submit" value = "Submit"/></td></tr>
					</table>
				</form>
				</div>
				<div id="clear"></div>
			</div>
	<?php
	if(isset($_POST['submit'])){
		$flag = true;
		if($_POST['user_login'] == null){
			echo "<b>Please the 'Login' is required.</b></br>"; $flag = false;
		}
		if($_POST['password1'] == null){
			echo "<b>Please the 'Password' is required.</b></br>"; $flag = false;
		}
		if($_POST['password2'] == null){
			echo "<b>Please confirm the 'Password'.</b></br>"; $flag = false;
		}
		if($_POST['user_name'] == null){
			echo "<b>Please the 'Name' is required.</b></br>"; $flag = false;
		}
		if($_POST['user_date'] == null){
			echo "<b>Please the 'Date' is required.</b></br>"; $flag = false;
		}
		//user_id	user_name	user_login	user_pass	user_date	user_money	mode_id
		if($flag){
			if($_POST['password1'] != $_POST['password2']){
				echo "<b>The password confirmation is not equal.</b></br>";
			}
			elseif(!checkDateFormat($_POST['user_date'])){
				echo "<b>The date is wrong!.</b>";
			}else{
				$_POST['user_name'] = filter_var($_POST['user_name'], FILTER_SANITIZE_STRING);
				$_POST['password1'] = filter_var($_POST['password1'], FILTER_SANITIZE_STRING);
				$_POST['user_login'] = filter_var($_POST['user_login'], FILTER_SANITIZE_STRING);
				$interface = new Conection();
				$interface::connect();
				$sql = "update users set ";
				$sql.= "user_name = '".$_POST['user_name']."', ";
				$sql.= "user_pass = '".$_POST['password1']."', ";
				$sql.= "user_login = '".$_POST['user_login']."', ";
				$sql.= "user_date = '".$_POST['user_date']."' ";
				$sql.= "where user_id = '".$_SESSION['user_id']."' ";
				$interface::queryExe($sql);
				$data = $interface::queryTable("select * from users where user_id = '".$_SESSION['user_id']."'");
				$_SESSION['user_id']	= $data[0]['user_id'];
				$_SESSION['user_name']	= $data[0]['user_name'];
				$_SESSION['user_login']	= $data[0]['user_login'];
				$_SESSION['user_pass']  = $data[0]['user_pass'];
				$_SESSION['user_date']	= $data[0]['user_date'];
				$_SESSION['user_admin'] = $data[0]['user_admin'];
				$_SESSION['mode_id']	= $data[0]['mode_id'];
				$interface::disconnect();
			}
		}
	}
?>
	</div>
	</body>
</html>

