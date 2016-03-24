<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DB_Adapter
 *
 * @author Yura
 */
class DB_Adapter {
    
    private $link;
    private static $instance;
    public $limit_min;
    public $limit_max;
    private function __construct() {
        $this->link = mysqli_connect('localhost', 'admin1', 'admin', 'auth_attach');
    }

    private function __clone() {
        
    }

    private function __wakeup() {
        
    }

    public static function get_Instance() {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    public function addUser($login, $pass, $confirm, $email){
        if($pass===$confirm){
        $pass=  md5($pass);
            if($this->link){
                $query="INSERT INTO users(login, password, email) VALUES('$login', '$pass', '$email');";
                $add= mysqli_query($this->link, $query);
                if($add){
                    echo 'Регестрация прошла успешно';
                }else{
                    echo 'query not ok(';
                }
            }
        }
    }

        public function getAllUsers() {
        if ($this->link) {
            $query = "SELECT * FROM users";
            $res = mysqli_query($this->link, $query);
            if ($res) {
                $users = array();
                while ($row = mysqli_fetch_assoc($res)) {
                    array_push($users, $row);
                }
                
                return $users;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
        
    }

    public function checkUser($login, $pass) {
        $pass=  md5($pass);
        $query = "SELECT * FROM users WHERE login='$login' AND password='$pass'";
        $res = mysqli_query($this->link, $query);
        if ($res) {
            return TRUE;
        }  else {
            return FALSE;
        }
    }
    
    public function deleteUser($id){
        $query = "DELETE FROM users WHERE id=$id";
        $res = mysqli_query($this->link, $query);
        if ($res) {
            return TRUE;
        }  else {
            return FALSE;
        }
    }

}
