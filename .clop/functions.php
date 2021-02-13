<?php
function verifyLocation(){
	if(!isset($_GET['location'])){
		if(!isset($_COOKIE["openpanel_clop_location"])){
			setcookie("openpanel_clop_location", "en-US", [
			    'expires' => time() + (10 * 365 * 24 * 60 * 60),
			    'path' => '/',
			    'domain' => '192.168.0.104',
			    'secure' => true,
			    'httponly' => true,
			    'samesite' => 'Strict',
			]);
			$language = $_COOKIE["openpanel_clop_location"];
			$url = $_SERVER["SERVER_NAME"];
			$request = $_SERVER["REQUEST_URI"];
			header("Location: https://".$url.$request."?location=en-US");
			exit;
		}else{
			$language = $_COOKIE["openpanel_clop_location"];
			$url = $_SERVER["SERVER_NAME"];
			$request = $_SERVER["REQUEST_URI"];
			header("Location: https://".$url.$request."?location=".$language."");
			exit;
		}
	}else{
		$language = $_GET['location'];
		if($_GET['location'] == 'pt-BR' || $_GET['location'] == 'pt-br'){
			include('languages/pt_br.language.php');
		}else if($_GET['location'] == 'en-US' || $_GET['location'] == 'en-us'){
			include('languages/en_us.language.php');
		}
	}
}