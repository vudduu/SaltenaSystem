<?php
include("conection.php");

if($_GET['usersTable'] == 1) {
	$interface = new Conection();
	$interface::connect();
	$sql = "select d.user_name, a.quantity, b.quantity, c.quantity ";
	$sql.= "from rel_users_products a, rel_users_products b, rel_users_products c, users d ";
	$sql.= "where a.date = '".date("Y-m-d")."' ";
	$sql.= "and a.prod_id = 1 ";
	$sql.= "and b.date = '".date("Y-m-d")."' ";
	$sql.= "and b.prod_id = 2 ";
	$sql.= "and c.date = '".date("Y-m-d")."' ";
	$sql.= "and c.prod_id = 3 ";
	$sql.= "and a.user_id = b.user_id ";
	$sql.= "and c.user_id = b.user_id ";
	$sql.= "and d.user_id = a.user_id";
	$table = $interface::queryTable($sql);
	$totalPollo = 0;
	$totalCarne = 0;
	$totalHoja = 0;
	$total = 0;
	echo "<table border='1'>";
	echo "<tr><th>Name</th><th>Pollo</th><th>Carne</th><th>Hoja</th><th>Money</th></tr>";
	for($i=0; $i<sizeof($table) ;$i++){
		echo "<tr><td>" . $table[$i][0] . "</td>";
		echo "<td>" . $table[$i][1] . "</td>";
		echo "<td>" . $table[$i][2] . "</td>";
		echo "<td>" . $table[$i][3] . "</td>";
		$sum = (intval($table[$i][1])*5) + (intval($table[$i][2])*5) + (intval($table[$i][3])*5);
		echo "<td>" . $sum . "</td></tr>";
		$totalPollo += intval($table[$i][1]);
		$totalCarne += intval($table[$i][2]);
		$totalHoja += intval($table[$i][3]);
		$total += $sum;
	}
	echo "<tr>";
		echo "<td><b>Total</b></td>";
		echo "<td><b>".$totalPollo."</b></td>";
		echo "<td><b>".$totalCarne."</b></td>";
		echo "<td><b>".$totalHoja."</b></td>";
		echo "<td><b>".$total."</b></td>";
		echo "</tr>";
	echo "</table>";
	$interface::disconnect();
}
else{
	$interface = new Conection();
	$interface::connect();
	//$interface::query("select * from rel_users_products")
	//insert into rel_users_products values('eguzman', 1, 0, '2011-08-26 13:40:22')
	if(0 >= sizeof($interface::queryTable("select * from rel_users_products where user_id='".$_GET['user']."' and prod_id=1 and date='".date("Y-m-d")."'"))){
		$sql = "insert into rel_users_products values('".$_GET['user']."', 1, ".$_GET['pollo'].", '".date("Y-m-d")."')";
	}
	else{
		$sql = "update rel_users_products set quantity = ".$_GET['pollo']." where user_id='".$_GET['user']."' and prod_id=1 and date='".date("Y-m-d")."'";
	}
	$interface::queryExe($sql);

	if(0 >= sizeof($interface::queryTable("select * from rel_users_products where user_id='".$_GET['user']."' and prod_id=2 and date='".date("Y-m-d")."'"))){
		$sql = "insert into rel_users_products values('".$_GET['user']."', 2, ".$_GET['carne'].", '".date("Y-m-d")."')";
	}
	else{
		$sql = "update rel_users_products set quantity = ".$_GET['carne']." where user_id='".$_GET['user']."' and prod_id=2 and date='".date("Y-m-d")."'";
	}
	$interface::queryExe($sql);

	if(0 >= sizeof($interface::queryTable("select * from rel_users_products where user_id='".$_GET['user']."' and prod_id=3 and date='".date("Y-m-d")."'"))){
		$sql = "insert into rel_users_products values('".$_GET['user']."', 3, ".$_GET['hoja'].", '".date("Y-m-d")."')";
	}
	else{
		$sql = "update rel_users_products set quantity = ".$_GET['hoja']." where user_id='".$_GET['user']."' and prod_id=3 and date='".date("Y-m-d")."'";
	}
	$interface::queryExe($sql);
	$interface::disconnect();
}
?>

