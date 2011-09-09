<?php
session_start();
if(isset($_SESSION['user_id'])){
include("conection.php");
$interface = new Conection();
$interface::connect();
?>
<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	<title>S-System</title>
	<link href="inc/css/reset.css" rel="stylesheet" type="text/css">
	<link href="inc/css/style.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="inc/js/functions.js"></script>
</head>
<body>
	<div id="top_container" class="trans">
		<div id="top_left">
			<h4>Time: 9:24 am</h4>
			<h4>Balance: <?php echo $_SESSION['user_money'] ?>$</h4>
		</div>
		<div id="top_center">
			<h1>Ticon</h1>
			<h2><a href="index3.php">Saltena System</a></h2>
		</div>
		<div id="top_right">
			<h4><a href="logout.php">Logout</a></h4>
			<h4><a href="edit_user.php"><?php echo $_SESSION['user_login'] ?></a></h4>
			<?php if($_SESSION['user_admin'] == 1){ echo "<h4><a href='admin.php' >Administrator</a></h4>"; } ?>
		</div>
	</div>
	<div id="body_container" class="trans">
		<table>
			<tr><th>CodeRoad Out</th><th>CodeRoad In</th><th>Lazar Out</th><th>Lazar In</th></tr>
			<?php
			//echo "<tr><th>Name</th><th>Time</th></tr>";
			//$data = $interface::queryTable("select * from users ORDER BY user_name");
			//for($i=0; $i<sizeof($data); $i++){
			//	echo "<tr><td>".$data[$i]['user_name']."</td><td>".$data[$i]['user_time']."</td></tr>";
			//}
			?>
		</table>
	</div>
	<!-- <div id="footer_container"></div> -->
</body>
</html>
<?php
}
else{
	echo "<meta http-equiv=refresh content=0;URL=index.php>";
}
?>

