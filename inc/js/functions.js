function defaultjs(){
	//obtainTicon1();
	//obtainTicon2();
	//obtainTicon3();
	//obtainTicon4();
}

/********************* PEDIDOS *********************/
function add_pollo(){
	var num = document.getElementById("pollo").innerHTML.split(" ")[0];
	document.getElementById("pollo").innerHTML = (parseInt(num) + 1).toString() + " de Pollo";
}
function res_pollo(){
	var num = document.getElementById("pollo").innerHTML.split(" ")[0];
	if(parseInt(num) - 1 >= 0){
		document.getElementById("pollo").innerHTML = (parseInt(num) - 1).toString() + " de Pollo";
	}
}
function add_carne(){
	var num = document.getElementById("carne").innerHTML.split(" ")[0];
	document.getElementById("carne").innerHTML = (parseInt(num) + 1).toString() + " de Carne";
}
function res_carne(){
	var num = document.getElementById("carne").innerHTML.split(" ")[0];
	if(parseInt(num) - 1 >= 0){
		document.getElementById("carne").innerHTML = (parseInt(num) - 1).toString() + " de Carne";
	}
}
function add_hoja(){
	var num = document.getElementById("hoja").innerHTML.split(" ")[0];
	document.getElementById("hoja").innerHTML = (parseInt(num) + 1).toString() + " de Hoja";
}
function res_hoja(){
	var num = document.getElementById("hoja").innerHTML.split(" ")[0];
	if(parseInt(num) - 1 >= 0){
		document.getElementById("hoja").innerHTML = (parseInt(num) - 1).toString() + " de Hoja";
	}
}

function saveOrder(){
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	}
	else{// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
			document.getElementById("messages").innerHTML = xmlhttp.responseText;
		}
	}
	numPollo = document.getElementById("pollo").innerHTML.split(" ")[0];
	numCarne = document.getElementById("carne").innerHTML.split(" ")[0];
	numHoja = document.getElementById("hoja").innerHTML.split(" ")[0];
	user_id = document.getElementById("user_id").innerHTML;
	xmlhttp.open("GET", "queries.php?pollo="+numPollo+"&carne="+numCarne+"&hoja="+numHoja+"&user_id="+user, true);
	xmlhttp.send();
}

function showMessage(s){
	document.getElementById("messages").innerHTML = s;
}

function showUser(){
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET", "queries.php?usersTable=1", true);
	xmlhttp.send();
}



function obtainTicon1(){
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	}
	else{// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
			document.getElementById("coderoadin").innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET", "http://10.100.1.9:8080/ticon/login/getUsersList?company=CodeRoad&status=In", true);
	xmlhttp.send();
}
function obtainTicon2(){
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	}
	else{// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
			document.getElementById("coderoadout").innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET", "http://10.100.1.9:8080/ticon/login/getUsersList?company=CodeRoad&status=Out", true);
	xmlhttp.send();
}
function obtainTicon3(){
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	}
	else{// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
			document.getElementById("lazarin").innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET", "http://10.100.1.9:8080/ticon/login/getUsersList?company=Lazar&status=In", true);
	xmlhttp.send();
}
function obtainTicon4(){
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	}
	else{// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
			document.getElementById("lazarout").innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET", "http://10.100.1.9:8080/ticon/login/getUsersList?company=Lazar&status=Out", true);
	xmlhttp.send();
}
