<?php
session_start();
$id = $_SESSION['user_id'];
require_once 'connect.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Журнал событий</title>
</head>
<body>
    <div class="section">
        <div class="zag" id="lk">
            <h3>Панель администратора</h3>
        </div>
        <div class="exit">
        <input type="button" value="Выход" onclick="window.location.href='exit.php'"> <br>
        <input type="button" value="Назад" onclick="window.location.href='admin.php'"> <br>
        <input type="button" value="На главную" onclick="window.location.href='index.php'"> <br>
        </div>
        <div class="backdoor">
            <div class="zag">
                <h3>Журнал событий</h3>
            </div>
            <?php
            $sql = mysqli_query($connect, "SELECT * FROM `events`");
            while($result = mysqli_fetch_array($sql)) {
                echo "<div class='form'><b>{$result['text']}</b> <br>
                <b> Дата входа: </b>{$result['date']} <br>
                <b> Логин пользователя: </b>{$result['login']} <br> <br></div>";
            }
            ?>
        </div>
</div>
</body>
</html>