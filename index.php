<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <script src="js/script.js"></script>
    <link rel="stylesheet" href="css/style.css"/>
    <body>
        <div>
            <?php if(isset($_SESSION['user'])){
     echo 'привет '.$_SESSION['user'].'<br/>';
            }
?>
            <button type="button" onclick="show_reg_form()">Register</button>
            <button type="button" onclick="show_log_form()">Login</button>
            <button type="button" onclick="showUsers()">All Users</button>
        </div>
        <div id="reg">
            <form>
                <input type="text" id="login" name="login" placeholder="login"/><br/>
                <input type="password" id="pass" name="password" placeholder="pass"/><br/>
                <input type="password" id="confirm" name="confirm" placeholder="pass confirm"/><br/>
                <input type="email" id="email" name="email" placeholder="email"/><br/>
                <button type="submit" onclick="register(document.getElementById('login').value, document.getElementById('pass').value, document.getElementById('confirm').value, document.getElementById('email').value)">Зарегестрироваться</button>
            </form>
        </div>
        <div id="log">
            <form>
                <input type="text" id='auth_login' name="login" placeholder="login"/><br/>
                <input type="password" id='auth_pass' name="password" placeholder="pass"/><br/>
                <button type="submit" onclick="log_in(document.getElementById('auth_login').value, document.getElementById('auth_pass').value)">Войти</button>
            </form>
        </div>
        <div id="users">
            
        </div>
        <div id="content">
        </div>
    </body>
</html>
