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
 @created_at: 2021-02-20
 @last_update: 2021-02-20
 @file_type: PHP
*/
require_once('functions.php');
//check language
verifyLocation();

if(isset($_GET['error']) && !is_null($_GET['error']) &&is_numeric($_GET['error'])){
    
    $set_error = true;
    $e = $_GET['error'];
    
    if($_SERVER["SCRIPT_NAME"] == '/.hop/login.php'){
        switch($e){
            case 1:
                $error_show = _ERROR_1_DO_LOGIN;
                break;
            case 2:
                $error_show = _ERROR_2_DO_LOGIN;
                break;
            case 3:
                $error_show = _ERROR_3_DO_LOGIN;
                break;
            case 4:
                $error_show = _ERROR_4_DO_LOGIN;
                break;
            case 5:
                $error_show = _ERROR_5_DO_LOGIN;
                break;
            case 6:
                $error_show = _ERROR_6_DO_LOGIN;
                break;
            default:
                $error_show = "<script>window.location.href='"._MAIN_SEMTEX_URL._HOP_SCRIPT_URL."login.php?location=".$_COOKIE["openpanel_hop_location"]."';</script>";
                break;
        }
    }
}