<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	<title>Vudduu's Saltena System</title>
	<link href="inc/css/reset.css" rel="stylesheet" type="text/css">
	<link href="inc/css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="top_container" >
	<div id="top_left">
	</div>
	<div id="top_center">
		<h1>Closed Session</h1>
	</div>
	<div id="top_right">
	</div>
</div>
<?php
$_SESSION = array();
echo "<meta http-equiv=refresh content=2;URL=index.php>";
?>

