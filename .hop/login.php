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
//check language
verifyLocation();
?>
<html>
	<head>
		<!-- META -->
		<meta charset="utf-8">

		<title><?php echo _TITLE; ?></title>

		<!-- CSS -->
		<link rel="stylesheet" href="style.css">

		<!-- ICONS -->
		
	</head>
	<body>
		<div id="login-hop-openpanel">
			<div class="logo-openpanel"></div>
			<div class="sublogo-hop-openpanel"></div>
			<form class="form-login-hop-openpanel" action="login.php" method="POST">
				<div class="form-control-openpanel">
					<input type="text" class="text-field-openpanel" name="username" id="username" placeholder="<?php echo _USERNAME_PLACEHOLDER; ?>" required>
				</div>
				<div class="form-control-openpanel">
					<input type="password" class="password-field-openpanel" name="password" id="password" placeholder="<?php echo _PASSWORD_PLACEHOLDER; ?>" required>
				</div>
				<div class="form-control-openpanel">
					<input type="submit" class="btn-login-openpanel" value="<?php echo _LOGIN_BUTTON; ?>">
				</div>
			</form>
		</div>
		<footer>
			&copy; <?php echo date('Y').'. '. _COPYRIGHT_NOTICE; ?>
			<br>
			<div class="flags-hop-openpanel">
				<a href="?location=pt-BR" class="flag-hop-openpanel"><img src="flags/br.png" width="22"></a>
				<a href="?location=en-US"><img src="flags/us.png" width="22"></a>
			</div>
		</footer>
	</body>
</html>