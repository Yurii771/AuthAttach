<?php
include_once './library/DB_Adapter.php';
$log_info=$_GET;
var_dump($log_info);
if(isset($log_info['login'])&&isset($log_info['pass'])){
    $auth_login=$log_info['login'];
    $auth_pass=$log_info['pass'];
    $db=  DB_Adapter::get_Instance();
    $user_isset=$db->checkUser($auth_login, $auth_pass);
    if($user_isset){
        $_SESSION['user']=$auth_login;
        echo 'привет '.$_SESSION['user'];
    }else{
        echo 'не верный логин или пароль';
    }
}else{
    echo 'error';
}

