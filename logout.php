<?php
session_start();
?>
<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	<title>S-System</title>
	<link href="inc/css/reset.css" rel="stylesheet" type="text/css">
	<link href="inc/css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="top_container" class="trans">
		<div id="top_center">
			<h1>Closed Session</h1>
		</div>
	</div>
</body>

<?php
$_SESSION = array();
echo "<meta http-equiv=refresh content=2;URL=index.php>";
?>

