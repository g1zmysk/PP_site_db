<?php
require_once 'connect.php';
session_start();
$id_user = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="header">
        <header>
            <div class="logo">
                <img src="img/02_02_21.png" alt="">
            </div>
            <div class="menu">
                <a href="about.php">О заводе</a>
                <a href="goods.php">Котлы</a>
                <a href="uslugi.php">Услуги</a>
                <a href="forum.php">Задать вопрос</a>
                <a href="contacts.php">Контакты</a>
                <?php
                if(isset($_SESSION['user_id'])) {
                    echo "<a href='check.php'>Профиль</a>";
                    echo "<a href='exit.php'>Выход</a>";
                }
                else {
                    echo "<a href='vxod.php'>Войти</a>";
                }
            ?>
            </div>
        </header>
    </div>
    <div class="section">
        <div class="zag">
            <h3>Личный кабинет пользователя</h3>
        </div>
        <div class="exit">
        <input type="button" value="Выход" onclick="window.location.href='exit.php'"> <br>
        <input type="button" value="На главную" onclick="window.location.href='index.php'"> <br>
        </div>
        <div class="zag">
                <h4>Мои вопросы на форуме</h4>
            </div>
        <div class="form_lk">
            <?php
            $sql = mysqli_query($connect, "SELECT * FROM `topics` WHERE `id_user` = '$id_user'");
            while ($result = mysqli_fetch_array($sql)) {
                echo "<div class='topic_lk'><p class='name'><b>Тема: </b>{$result['name_topic']}</p> <br> <p class='name2'>{$result['quest']}</p><br> <a href='topic.php?id={$result['id_topic']}'>Подробнее</a> <br></div>";
            }
            ?>
        </div>
    </div>
    <div class="section">
        <div class="zag">
            <h4>Мои заявки</h4>
        </div>
        <div class="form_lk">
            <?php
            $id = $_SESSION['user_id'];
            $sql = mysqli_query($connect, "SELECT * FROM `quests` WHERE `id_user` = $id");
                while ($result = mysqli_fetch_array($sql)) {
                    echo "<div class='quests'><b>Имя пользователя: </b> {$result['name']} <br> <b>Телефон: </b>{$result['phone']} <br> <b>Отзыв: </b>{$result['message']} <br> <b>Ответ: </b>{$result['answer']} <br> </div>"; 
                }
            ?>
        </div>
    </div>
        <footer>
        <div class="header">
        <header>
            <div class="logo">
                <img src="img/02_02_21.png" alt="">
            </div>
            <div class="menu">
                <a href="about.php">О заводе</a>
                <a href="goods.php">Котлы</a>
                <a href="uslugi.php">Услуги</a>
                <a href="forum.php">Задать вопрос</a>
                <a href="contacts.php">Контакты</a>
                <?php
                if(isset($_SESSION['user_id'])) {
                    echo "<a href='check.php'>Профиль</a>";
                    echo "<a href='exit.php'>Выход</a>";
                }
                else {
                    echo "<a href='vxod.php'>Войти</a>";
                }
            ?>
            </div>
        </header>
    </div>
        </footer>
</body>
</html>