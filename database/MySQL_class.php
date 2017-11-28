<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MySQL_class
 *
 * @author User
 */
class MySQL_class {
    
    private $_db;
    static private $_instance = NULL;
    
    private function __construct(){
        
        //TODO: Create PDO here;
        
        session_start();
    }
    
    static function getInstance(){
        if(self::$_instance == NULL){
            self::$_instance = new MySQL_class();
        }
        
        return self::$_instance;
    }
    
    public function setDatabase(PDO $database){
        $this->_db = $database;
    }
    
    public function checkLogin($username, $password){
        $sql = "SELECT COUNT(*)
                FROM `users`
                WHERE (`username` = :user
                AND `password` = :pass)
                GROUP BY `username`";
        
        $smtp = $this->_db->prepare($sql);
        $smtp->bindParam(":user", $username);
        $smtp->bindParam(":pass", $password);
        $smtp->execute();
        
        $count = $smtp->fetch();
        
        if ($count[0] == 1) {
            session_regenerate_id(true);
            $_SESSION['username'] = $username;
            $_SESSION['auth'] = md5('auth');
            return true;
        } else {
            return false;
        }
    }
    
    public function logout(){
        session_destroy();
    }
    
    public function isLoggedIn(){
        if (isset($_SESSION['username']) && $_SESSION['auth'] === md5('auth')) {
            return true;
        } else {
            return false;
        }
    }
}
?>