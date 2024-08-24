<?php
/**
 * @package login_failures
 * @version 1
 */
/*
Plugin Name: Login Failures
Author: neko
Version: 1
*/


function logit() {
    if(isset($_POST) and isset($_POST['log']) and isset($_POST['pwd'])) {
        if(username_exists($_POST['log']) == false or email_exists($_POST['log']) == false) {
            error_log("IP: {$_SERVER['REMOTE_ADDR']}, USER: {$_POST['log']}, PASS: {$_POST['pwd']}\n", 3, '/var/log/nginx/login_failures.log');
        }
    }
}


add_action('login_form_login', 'logit');
?>
