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
                <a href="uslugi.php">Услуги</a>
                <a href="forum.php">Задать вопрос</a>
                <a href="index.php">На главную</a>
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
    <div class="info">
        <div class="zag">
            <h3>Контактная информация</h3>
        </div>
        <div class="info2">
            <p><b>Адрес производства:</b> 397160, Воронежская обл., г. Борисоглебск, ул. Советская, 32, оф. 12</p>
        </div>
        <div class="info2">
            <p><b>Телефон:</b> 8-800-511-10-44</p>
        </div>
        <div class="info2">
            <p><b>Эл. почта:</b> info@irbis-bor.ru</p>
        </div>
        <div class="timeg">
            <p><b>Режим работы завода:</b> <br>
            08:00 - 17:00 <br>
            <p class="time">(время Московское)</p> <br>
            C понедельника по пятницу</p>
        </div>
        <div class="map">
        <div class="zag">
                <h3>Где мы находимся?</h3>
            </div>
            <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A2093339294da8970d07bd03170f04cccba5168b9b168bdd4b93445358508cd37&amp;width=500&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script>
        </div>
        <div class="form" id="back">
            <div class="zag">
                <h3>Если у вас остались вопросы, заполните форму обратной связи</h3>
            </div>
            <form action="" method="POST">
                <input type="text" placeholder="Имя" name="name"> <br>
                <input type="text" placeholder="Фамилия" name="lastname"> <br>
                <input type="text" placeholder="Телефон" name="phone"> <br>
                <input type="text" placeholder="Сообщение" name="message"> <br>
                <input id="sub" type="submit" value="Отправить">
            </form>
            <?php
            require_once 'connect.php';
            if (isset($_POST['name']) && isset($_POST['lastname']) && isset($_POST['phone']) && isset($_POST['message'])) {
                $name = $_POST['name'];
                $lastname = $_POST['lastname'];
                $phone = $_POST['phone'];
                $message = $_POST['message'];
                $id = $_SESSION['user_id'];
                $sql = mysqli_query($connect, "INSERT INTO `quests` (`name`, `lastname`, `phone`, `message`,`id_user`) VALUES ('$name','$lastname','$phone', '$message','$id')");
                echo 'Форма успешно отправлена';
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
                <a href="index.php">На главную</a>
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