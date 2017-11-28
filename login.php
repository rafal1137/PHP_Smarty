<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once './config.php';
require_once './database/MySQL_class.php';
 
if (isset($_POST['login'])) {
    //make here check if right then log in
    //SELECT id, password, username FROM users WHERE username = 'Jurka' AND password = MD5(123456);
    $login = MySQL_class::getInstance();
    $login->setDatabase($db);
   
    if ($login->checkLogin($_POST['username'], $_POST['password'])) {
        $sm->assign('message', 'Logged in');
        $sm->assign('name', $_POST['username']);
        header('Location: index.php');
    } else {
        $sm->assign('message', 'Loging in failed!');
    }
}
 
$sm->display('login.tpl');