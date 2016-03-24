<?php
include_once './library/DB_Adapter.php';
if(isset($_GET['id'])){
    $db= DB_Adapter::get_Instance();
    $db->deleteUser($_GET['id']);
}