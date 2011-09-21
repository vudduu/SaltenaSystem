<?php
include("conection.php");
include("users_lib.php");

$interface = new Conection();
$interface::connect();
$users_interface = new Users();

$table = $users_interface::list_in_out($interface);
echo "<table border='1'>";
echo "<tr><th>CodeRoad In</th><th>CodeRoad Out</th></tr>";
for($i=0; $i<sizeof($table) ;$i++){
	if($table[$i]['in_or_out'] == '1'){
		echo "<tr><div><span='right'>".$table[$i][0]." ".$table[$i][1]."</span></div></tr>";
	}
	else{
		echo "<tr><div><span='left'>".$table[$i][0]." ".$table[$i][1]."</span></div></tr>";
	}
}
echo "</table>";

$interface::disconnect();
?>

