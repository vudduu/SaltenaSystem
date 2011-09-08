<?php
class Conection{
	var $link;
	function connect(){
		$link = mysql_connect("localhost", "root", "");
		if (!$link)
			die('Could not connect: ' . mysql_error());
		if(!mysql_select_db("saltena_system", $link))
			die('Could not connect to DataBase: ' . mysql_error());
	}
	function query($query){
		$result = mysql_query($query) or die(mysql_error());
		return mysql_fetch_array($result);
	}
	function queryExe($query){
		mysql_query($query) or die(mysql_error());
	}
	function queryTable($query){
		$result = mysql_query($query) or die(mysql_error());
		if($row = mysql_fetch_array($result)){
			$i = 0;
			do{
				$table[$i++] = $row;
			} while($row = mysql_fetch_array($result));
		}
		return $table;
	}
	function disconnect(){
		if($link) mysql_close($link);
	}
}

class Users{

	function table_users_orders($interface){
		$date = date("Y-m-d");
		$sql = "select d.user_name, a.quantity, b.quantity, c.quantity ";
		$sql.= "from orders a, orders b, orders c, users d ";
		$sql.= "where a.ord_date = '".$date."' ";
		$sql.= "and a.prod_id = 1 ";
		$sql.= "and b.ord_date = '".$date."' ";
		$sql.= "and b.prod_id = 2 ";
		$sql.= "and c.ord_date = '".$date."' ";
		$sql.= "and c.prod_id = 3 ";
		$sql.= "and a.user_id = b.user_id ";
		$sql.= "and c.user_id = b.user_id ";
		$sql.= "and d.user_id = a.user_id";
		return $interface::queryTable($sql);
	}
};

class Orders{
	function update_quantity($interface, $user_id, $prod_id, $ord_quantity, $ord_date){
		$sql = "update orders set ord_quantity = ".$ord_quantity." where user_id='".$user_id."' and prod_id=".$prod_id." and ord_date='".$ord_date."'";
		$interface::queryExe($sql);
	}

	function insert($interface, $user_id, $prod_id, $act_id, $ord_quantity, $ord_date){
		$sql = "insert into  orders (user_id, prod_id, act_id, ord_quantity, ord_date) ";
		$sql.= "values ('".$user_id."',  ".$prod_id.", ".$act_id.", ".$ord_quantity.", '".$ord_date."')";
		echo $sql;
		$interface::queryExe($sql);
	}
}

?>
