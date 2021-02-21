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
			<?php echo _USERS_MENU_NEW_USER; ?>
		</div>
		<div class="page-description-hop-openpanel">
			<?php echo _NEW_USER_INFORMATION_DESC; ?>
		</div>
		<div class="page-content-hop-openpanel">
			<div class="info-small-hop-openpanel">
				<div class="title-info-hop-openpanel"><?php echo _NEW_USER_TITLE_BOX; ?></div>
                <br>
				<label for="username-newuser">
                    <b><?php echo _USERNAME_PLACEHOLDER; ?>:</b>
                    <input type="text" name="username-newuser" id="username-newuser" class="input-text-openpanel" />
                </label>
                <hr>
                <label for="password-newuser">
                    <b><?php echo _PASSWORD_PLACEHOLDER; ?>:</b>
                    <input type="password" name="password-newuser" id="password-newuser" class="input-text-openpanel" />
                </label>
                <hr>
                <label for="password-retype-newuser">
                    <b><?php echo _PASSWORD_CONFIRM_PLACEHOLDER; ?>:</b>
                    <input type="password" name="password-retype-newuser" id="password-retype-newuser" class="input-text-openpanel" />
                </label>
                <hr>
                <label for="email-newuser">
                    <b><?php echo _EMAIL_PLACEHOLDER; ?>:</b>
                    <input type="email" name="email-newuser" id="email-newuser" class="input-text-openpanel" />
                </label>
			</div>
            <div class="info-small-hop-openpanel">
				<div class="title-info-hop-openpanel"><?php echo _SETTINGS_TITLE_BOX; ?></div>
                <br>
				<label for="role-newuser">
                    <b><?php echo _NEW_USER_ROLE; ?>:</b>
                    <select class="input-text-openpanel" id="role-newuser" name="role-newuser">
                        <option value="3"><?php echo _NEW_USER_ROLE_NORMAL_USER; ?></option>
                        <option value="2"><?php echo _NEW_USER_ROLE_RESELLER ?></option>
                        <option value="1"><?php echo _NEW_USER_ROLE_ADMIN ?></option>
                    </select>
                </label>
                <hr>
                <label for="theme-clop-newuser">
                    <b><?php echo _NEW_USER_CLOP_THEME; ?>:</b>
                    <select class="input-text-openpanel" id="theme-clop-newuser" name="theme-clop-newuser">
                        <option value="lugnica_white">Lugnica White</option>
                        <!-- add theme options with DB -->
                    </select>
                </label>
                <hr>
			</div>
            <button class="btn-submit-blue" type="submit">Criar</button>
		</div>
	</body>
</html>