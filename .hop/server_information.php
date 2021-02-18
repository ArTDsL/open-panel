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
 @created_at: 2021-02-15
 @last_update: 2021-02-17
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
			<?php echo _SERVER_INFORMATION_TITLE; ?>
		</div>
		<div class="page-description-hop-openpanel">
			<?php echo _SERVER_INFORMATION_DESC; ?>
		</div>
		<div class="page-content-hop-openpanel">
			<div class="server-info-hop-openpanel">
				<div class="title-info-hop-openpanel"><?php echo _SERVER_SYSTEM_INFO; ?></div>
				<hr>
				<?php
					//return server data on HOP Panel
					echo PHP_OS.' - '.php_uname();
				?>
			</div>
			<div class="server-info-hop-openpanel">
				<div class="title-info-hop-openpanel"><?php echo _SERVER_PROCESSOR_INFO; ?></div>
				<?php
					//return server data on HOP Panel
					return_server_data();
				?>
			</div>
			<div class="server-info-hop-openpanel">
				<div class="title-info-hop-openpanel"><?php echo _SERVER_MEMORY_INFO; ?></div>
				<?php
					//return memory data on HOP Panel
					return_server_memory_data();
				?>
			</div>
			<div class="server-info-hop-openpanel">
				<div class="title-info-hop-openpanel"><?php echo _SERVER_DISK_INFO; ?></div>
				<?php
					//return disk data on HOP Panel
					return_disk_data();
				?>
			</div>
		</div>
	</body>
</html>