<?php
session_start();
if(isset($_SESSION['user_id'])){
	echo "<meta http-equiv=refresh content=0;URL=index2.php>";
}

$useragent=$_SERVER['HTTP_USER_AGENT'];
if(preg_match('/android.+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|e\-|e\/|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(di|rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|xda(\-|2|g)|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){
	header('Location: http://10.100.1.109/SaltenaSystem/mobile');
	echo "<meta http-equiv=refresh content=0;URL=mobile/index.php>";
}

include("conection.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<title>S-System</title>
		<link href="inc/css/reset.css" rel="stylesheet" type="text/css">
		<link href="inc/css/style.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="inc/js/functions.js"></script>
	</head>
	<body>
		<div id="top_container" class="trans">
			<div id="top_left"><h4>Time: <?php echo date("H:i:s"); ?></h4></div>
			<div id="top_center"><h1>Saltena System</h1></div>
			<div id="top_right"></div>
		</div>
		<div id="body_container" class="trans">
			<form name = "form" method = "post" action = "index.php">
				<table>
					<tr><td>Login   :</td><td><input name = "user" type = "text"></td></tr>
					<tr><td>Password:</td><td><input name = "password" type = "password"></td></tr>
					<tr><td><input type = "submit" name = "submit" value = "Submit"/></td></tr>
				</table>
			</form>
		</div>
		<?php
		if(isset($_POST['submit'])){
			$interface = new Conection();
			$interface::connect();
			$data = $interface::queryTable("select * from users where user_login = '".$_POST['user']."'");
			if(sizeof($data) <= 0){
				$data = $interface::queryTable("select * from users where user_id = '".$_POST['user']."'");
				if(strlen($data[0]['user_login']) > 0){
					echo "<b>The password is wrong.</b>";
				}
				elseif(sizeof($data) >= 1){
					$_SESSION['user_id'] = $_POST['user'];
					echo "<meta http-equiv=refresh content=0;URL=edit_user.php>";
				}
				else{
					echo "<b>The user or C.I. is wrong.</b>";
				}
			}
			elseif($_POST['password'] == null){
				echo "<b>The password is wrong</b>";
			}
			elseif($data[0]['user_pass'] != $_POST['password']) {
				echo "<b>The password is wrong</b>";
			}
			else{
				$_SESSION['user_id']	= $data[0]['user_id'];
				$_SESSION['user_login']	= $data[0]['user_login'];
				$_SESSION['user_name']	= $data[0]['user_name'];
				$_SESSION['user_time']	= $data[0]['user_time'];
				$_SESSION['user_money']	= $data[0]['user_money'];
				$_SESSION['user_admin'] = $data[0]['user_admin'];
				$_SESSION['mod_id']		= $data[0]['mod_id'];
				echo "<meta http-equiv=refresh content=0;URL=index2.php>";
			}
			$interface::disconnect();
		}
		?>
	</body>
</html>

