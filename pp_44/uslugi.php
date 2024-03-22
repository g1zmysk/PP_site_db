<?php
require_once 'connect.php';
session_start();
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
                <a href="index.php">На главную</a>
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
    <div class="goods">
            <div class="zag">
                <h3>Услуги компании</h3>
            </div>
            <div class="exit">
                <?php
                $sql = mysqli_query($connect, "SELECT * FROM `uslugi`");
                while ($result = mysqli_fetch_array($sql)) {
                    echo "<div class='good'><div class='good_img'><img src='img/{$result['foto']}'></div> <br> <div class='info'><b><p class='name'>{$result['name']}</p></b> <br> 
                    <b>Описание:</b><br>{$result['opis']} <br> <p class='price'>Цена: От {$result['minprice']} до {$result['maxprice']} рублей</p><a href='usluga.php?id={$result['id_u']}'>Подробнее</a></div></div>";
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
                <a href="index.php">На главную</a>
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