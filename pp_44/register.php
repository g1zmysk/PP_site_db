<?php
session_start();
require_once 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Регистрация</title>
</head>
<body>
    <div class="zag" id="zag_login">
        <h3>АО "Ирбис"</h3>
        <h3>Регистрация</h3>
    </div>
    <div class="form">
        <form action="" id="form_login" method="POST">
            <input type="text" name="name" placeholder="Введите имя"> <br>
            <input type="text" name="login" placeholder="Введите логин"> <br>
            <input type="text" name="email" placeholder="Введите e-mail"> <br>
            <input type="text" name="pass" placeholder="Введите пароль"> <br>
            <input type="text" name="pass2" placeholder="Повторите пароль"> <br>
            <input type="submit">
        </form>
    </div>
    <div class="links_login" id="vxod">
            <input type="button" value="Вернуться к авторизации" onclick="window.location.href='vxod.php'"> <br> <br>
            <input type="button" value="Вернуться на главную" onclick="window.location.href='index.php'">
        </div>
    <div class="register">
        <?php
            if (isset($_POST['name']) && isset($_POST['login']) && isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['pass2'])) {
                if ($_POST['pass'] == $_POST['pass2']) {
                    $name = $_POST['name'];
                    $login = $_POST['login'];
                    $email = $_POST['email'];
                    $pass = $_POST['pass'];
                    $pass2 = $_POST['pass2'];
                    $sql = mysqli_query($connect, "INSERT INTO `users` (`name`, `login`, `email`, `pass`) VALUES ('$name', '$login', '$email', md5($pass))");
                    echo 'Пользователь успешно добавлен <br>';
                }
                else {
                    echo 'Пароли не совпадают';
                }
            }
        ?>
    </div>
</body>
</html>