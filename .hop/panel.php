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
 @last_update: 2021-02-17
 @file_type: PHP
*/
include('functions.php');
//check language
verifyLocation();
?>
<html>
	<head>
		<title><?php echo _TITLE; ?></title>

		<!-- CSS -->
		<link rel="stylesheet" href="<?php echo _HOP_THEME_URL; ?>template.css">
	</head>
	<body>
		<div id="superior-menu-hop-openpanel">
			<div class="info-principal-superior-hop-openpanel">
				<?php echo PHP_OS.' - '.php_uname(); ?> - <span class="version-hop-openpanel">[OPENPanel.V0.0.1]<span> - <a href="do_logout.php" title="Logout" alt="Logout"><img class="icon-logout-hop-openpanel" src="<?php echo _HOP_PANEL_URL.'icons/logout_btn.png'; ?>" width="15" /></a>
			</div>
		</div>
		<div id="left-menu-hop-openpanel">
			<!-- Menu Item -->
			<div class="title-item-menu-hop-openpanel">
				<div class="icon-item-menu-hop-openpanel">
					<img src="<?php echo _HOP_PANEL_URL.'icons/config_icon.png'; ?>" width="22" />
				</div>
				<div class="description-title-item-hop-openpanel">
					GENERAL CONFIGURATION
				</div>
				<div class="expand-retract-icon-title-hop-openpanel">
					<img src="<?php echo _HOP_PANEL_URL.'icons/plus_icon.png'; ?>" width="19" />
				</div>
			</div>
			<!-- Sub Menu Item -->
			<div class="suboptions-item-menu-hop-openpanel" id="submenu-sv-config">
				<a class="option-suboptions-item-menu-hop-openpanel" href="server_information.php" target="content-iframe-hop-openpanel">
					Server Information
				</a>
			</div>
			<!-- End Sub Menu Item -->
			<!-- Sub Menu Item -->
			<div class="suboptions-item-menu-hop-openpanel" id="submenu-sv-config">
				<a class="option-suboptions-item-menu-hop-openpanel" href="server_monitor.php" target="content-iframe-hop-openpanel">
					Server Monitor
				</a>
			</div>
			<!-- End Sub Menu Item -->
			<!-- Sub Menu Item -->
			<div class="suboptions-item-menu-hop-openpanel" id="submenu-sv-config">
				<a class="option-suboptions-item-menu-hop-openpanel" href="#">
					Startup Configuration
				</a>
			</div>
			<!-- End Sub Menu Item -->
			<!-- End Menu Item -->
		</div>
		<div id="content-hop-openpanel">
			<iframe class="content-frame-hop-openpanel" src="server_information.php" name="content-iframe-hop-openpanel" id="content-iframe-hop-openpanel"></iframe>
		</div>
	</body>
</html>