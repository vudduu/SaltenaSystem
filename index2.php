<?php
session_start();
if(isset($_SESSION['user_id'])){
include("conection.php");
$interface = new Conection();
$interface::connect();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	<title>Vudduu's Saltena System</title>
	<link href="inc/css/reset.css" rel="stylesheet" type="text/css">
	<link href="inc/css/style.css" rel="stylesheet" type="text/css">
</head>
<body onload="defaultjs(); setInterval('defaultjs()', 2000)" >
	<div id="top_container">
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
			<?php if($_SESSION['admin_today'] == 1){ echo "<a href='admin.php' >Administrator</a>"; } ?>
		</div>
	</div>
	<div id="body_container">
		<table>
			<tr><th>CodeRoad Out</th><th>CodeRoad In</th><th>Lazar Out</th><th>Lazar In</th></tr>
			<tr><td><span id="coderoadout"></span></td><td><span id="coderoadin"></span></td><td><span id="lazarout"></span></td><td><span id="lazarin"></span></td></tr>
			<?php
			//echo "<tr><th>Name</th><th>Time</th></tr>";
			//$data = $interface::queryTable("select * from users ORDER BY user_name");
			//for($i=0; $i<sizeof($data); $i++){
			//	echo "<tr><td>".$data[$i]['user_name']."</td><td>".$data[$i]['user_time']."</td></tr>";
			//}
			?>
		</table>
	</div>
	<div id="footer_container">
	</div>
</body>
</html>
<?php
}
else{
	echo "<h1>Please!, you are not a hacker with this!<h1>";
}
?>

