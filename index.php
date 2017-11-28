<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once './config.php';
require_once './database/MySQL_class.php';

$login = MySQL_class::getInstance();
 
if ($login->isLoggedIn()) {
    if ($_GET['page'] === 'logout') {
        $login->logout();
        $sm->assign('member', false);
        header('Location: login.php');
    }
    $sm->assign('auth', $_SESSION['auth']);
    $sm->assign('sid', session_id());
    $sm->assign('member', $login->isLoggedIn());
}
 
$sm->display('index.tpl');