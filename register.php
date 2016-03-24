<?php
header("Content-Type: text/html; charset=utf-8");
include_once './library/DB_Adapter.php';
$user_info=$_GET;
echo $_GET['login'];
var_dump($user_info);
if(isset($user_info['login'])&&isset($user_info['pass'])&&isset($user_info['confirm'])&&isset($user_info['email'])){
    $login=$user_info['login'];
    $pass=$user_info['pass'];
    $confirm=$user_info['confirm'];
    $email=$user_info['email'];
    $db=  DB_Adapter::get_Instance();
    $db->addUser($login, $pass, $confirm, $email);
}else{
    echo 'форма не заполнена';
}

