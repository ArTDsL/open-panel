<?php
/*
 --------------------------------------------------------------------------------------------
 ---    _____  _____   _____   ______           _____   _____  ______    _____   _        ---
 ---   / ___ \ | __ \ / ___ \ |  ___ \    ---   | __ \  ___ ] |  ___ \  / ___ \ | |       ---   
 ---   ||___|| | ___/ |  ___/ | |   | |   ---   | ___/ /___ | | |   | | |  ___/ | |___    ---
 ---   \_____/ ||     \_____  |_|   |_|   ---   ||     \____| |_|   |_| \_____  |_____]   ---
 ---                                                                                      ---
 --------------------------------------------------------------------------------------------
  © Copyright. GNU-AGPL V3 (www.choosealicense.com/licenses/agpl-3.0/). All Rights Reserved.
 --------------------------------------------------------------------------------------------

 @author: Arthur "ArT_DsL" Dias dos Santos Lasso
 @created_at: 2021-02-13
 @last_update: 2021-02-13
 @file_type: PHP
*/
require('config.conf.php');

//set cookie for language
function setLanguageCookie($language){
	setcookie("openpanel_hop_location", $language, [
			    'expires' => time() + (10 * 365 * 24 * 60 * 60),
			    'path' => '/',
			    'domain' => _SERVER_URL,
			    'secure' => true,
			    'httponly' => true,
			    'samesite' => 'Strict',
			]);
}

//verify and set language 
function verifyLocation(){
	if(!isset($_GET['location'])){
		if(!isset($_COOKIE["openpanel_hop_location"])){
			setLanguageCookie("en-US");
			$language = $_COOKIE["openpanel_hop_location"];
			header("Location: "._MAIN_SEMTEX_URL.$_SERVER["SCRIPT_NAME"]."?location=en-US");
			exit;
		}else{
			$language = $_COOKIE["openpanel_hop_location"];
			header("Location: "._MAIN_SEMTEX_URL.$_SERVER["SCRIPT_NAME"]."?location=".$language);
			exit;
		}
	}else{
		if($_GET['location'] == null){
			setLanguageCookie("en-US");
			header("Location: "._MAIN_SEMTEX_URL.$_SERVER["SCRIPT_NAME"]."?location=en-US");
			exit;
		}
		$language = $_GET['location'];
		if($_GET['location'] == 'pt-BR' || $_GET['location'] == 'pt-br'){
			setLanguageCookie("pt-BR");
			include('languages/pt_br.language.php');
		}else if($_GET['location'] == 'en-US' || $_GET['location'] == 'en-us'){
			setLanguageCookie("en-US");
			include('languages/en_us.language.php');
		}else{
			setLanguageCookie("en-US");
			include('languages/en_us.language.php');
		}
	}
}
function generateRandomString($length = 10) {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}