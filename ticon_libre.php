<?php
include("conection.php");
include("users_lib.php");
$interface = new Conection();
$interface::connect();
$users_interface = new Users();

?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<title>S-System</title>
		<link href="inc/css/reset.css" rel="stylesheet" type="text/css">
		<link href="inc/css/style_new.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="inc/js/functions.js"></script>
	</head>
	<body onload="showInOuts(); setInterval('showInOuts()', 2000)" >
		<div id="container">
			<div id="header_container" class="trans">
				<div id="top_left">
				</div>
				<div id="top_center">
					<h1>Ticon</h1>
				</div>
				<div id="top_right">
					<form name = "form" method = "post" action = "ticon_libre.php">
						CI :<input name="user_id" type="text" value="" >
						<input type = "submit" name = "submit" value = "Submit" />
					</form>
					<?php if(isset($_POST['submit'])){
						if($_POST['user_id'] != ""){
							if($users_interface::exist_this_id($interface, $_POST['user_id'])){
								$res = $users_interface::user_in_out($interface, $_POST['user_id']);
								if($res[0] == "NULL" || $res['in_or_out'] == '1'){
									$users_interface::mark_in_out($interface, $_POST['user_id'], '0');
								}
								else{
									$users_interface::mark_in_out($interface, $_POST['user_id'], '1');
								}
							}
							else{
								echo "<h4>Invalid CI</h4>";
							}
						}
					}?>
				</div>
			</div>
			<div id="content_container" class="trans">
				<div id="txtHint"></div>
				<div id="clear"></div>
			</div>
			<div id="footer_container" class "trans">
			</div>
		</div>
	</body>
</html>
<?php

?>
