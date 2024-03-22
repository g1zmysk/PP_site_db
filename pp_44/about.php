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
    <title>BasicBasik</title>
</head>
<body>
    <div class="header">
        <header>
            <div class="logo">
                <img src="img/02_02_21.png" alt="">
            </div>
            <div class="menu">
                <a href="index.php">На главную</a>
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
        <div class="about">
            <div class="zag">
                <h3>О нас</h3>
            </div>
            <div class="text">
                <p>Завод котельного оборудования «Ирбис» предлагает современную отопительную технику в вашем регионе. У нас вы найдете качественное оборудование, выгодные условия поставки, гарантию от производителя, а также индивидуальные скидки.</p>
            </div>
        </div>
        <div class="map">
            <div class="zag">
                <h3>Где мы находимся?</h3>
            </div>
            <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A2093339294da8970d07bd03170f04cccba5168b9b168bdd4b93445358508cd37&amp;width=500&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script>
        </div>
        <div class="time">
            <div class="zag">
                <h3>График работы завода</h3>
            </div>
            <div class="timeg">
                <p>Пн-Пт с 08:00 до 17:00</p>
            </div>
        </div>
    </div>
    <footer>
    <div class="header">
        <header>
            <div class="logo">
                <img src="img/02_02_21.png" alt="">
            </div>
            <div class="menu">
                <a href="index.php">На главную</a>
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
<script src="js/script.js"></script>
</html> 