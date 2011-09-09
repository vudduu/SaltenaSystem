<?php
include("conection.php");
include("orders.php");

$interface = new Conection();
$interface::connect();
$orders_interface = new Orders();

if(0 >= sizeof($interface::queryTable("select * from orders where user_id='".$_GET['user_id']."' and prod_id=1 and ord_date='".date("Y-m-d")."'"))){
	$orders_interface::insert($interface, $_GET['user_id'], 1, "NULL", $_GET['pollo'], date("Y-m-d"));
	$orders_interface::insert($interface, $_GET['user_id'], 2, "NULL", $_GET['carne'], date("Y-m-d"));
	$orders_interface::insert($interface, $_GET['user_id'], 3, "NULL", $_GET['hoja'], date("Y-m-d"));
	echo "<h2>Saved!!</h2>";
}
else{
	$orders_interface::update_quantity($interface, $_GET['user_id'], 1, $_GET['pollo'], date("Y-m-d"));
	$orders_interface::update_quantity($interface, $_GET['user_id'], 2, $_GET['carne'], date("Y-m-d"));
	$orders_interface::update_quantity($interface, $_GET['user_id'], 3, $_GET['hoja'], date("Y-m-d"));
	echo "<h2>Updated!!</h2>";
}

$interface::disconnect();
?>

