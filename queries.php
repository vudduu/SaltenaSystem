<?php
include("conection.php");

$interface = new Conection();
$interface::connect();
$orders_interface = new Orders();

if($_GET['usersTable'] == 1) {
	$table = $users_interface.table_users_orders($interface);
	$totalPollo = 0;
	$totalCarne = 0;
	$totalHoja = 0;
	$total = 0;
	echo "<table border='1'>";
	echo "<tr><th>Name</th><th>Pollo</th><th>Carne</th><th>Hoja</th><th>Money</th></tr>";
	for($i=0; $i<sizeof($table) ;$i++){
		echo "<tr><td>" . $table[$i][0] . "</td><td>" . $table[$i][1] . "</td>";
		echo "<td>" . $table[$i][2] . "</td><td>" . $table[$i][3] . "</td>";
		$sum = (intval($table[$i][1])*5) + (intval($table[$i][2])*5) + (intval($table[$i][3])*5);
		echo "<td>" . $sum . "</td></tr>";
		$totalPollo += intval($table[$i][1]);
		$totalCarne += intval($table[$i][2]);
		$totalHoja += intval($table[$i][3]);
		$total += $sum;
	}
	echo "<tr><td><b>Total</b></td>";
		echo "<td><b>".$totalPollo."</b></td><td><b>".$totalCarne."</b></td>";
		echo "<td><b>".$totalHoja."</b></td><td><b>".$total."</b></td>";
	echo "</tr></table>";
}
else{
	if(0 >= sizeof($interface::queryTable("select * from orders where user_id='".$_GET['user']."' and prod_id=1 and ord_date='".date("Y-m-d")."'"))){
		$orders_interface.insert($interface, $_GET['user_id'], 1, "NULL", $_GET['pollo'], date("Y-m-d"));
		$orders_interface.insert($interface, $_GET['user_id'], 2, "NULL", $_GET['carne'], date("Y-m-d"));
		$orders_interface.insert($interface, $_GET['user_id'], 3, "NULL", $_GET['hoja'], date("Y-m-d"));
	}
	else{
		$orders_interface.update_quantity($interface, $_GET['user_id'], 1, $_GET['pollo'], date("Y-m-d"));
		$orders_interface.update_quantity($interface, $_GET['user_id'], 2, $_GET['carne'], date("Y-m-d"));
		$orders_interface.update_quantity($interface, $_GET['user_id'], 3, $_GET['hoja'], date("Y-m-d"));
	}
}

$interface::disconnect();

