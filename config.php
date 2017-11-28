<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

define('SMARTY', './smarty/Smarty.class.php');
define('PASSWORD_SALT', 'ThiS Is salt');
 
require_once(SMARTY);
 
$sm = new Smarty();
 
$sm->compile_dir    = 'templates_c/';
$sm->template_dir   = 'templates/';
$sm->debugging      = false;
 
$db = new PDO('mysql:host=localhost;dbname=test', 'root', '');
