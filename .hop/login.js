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
 @file_type: JS
*/
function hide_error_window(){
	document.getElementById("error-window").style.display = 'none';
}
function hide_success_window(){
	document.getElementById("success-window").style.display = 'none';
}
function do_login(){

    var username_login = document.getElementById("username").value;
    var password_login = document.getElementById("password").value;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "do_login.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.responseType = "json";
    xhr.overrideMimeType("application/json");
    
    xhr.onloadend = function(){
        var resp = xhr.response;
        location.href = resp.url;
    };
    xhr.send("username=" + username_login + "&password=" + password_login);
};