<?php
session_start();
if(isset($_SESSION['user_id'])){
include("conection.php");
$interface = new Conection();
$interface::connect();
?>
<!DOCTYPE html>
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
				<li><a href="ticon.php" class="active" >Ticon</a></li>
				<li><a href="activities.php">Activities</a></li>
				<li><a href="orders.php">Orders</a></li>
				<li><a href="my_orders.php" >My Orders</a></li>
				<li><a href="questions.php">Questions</a></li>
				<li><a href="wall_of_honor.php">Wall of Honor</a></li>
			</ul>
		</div>
	
		<div id="content_container" class="trans">
			<div id="txtHint">
				<table>
					<tr><th>CodeRoad Out</th><th>CodeRoad In</th><th>Lazar Out</th><th>Lazar In</th></tr>
					<?php
					//echo "<tr><th>Name</th><th>Time</th></tr>";
					//$data = $interface::queryTable("select * from users ORDER BY user_name");
					//for($i=0; $i<sizeof($data); $i++){
					//	echo "<tr><td>".$data[$i]['user_name']."</td><td>".$data[$i]['user_time']."</td></tr>";
					//}
					?>
				</table>
			</div>
			<div id="clear"></div>
		</div>
	</div>
		<!-- <div id="footer_container"></div> -->
</body>
</html>
<?php
}
else{
	echo "<meta http-equiv=refresh content=0;URL=index.php>";
}
?>

