<?php
require_once 'connect.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: vxod.php"); 
    exit();
}
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
                <a href="index.php">На главную</a>
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
    <div class="forum">
        <div class="zag">
            <h3>Задайте свой вопрос здесь</h3>
        </div>
        <div class="form">
            <form action="add_topic.php" method="POST">
                <input type="text" name="name" placeholder="Введите название темы"> <br>
                <input type="text" name="opis" placeholder="Опишите суть темы"> <br>
                <input type="submit">
            </form>
        </div>
        <div class="zag">
                <h3>Форум</h3>
            </div>
        <div class="topics">
            <?php
                $sql = mysqli_query($connect, "SELECT * FROM `topics`");
                while($result = mysqli_fetch_array($sql)) {
                    echo "<div class='topic'><p class='name'><b>Тема: </b>{$result['name_topic']}</p> <br> <p class='name2'>{$result['quest']}</p><br> <a href='topic.php?id={$result['id_topic']}'>Подробнее</a> <br></div>";
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
                <a href="index.php">На главную</a>
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
