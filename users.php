<?php

class Users{

	function table_users_orders($interface){
		$date = date("Y-m-d");
		$sql = "select d.user_name, a.ord_quantity, b.ord_quantity, c.ord_quantity ";
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

}

?>
