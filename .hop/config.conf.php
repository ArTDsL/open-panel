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
 @file_type: PHP CONFIGURATION
*/

//Path configurations
define("_SERVER_URL", "192.168.0.104");
define("_MAIN_URL", "https://192.168.0.104/");
define("_MAIN_SEMTEX_URL", "https://192.168.0.104");
define("_HOP_PANEL_URL", "https://192.168.0.104/.hop/");

//Main Theme
define("_MAIN_TEMPLATE_THEME", "lugnica_white");

//Theme Path
define("_HOP_THEME_URL", _HOP_PANEL_URL."templates/"._MAIN_TEMPLATE_THEME."/");

//Password Salt Config
define("_SALT_PWD", "5#NPxuFhv*8xzKsHq.9O-"."-salt-openpanel");

//MySQL *ROOT* Access
define("_MYSQL_SERVER", "localhost");
define("_MYSQL_SERVER_PORT", "3306");
define("_MYSQL_SERVER_USER", "MYSQL_USERNAME");
define("_MYSQL_SERVER_PASSWORD", "MYSQL_PASSWORD");
define("_MYSQL_SERVER_DATABASE", "openpanel_db");