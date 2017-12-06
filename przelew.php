<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once './config.php';
require_once './przelewy24/Przelewy24_API.php';
require_once './database/MySQL_class.php';

/*
$DB = null;

try {
        $DB = LMSDB::getInstance();
} catch (Exception $ex) {
        die("Fatal error: cannot connetct to database!\n");
}
 * 
<?php
    ob_start();
    session_start();
    include_once('przelewy24.php');
     
    $email = $_SESSION['email'];
     
    $oPrzelewy24_API = new Przelewy24_API();
     
    if (isset($_POST['p24_merchant_id']) AND isset($_POST['p24_sign'])) {
    	if ($oPrzelewy24_API->Verify($_POST) === true) {
        	// Tutaj dokonujemy aktywacji usługi, która jest opłacana
     
    		$_SESSION['pay_status'] = 'ok';
    	}
    } else {
    	// Powrotny adres URL
    	$p24_url_return = 'http://twoja-strona.com/ok.php';
     
    	// Adres dla weryfikacji płatności
    	$p24_url_status = 'http://twoja-strona.com/pay.php';
     
    	// Kwota do zapłaty musi być pomnożona razy 100.
    	// Czyli, jeżeli użytkownik ma zapłacić 499 złotych, to kwota do zapłaty
    	// to 499 * 100 (wyrażona w groszach)
    	$redirect = $oPrzelewy24_API->Pay('Tutaj wstaw kwotę do zapłaty', 'Tutaj wstaw tytuł płatności', $email, $p24_url_return, $p24_url_status);
    	Header('Location: ' . $redirect); exit;
    }
     
    ob_end_flush();
    ?>

*/

if(isset($_POST["zaplac"])) {
    
    $P24 = new Przelewy24_API();
    
    if (isset($_POST['p24_merchant_id']) AND isset($_POST['p24_sign'])) {
    	if ($P24->Verify($_POST) === true) {
        	// Tutaj dokonujemy aktywacji usługi, która jest opłacana
    		$_SESSION['pay_status'] = 'ok';
    	}
    } else {
    	// Powrotny adres URL
    	$p24_url_return = 'localhost:8080/index.php';
     
    	// Adres dla weryfikacji płatności
    	$p24_url_status = 'localhost:8080/weryfikacja.php';
     
    	// Kwota do zapłaty musi być pomnożona razy 100.
    	// Czyli, jeżeli użytkownik ma zapłacić 499 złotych, to kwota do zapłaty
    	// to 499 * 100 (wyrażona w groszach)
        if(isset($_SESSION['customerid']))
            $userid = $_SESSION['customerid'];
        $nalezeność = $DB->GetOne('SELECT value FROM cash WHERE customerid = ?', array($customerid));
        $tytul = $_POST['p24_description'];
    
    	$redirect = $$P24->Pay($nalezeność, $tytul, $email, $p24_url_return, $p24_url_status);
    	header('Location: ' . $redirect); 
        exit;
    }
}

$sm->display('przelew.tpl');