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
 @last_update: 2021-02-17
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
		}else if($_GET['location'] == 'es-ES' || $_GET['location'] == 'es-es'){
			setLanguageCookie("es-ES");
			include('languages/es_ES.language.php');
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

function getBetween($string, $start = "", $end = ""){
    if (strpos($string, $start)) { // required if $start not exist in $string
        $startCharCount = strpos($string, $start) + strlen($start);
        $firstSubStr = substr($string, $startCharCount, strlen($string));
        $endCharCount = strpos($firstSubStr, $end);
        if ($endCharCount == 0) {
            $endCharCount = strlen($firstSubStr);
        }
        return substr($firstSubStr, 0, $endCharCount);
    } else {
        return '';
    }
}

function return_server_data(){
	$server_data = file('/proc/cpuinfo');
	$data_lines = count($server_data);
	//Get Processors info
	foreach ($server_data as $lineNumber => $line) {
		if (strpos($line, 'processor') !== false) {
			$line_processor .= $line.', ';
		}
	}
	$processors_ext = explode(',', trim(rtrim(str_replace(' ', '', str_replace('processor	: ', '', $line_processor)), ", ")));
	$cnt_proc = count($processors_ext);
	//------
	//Get Vendor ID
	foreach ($server_data as $lineNumber => $line) {
		if (strpos($line, 'vendor_id') !== false) {
			$line_vendor .= $line.', ';
		}
	}
	$vendorid_ext = explode(',', trim(rtrim(str_replace(' ', '', str_replace('vendor_id	: ', '', $line_vendor)), ", ")));
	$cnt_vendid = count($vendorid_ext);
	//------
	//Get Model Name
	foreach ($server_data as $lineNumber => $line) {
		if (strpos($line, 'model name') !== false) {
			$line_model .= $line.', ';
		}
	}
	$model_name_ext = explode(',', trim(rtrim(str_replace(' ', '', str_replace('model name	: ', '', $line_model)), ", ")));
	$cnt_modelName = count($model_name_ext);
	//------
	//Get CPU MHZ
	foreach ($server_data as $lineNumber => $line) {
		if (strpos($line, 'cpu MHz') !== false) {
			$line_mhzcpu .= $line.', ';
		}
	}
	$mhzcpu_ext = explode(',', trim(rtrim(str_replace(' ', '', str_replace('cpuMHz :', '', $line_mhzcpu)), ", ")));
	$cnt_mhzcpu = count($mhzcpu_ext);
	//------
	//Get CPU Cache
	foreach ($server_data as $lineNumber => $line) {
		if (strpos($line, 'cache size') !== false) {
			$line_cachecpu .= $line.', ';
		}
	}
	$cachecpu_ext = explode(',', trim(rtrim(str_replace(' ', '', str_replace('cache size	: ', '', $line_cachecpu)), ", ")));
	$cnt_cachecpu = count($cachecpu_ext);
	//------
	//Get Core ID
	foreach ($server_data as $lineNumber => $line) {
		if (strpos($line, 'core id') !== false) {
			$line_coreid .= $line.', ';
		}
	}
	$coreid_ext = explode(',', trim(rtrim(str_replace(' ', '', str_replace('core id	:', '', $line_coreid)), ", ")));
	$cnt_cachecpu = count($coreid_ext);
	//------
	//Get Total Cores
	foreach ($server_data as $lineNumber => $line) {
		if (strpos($line, 'cpu cores') !== false) {
			$line_totalCores.= $line.', ';
		}
	}
	$totalCores_ext = explode(',', trim(rtrim(str_replace(' ', '', str_replace('cpu cores	:', '', $line_totalCores)), ", ")));
	$cnt_totalCores = count($totalCores_ext);
	//------
	//show info 
	echo '<hr>';
	for($i = 0; $i < $cnt_proc; $i++){
		echo '<strong>[*] Processor Nº:</strong> '.$processors_ext[$i].'<br>';
		echo '<strong>|_<i style="font-size: 13px; font-weight: 600;">[-]|--- </i> Core ID:</strong> '.substr($coreid_ext[$i], 9).' / <i style="font-size: 13px; font-weight: 600;">'.$totalCores_ext[$i].'</i><br>';
		echo '<strong>|_<i style="font-size: 13px; font-weight: 600;">[-][-]|--- </i> Vendor ID:</strong> '.$vendorid_ext[$i].'<br>';
		echo '<strong>|_<i style="font-size: 13px; font-weight: 600;">[-][-]|--- </i> Model Name:</strong> '.$model_name_ext[$i].'<br>';
		echo '<strong>|_<i style="font-size: 13px; font-weight: 600;">[-][-]|--- </i> CPU MHz:</strong> '.substr($mhzcpu_ext[$i], 9, -1).'<i style="font-size: 13px; font-weight: 600;">MHz</i><br>';
		echo '<strong>|_<i style="font-size: 13px; font-weight: 600;">[-][-]|--- </i> CPU Cache:</strong> '.$cachecpu_ext[$i].'<br>';
		echo '<hr>';
	}
}

function return_server_memory_data(){
	$memory_data = file('/proc/meminfo');
	$data_lines = count($memory_data);
	echo '<hr>';
	echo '<strong>[*] '._SERVER_LABEL_INFO_MEMORY_TOTAL.'</strong>'.substr($memory_data[0], 10).'<br>';
	echo '<strong>[*] '._SERVER_LABEL_INFO_MEMORY_FREE.' </strong>'.substr($memory_data[1], 10).'<br>';
	echo '<strong>[*] '._SERVER_LABEL_INFO_MEMORY_AVAILABLE.' </strong>'.substr($memory_data[2], 13);
	//------
}

function return_disk_data(){
	echo '<pre>';
	echo '<hr>';
	echo $disk_data = shell_exec('df -h');
	echo '</pre>';
}

function give_error($error_code, $redirect_url){
	header('Content-Type: application/json');
	$response["error"] = true;
	$response["code"] = $error_code;
	$response["url"] = $redirect_url;
	echo json_encode($response, JSON_PRETTY_PRINT, true);
	http_response_code(200);
}

function give_success($redirect_url){
	header('Content-Type: application/json');
	$response["error"] = false;
	$response["code"] = "000";
	$response["url"] = $redirect_url;
	echo json_encode($response, JSON_PRETTY_PRINT, true);
	http_response_code(200);
}