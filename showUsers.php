<?php

include_once './library/DB_Adapter.php';
if(isset($_GET['action'])){
    if($_GET['action']==='showUsers'){
        $db = DB_Adapter::get_Instance();
        $users = $db->getAllUsers();
        $str = '<table>';
        foreach ($users as $user) {
            $str.='<tr>';
            $str.='<td>'.$user['id'].'</td>';
            $str.='<td>'.$user['login'].'</td>';
            $str.='<td>'.$user['email'].'</td>';
            $str.='<td>'."<button onclick="."deleteUser({$user['id']})>Удалить</button>";
            $str.='</tr>';
        }
        $str.='</table>';
        echo $str;
    }
}


