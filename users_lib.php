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

	function money_set($interface, $id, $mount) {
		if(0 >= sizeof($interface::queryTable("select money from users_money where user_id = '".$id."' and um_date = '".date("Y-m-d")."'"))){
			$sql = "insert into users_money (user_id ,um_date ,money) values ('".$id."',  '".date("Y-m-d")."',  '".$mount."')";
		}
		else{
			$sql = "update users_money set money = ".$mount." where user_id = '".$id."' and um_date = '".date("Y-m-d")."'";
		}
		$interface::queryExe($sql);
	}

	function money_add($interface, $id, $mount) {
		$sql = "update users_money set money = money+".$mount." where user_id = '".$id."' and um_date = '".date("Y-m-d")."'";
		$interface::queryExe($sql);
	}

	function money_get($interface, $id){
		$sql = "select money from users_money where user_id = '".$id."' and um_date = '".date("Y-m-d")."'";
		$table = $interface::query($sql);
		return $table[0];
	}

	function mark_in_out($interface, $id, $in_or_out){
		$date = date("Y-m-d");
		$time = date("H:i:s");
		$sql = "insert into times_in_out (user_id, time_mark, time_date, in_or_out) ";
		$sql.= "values ('".$id."', '".$time."', '".$date."', ".$in_or_out.")";
		$interface::queryExe($sql);
	}
	
	function user_in_out($interface, $id){
		$date = date("Y-m-d");
		$sql = "select a.user_name, b.time_mark, b.in_or_out ";
		$sql.= "from users a, times_in_out b ";
		$sql.= "where a.user_id = b.user_id ";
		$sql.= "and a.user_id = '".$id."' ";
		$sql.= "and b.time_date = '".$date."' ";
		$sql.= "and b.time_mark = ( ";
			$sql.= "select max(c.time_mark) ";
			$sql.= "from times_in_out c ";
			$sql.= "where c.user_id = b.user_id ";
			$sql.= "and c.time_date = '".$date."') ";
		$sql.= "order by b.time_mark desc";
		$table = $interface::queryTable($sql);
		if(sizeof($table) <= 0) $table[0][0] = "NULL";
		return $table[0];
	}

	function exist_this_id($interface, $id){
		$sql = "select * from users where user_id = ".$id;
		$table = $interface::queryTable($sql);
		if(sizeof($table) >= 1) return true;
		return false;
	}

	function list_in_out($interface){
		$date = date("Y-m-d");
		$sql = "select a.user_name, b.time_mark, b.in_or_out ";
		$sql.= "from users a, times_in_out b ";
		$sql.= "where a.user_id = b.user_id ";
		$sql.= "and b.time_date = '".$date."' ";
		$sql.= "and b.time_mark = ( ";
			$sql.= "select max(c.time_mark) ";
			$sql.= "from times_in_out c ";
			$sql.= "where c.user_id = b.user_id ";
			$sql.= "and c.time_date = '".$date."') ";
		$sql.= "order by b.time_mark desc";
		return $interface::queryTable($sql);
	}

};

?>
