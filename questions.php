<?php
session_start();
if(isset($_SESSION['user_id'])){
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
					<li><a href="questions.php" class="active">Questions</a></li>
					<li><a href="wall_of_honor.php">Wall of Honor</a></li>
				</ul>
			</div>
			<div id="content_container" class="trans">
				<h1>Page on construction</h1>
				<div id="clear"></div>
			</div>
			<div id="footer_container" class "trans">
			</div>
		</div>
	</body>
</html>
<?php
}
else{ echo "<meta http-equiv=refresh content=0;URL=index.php>"; }
?>

