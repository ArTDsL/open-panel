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
include('functions.php');
include('error_handler.php');
//check language
verifyLocation();
?>
<html>
	<head>
		<!-- META -->
		<meta charset="utf-8">

		<title><?php echo _TITLE; ?></title>

		<!-- CSS -->
		<link rel="stylesheet" href="<?php echo _HOP_PANEL_URL; ?>style.css">

		<!-- ICONS -->


	</head>
	<body>
		<?php if($set_error == true){?>
		<div class="error-login-hop-openpanel" id="error-window">
			<?php echo $error_show; ?>
			<div class="error-hide-login-hop-openpanel" onclick="hide_error_window();">
				<img src="icons/close_icon.png" width="22" />
			</div>
		</div>
		<?php } ?>
		<?php if(isset($_GET['logout']) == 'yes'){?>
		<div class="success-login-hop-openpanel" id="success-window">
			<?php echo _LOGOUT_MESSAGE; ?>
			<div class="success-hide-login-hop-openpanel" onclick="hide_success_window();">
				<img src="icons/close_icon.png" width="22" />
			</div>
		</div>
		<?php } ?>
		<div id="login-hop-openpanel">
			<div class="logo-openpanel"></div>
			<div class="sublogo-hop-openpanel"></div>
				<div class="form-control-openpanel">
					<input type="text" class="text-field-openpanel" name="username" id="username" placeholder="<?php echo _USERNAME_PLACEHOLDER; ?>" required>
				</div>
				<div class="form-control-openpanel">
					<input type="password" class="password-field-openpanel" name="password" id="password" placeholder="<?php echo _PASSWORD_PLACEHOLDER; ?>" required>
				</div>
				<div class="form-control-openpanel">
					<input type="button" onclick="do_login();" class="btn-login-openpanel" value="<?php echo _LOGIN_BUTTON; ?>">
				</div>
		</div>
		<footer>
			&copy; <?php echo date('Y').'. '. _COPYRIGHT_NOTICE; ?>
			<br>
			<div class="flags-hop-openpanel">
				<a href="?location=pt-BR" class="flag-hop-openpanel"><img src="flags/br.png" width="22"></a>
				<a href="?location=en-US"><img src="flags/us.png" width="22"></a>
			</div>
		</footer>
		<!-- JS -->
		<script type="text/javascript" src="login.js"></script>
	</body>
</html>