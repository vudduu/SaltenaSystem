<?php
session_start();
if(isset($_SESSION['user_id'])){
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<title>Vudduu's Saltena System</title>
		<link href="inc/css/reset.css" rel="stylesheet" type="text/css">
		<link href="inc/css/style.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="inc/js/functions.js"></script>
	</head>
	<body <?php if($_SESSION['admin_today'] == 1){?> onload="showUser(); setInterval('showUser()', 1000)" <?php } ?> >
		<div id="top_container" >
			<div id="top_left">
				<h4>Time: <?php echo date("H:i:s"); ?></h4>
				<h4>Balance: <?php echo $_SESSION['user_money'] ?>$</h4>
			</div>
			<div id="top_center">
				<h1>Saltena System</h1>
				<h2><a href="index2.php">Ticon</a></h2>
			</div>
			<div id="top_right">
				<h4><a href="logout.php">Logout</a></h4>
				<h4><span id="user_id"><?php echo $_SESSION['user_id'] ?></span></h4>
				<h4>Administrator</h4>
				<h4><a href='index3.php' >-Return-</a></h4>
			</div>
		</div>
		<?php if($_SESSION['admin_today'] == 1){ ?>
			<div id="body_container">
				<h3>Pedidos</h3>
				
				<div id="txtHint"></div>
			</div>
		<?php } else { ?>
			<h1>You are not administrator</h1>
		<?php } ?>
	</body>
</html>
<?php
}
else{
	echo "<h1>Please!, you are not a hacker with this!<h1>";
}
?>

