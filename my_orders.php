<?php
session_start();
if(isset($_SESSION['user_id'])){
include("conection.php");
include("users_lib.php");
$interface = new Conection();
$users_interface = new Users();
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
					<h4>Balance: <?php echo $_SESSION['user_money']; ?>$</h4>
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
					<li><a href="my_orders.php" class="active">My Orders</a></li>
					<li><a href="questions.php">Questions</a></li>
					<li><a href="wall_of_honor.php">Wall of Honor</a></li>
				</ul>
			</div>
			<div id="content_container" class="trans">
				<h3>Orders of Today</h3>
				<table border='1'>
				<?php
				$table = $users_interface::list_orders_today($interface, $_SESSION['user_id']);
				for($i=0; $i<sizeof($table); $i++){
					echo "<tr><td>".$table[$i][0]."</td><td>".$table[$i][1]." u.</td><td>".$table[$i][2]*$table[$i][1]." Bs.</td></tr>";
				}
				?>
				</table>
				<h3>List of Orders: Cost by date</h3>
				<table border='1'>
				<?php
				$table = $users_interface::list_money_by_day($interface, $_SESSION['user_id']);
				for($i=0; $i<sizeof($table); $i++){
					echo "<tr><td>".$table[$i][0]."</td><td>".$table[$i][1]."Bs.</td></tr>";
				}
				?>
				</table>
				<div id="clear"></div>
			</div>
			<div id="message_div" class="trans">	
				<span id="messages" ></span>
			</div>
			<!-- <div id="footer_container"></div> -->
		</div>
	</body>
</html>
<?php
$interface::disconnect();
}
else{
	echo "<meta http-equiv=refresh content=0;URL=index.php>";
}
?>

