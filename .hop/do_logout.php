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

//change token
$token_generate = generateRandomString(15);
$token = hash('sha256', $token_generate._SALT_PWD);
$sqlMakeLogin = "UPDATE `principal_host_users` SET `token` = ? WHERE `token` = ?";
$stmtMakeLogin = $PDOConnector->prepare($sqlMakeLogin);
$stmtMakeLogin->bindParam(1, $token, PDO::PARAM_STR);
$stmtMakeLogin->bindParam(2, $_COOKIE["openpanel_hop_token"], PDO::PARAM_STR);
if(!$stmtMakeLogin->execute()){
	//some problem in select statement
	echo "<script>window.location.href='"._HOP_PANEL_URL."login?location=".$_COOKIE["openpanel_hop_location"]."&error=7';</script>";
	exit;
}else{
	//remove all cookies
	setcookie("openpanel_hop_token", '', [
				'expires' => time()-3600,
				'path' => '/',
				'domain' => _SERVER_URL,
			]); //time() + (10 * 365 * 24 * 60 * 60)

	setcookie("openpanel_hop_info", '', [
				'expires' => time()-3600,
				'path' => '/',
				'domain' => _SERVER_URL,
			]);
	echo "<script>window.location.href='"._HOP_PANEL_URL."login?location=".$_COOKIE["openpanel_hop_location"]."&logout=yes';</script>";
	exit;
}