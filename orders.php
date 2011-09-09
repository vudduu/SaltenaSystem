<?php

class Orders{

	function update_quantity($interface, $user_id, $prod_id, $ord_quantity, $ord_date){
		$sql = "update orders set ord_quantity = ".$ord_quantity." where user_id='".$user_id."' and prod_id=".$prod_id." and ord_date='".$ord_date."'";
		$interface::queryExe($sql);
	}

	function insert($interface, $user_id, $prod_id, $act_id, $ord_quantity, $ord_date){
		$sql = "insert into  orders (user_id, prod_id, act_id, ord_quantity, ord_date) ";
		$sql.= "values ('".$user_id."',  ".$prod_id.", ".$act_id.", ".$ord_quantity.", '".$ord_date."')";
		$interface::queryExe($sql);
	}

}

?>
