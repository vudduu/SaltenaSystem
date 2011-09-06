<?php
session_start();
if(isset($_SESSION['user_id'])){
	include("conection.php");
	//include("header.php");
$interface = new Conection();
$interface::connect();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
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
				<h4><a href="edit_user.php"><?php echo $_SESSION['user_login'] ?></a></h4>
				<?php if($_SESSION['admin_today'] == 1){ echo "<a href='admin.php' >Administrator</a>"; } ?>
			</div>
		</div>
		<div id="body_container">
			<div class="product">
				<h2>Pollo</h2>
				<a class="button_plus" href="#" onClick="add_pollo();"></a>
				<span class="count" name="pollo" id="pollo">
				<?php
					$table = $interface::queryTable("select * from rel_users_products where user_id='".$_SESSION['user_id']."' and prod_id=1 and date='".date("Y-m-d")."'");
					if(0 < sizeof($table)){
						echo $table[0]['quantity'];
					}
					else{
						echo "0";
					}
				?> de Pollo</span>
				<a class="button_minus" href="#" onClick="res_pollo();"></a>
			</div>
			<div class="product">
				<h2>Carne</h2>
				<a class="button_plus" href="#" onClick="add_carne();"></a>
				<span class="count" name="carne" id="carne">
				<?php
					$table = $interface::queryTable("select * from rel_users_products where user_id='".$_SESSION['user_id']."' and prod_id=2 and date='".date("Y-m-d")."'");
					if(0 < sizeof($table)){
						echo $table[0]['quantity'];
					}
					else{
						echo "0";
					}
				?> de Carne</span>
				<a class="button_minus" href="#" onClick="res_carne();"></a>
			</div>
			<div class="product">
				<h2>Hoja</h2>
				<a class="button_plus" href="#" onClick="add_hoja();"></a>
				<span class="count" name="hoja" id="hoja">
				<?php
					$table = $interface::queryTable("select * from rel_users_products where user_id='".$_SESSION['user_id']."' and prod_id=3 and date='".date("Y-m-d")."'");
					if(0 < sizeof($table)){
						echo $table[0]['quantity'];
					}
					else{
						echo "0";
					}
				?> de Hoja</span>
				<a class="button_minus" href="#" onClick="res_hoja();"></a>
			</div>
		</div>
		<div id="message_div">
			<a href="#" name = "Save" id="Save" onClick="saveOrder(); showMessage('Saved!!');">Save Order</a>
			<span id="messages" ></span>
		</div>
		<div id="footer_container">
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

