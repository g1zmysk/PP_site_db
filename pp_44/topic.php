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
        <div class="topic">
            <?php
            $id = $_GET['id'];
                $sql = mysqli_query($connect, "SELECT * FROM `topics` WHERE id_topic = '$id'");
                while($result = mysqli_fetch_array($sql)) {
                    echo "<div class='topic'><p class='name'>{$result['name_topic']}</p> <br> <p class='name2'>{$result['quest']}</p><br> <a href='add_answer.php?id={$result['id_topic']}'>Ответить</a> <br><br><br></div>";
                }
                $sql2 = mysqli_query($connect, "SELECT * FROM `answers` JOIN `users` ON answers.id_user = users.id_user WHERE answers.id_topic = '$id'");
                echo "<p class='name'>Ответы: </p><br>";
                while($result = mysqli_fetch_array($sql2)) {
                    echo "<div class='topic2'> <br>
                    {$result['name']}:  {$result['answer']}</div>";
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
