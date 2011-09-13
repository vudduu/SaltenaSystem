<?php

function header($user_login, $user_money, $user_admin){
	echo '<div id="header_container" class="trans">
		<div id="top_left">
			<h4>Time:'.date("H:i:s").'</h4>';
		if($user_money != NULL){ echo '<h4>Balance:'.$user_money.'$</h4>'; }
		echo '</div>
		<div id="top_center">
			<img class="logo" src="img/logo.png" alt="Saltena System">
			<h2><a href="index2.php">Ticon</a></h2>
		</div>
		<div id="top_right">';
			if($user_login != NULL){
				echo '<h4><a href="logout.php">Logout</a></h4>';
				echo '<h4><span id="user_id">'. $user_login .'</span></h4>';
			}
			if($user_admin == 1){ echo "<h4><a href='admin.php' >Administrator</a></h4>"; }
	echo '</div></div>';
}

