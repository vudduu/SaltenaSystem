<?php
session_start();
if(isset($_SESSION['user_id'])){

include("conection.php");
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
					<li><a href="orders.php" class="active">Orders</a></li>
					<li><a href="my_orders.php" >My Orders</a></li>
					<li><a href="questions.php">Questions</a></li>
					<li><a href="wall_of_honor.php">Wall of Honor</a></li>
				</ul>
			</div>
			<div id="content_container" class="trans">
				<div class="product">
					<h2>Pollo</h2>
					<button type="button" class="button_plus" onClick="add_pollo();" ></button>
					<span class="count" name="pollo" id="pollo">
					<?php
						$table = $interface::queryTable("select * from orders where user_id='".$_SESSION['user_id']."' and prod_id=1 and ord_date='".date("Y-m-d")."'");
						if(0 < sizeof($table)){
							echo $table[0]['ord_quantity'];
						}
						else{
							echo "0";
						}
					?> de Pollo</span>
					<button type="button" class="button_minus" onClick="res_pollo();" ></button>
				</div>
				<div class="product">
					<h2>Carne</h2>
					<button type="button" class="button_plus" onClick="add_carne();" ></button>
					<span class="count" name="carne" id="carne">
					<?php
						$table = $interface::queryTable("select * from orders where user_id='".$_SESSION['user_id']."' and prod_id=2 and ord_date='".date("Y-m-d")."'");
						if(0 < sizeof($table)){
							echo $table[0]['ord_quantity'];
						}
						else{
							echo "0";
						}
					?> de Carne</span>
					<button type="button" class="button_minus" onClick="res_carne();" ></button>
				</div>
				<div class="product">
					<h2>Hoja</h2>
					<button type="button" class="button_plus" onClick="add_hoja();" ></button>
					<span class="count" name="hoja" id="hoja">
					<?php
						$table = $interface::queryTable("select * from orders where user_id='".$_SESSION['user_id']."' and prod_id=3 and ord_date='".date("Y-m-d")."'");
						if(0 < sizeof($table)){
							echo $table[0]['ord_quantity'];
						}
						else{
							echo "0";
						}
					?> de Hoja</span>
					<button type="button" class="button_minus" onClick="res_hoja();" ></button>
				</div>
				<div id="clear">
				</div>
			</div>
			<div id="message_div" class="trans">
				<button type="button" name = "Save" id="Save" onClick="saveOrder(<?php echo $_SESSION['user_id'].",'".$_SESSION['user_pass']."'"; ?>);" >Save Order</button>
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

