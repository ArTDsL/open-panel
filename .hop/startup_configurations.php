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
 @created_at: 2021-02-18
 @last_update: 2021-02-18
 @file_type: PHP
*/
include('functions.php');
//check language
verifyLocation();
?>
<html>
<html>
	<head>
		<title><?php echo _TITLE; ?></title>

		<!-- CSS -->
		<link rel="stylesheet" href="<?php echo _HOP_THEME_URL; ?>template.css">
	</head>
	<body>
		<div class="page-title-hop-openpanel">
			<?php echo _STARTUPCONFIG_INFORMATION_TITLE; ?>
		</div>
		<div class="page-description-hop-openpanel">
			<?php echo _STARTUPCONFIG_INFORMATION_DESC; ?>
		</div>
		<div class="page-content-hop-openpanel">
			<div class="info-hop-openpanel top-info-hop-panel">
				<div class="option-div-hop-openpanel">
					<input type="radio" value="1" name="cfg_option"> <div class="option-radio-hop-openpanel"><?php echo _SERVER_CONFIG_TYPE_NORMAL; ?></div>
				</div>
				<div class="option-div-hop-openpanel">
					<input type="radio" value="2" name="cfg_option"> <div class="option-radio-hop-openpanel"><?php echo _SERVER_CONFIG_TYPE_ADVANCED; ?></div>
				</div>
			</div>
		</div>
		<div class="page-description-hop-openpanel">
			<?php echo _STARTUPCONFIG_INFORMATION2_DESC; ?>
		</div>
	</body>
</html>