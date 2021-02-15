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
 @created_at: 2021-02-14
 @last_update: 2021-02-14
 @file_type: PHP
*/

include('functions.php');
include('_connector.db.php');

$PDOConnector = DBCONN_ROOT_MOD();

if(!isset($_POST['username']) || !isset($_POST['password'])){
	//bad request
	echo "<script>window.location.href='"._HOP_PANEL_URL."login?location=".$_COOKIE["openpanel_hop_location"]."&error=1';</script>";
	exit;
}

$re_username = strip_tags(trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING)));
$re_password = $_POST['password'];

if(!is_string($re_username)){
	//bad username
	echo "<script>window.location.href='"._HOP_PANEL_URL."login?location=".$_COOKIE["openpanel_hop_location"]."&error=2';</script>";
	exit;
}

$sqlLogin = "SELECT * FROM `principal_host_users` WHERE `username` = ?";
$stmtLogin = $PDOConnector->prepare($sqlLogin);
$stmtLogin->bindParam(1, $re_username, PDO::PARAM_STR);
if(!$stmtLogin->execute()){
	//some problem in select statement
	echo "<script>window.location.href='"._HOP_PANEL_URL."login?location=".$_COOKIE["openpanel_hop_location"]."&error=3';</script>";
	exit;
}else{
	echo $stmtLogin->rowCount();
	if($stmtLogin->rowCount() == 0){
		//user not found
		echo "<script>window.location.href='"._HOP_PANEL_URL."login?location=".$_COOKIE["openpanel_hop_location"]."&error=4';</script>";
		exit;
	}

	$res_users = $stmtLogin->fetchAll();
	foreach($res_users as $rowL){
		$userDB = $rowL['username'];
		$passDB = $rowL['password'];
	}

	if(!password_verify($re_password, $passDB)){
		//wrong password
		echo "<script>window.location.href='"._HOP_PANEL_URL."login?location=".$_COOKIE["openpanel_hop_location"]."&error=5';</script>";
		exit;
	}

	$token_generate = generateRandomString(15);
	$token = hash('sha256', $token_generate._SALT_PWD);

	$last_login_info['login_info']['device'] = $_SERVER['HTTP_USER_AGENT'];
	$last_login_info['login_info']['ip_addr'] = $_SERVER['REMOTE_ADDR'];
	$last_login_info['login_info']['ip_xforwarded'] = $_SERVER['HTTP_X_FORWARDED_FOR'];
	$last_login_info['login_info']['username'] = $userDB;
	$last_login_info['login_info']['date_time'] = date('Y-m-d H:i:s');

	$last_login_information = json_encode($last_login_info, JSON_PRETTY_PRINT);
	$last_login_info_cookie = urlencode($last_login_information);

	setcookie("openpanel_hop_token", $token, [
			    'expires' => 0,
			    'path' => '/',
			    'domain' => _SERVER_URL,
			    'secure' => true,
			    'httponly' => true,
			    'samesite' => 'Strict',
			]); //time() + (10 * 365 * 24 * 60 * 60)

	setcookie("openpanel_hop_info", $last_login_info_cookie, [
			    'expires' => 0,
			    'path' => '/',
			    'domain' => _SERVER_URL,
			    'secure' => true,
			    'httponly' => true,
			    'samesite' => 'Strict',
			]);

	$sqlMakeLogin = "UPDATE `principal_host_users` SET `token` = ?, `last_login_information` = ? WHERE `username` = ?";
	$stmtMakeLogin = $PDOConnector->prepare($sqlMakeLogin);
	$stmtMakeLogin->bindParam(1, $token, PDO::PARAM_STR);
	$stmtMakeLogin->bindParam(2, $last_login_information, PDO::PARAM_STR);
	$stmtMakeLogin->bindParam(3, $userDB, PDO::PARAM_STR);
	if(!$stmtMakeLogin->execute()){
		//some problem in select statement
		echo "<script>window.location.href='"._HOP_PANEL_URL."login?location=".$_COOKIE["openpanel_hop_location"]."&error=6';</script>";
		exit;
	}else{
		echo "<script>window.location.href='"._HOP_PANEL_URL."panel?location=".$_COOKIE["openpanel_hop_location"]."';</script>";
		exit;
	}
}