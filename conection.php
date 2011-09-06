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

?>
