<?php
session_start();
function header(){
?>
	<div id='top_container' >
		<div id='top_left'>
			<h4>Time: 9:24 am</h4>
			<h4>Balance: <?php echo $_SESSION['user_money'] ?>$</h4>
		</div>
		<div id='top_center'>
			<h1>Ticon</h1>
			<h2><a href='index3.php'>Saltena System</a></h2>
		</div>
		<div id='top_right'>
			<h4><a href='logout.php'>Logout</a></h4>
			<h4><a href='edit_user.php'><?php echo $_SESSION['user_login'] ?></a></h4>
			<?php if($_SESSION['admin_today'] == 1){ echo "<a href='admin.php' >Administrator</a>"; } ?>
		</div>
	</div>
<?php
}
?>

