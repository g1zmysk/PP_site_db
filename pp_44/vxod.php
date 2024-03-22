<?php
session_start();
require_once 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Вход</title>
</head>
<body>
    <div class="section" id="vxod">
        <div class="logo_vxod">
            <h3>АО "Ирбис"</h3> <br>
            <img src="img/02_02_21.png" alt="">
        </div>
        <div class="form">
            <form action="add.php" method="POST">
                <input type="text"  id="fvxod" name="login" placeholder="Введите логин"> <br>
                <input type="password"  id="fvxod" name="pass" placeholder="Введите пароль"> <br>
                <input type="submit"  id="svxod" value="Войти"> <br>
            </form>
        </div>
        <div class="links_login">
            <input type="button" value="Регистрация" onclick="window.location.href='register.php'"> <br> <br>
            <input type="button" value="Вернуться на главную" onclick="window.location.href='index.php'">
        </div>
    </div>
</body>
</html>