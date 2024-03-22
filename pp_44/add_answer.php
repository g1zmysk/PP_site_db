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
                <a href="forum.php">Задать вопрос</a>
                <a href="contacts.php">Контакты</a>
                <?php
                if(isset($_SESSION['user_id'])) {
                    echo "<a href='add.php'>Профиль</a>";
                    echo "<a href='exit.php'>Выход</a>";
                }
                else {
                    echo "<a href='vxod.php'>Войти</a>";
                }
            ?>
            </div>
        </header>
    </div>
    <div class="answer">
        <div class="zag">
            <h3>Добавить ответ</h3>
        </div>
        <div class="form">
            <form action="" method="POST">
                <input type="text" name="answer" placeholder="Введите ответ"> <br>
                <input type="submit">
            </form>
            <?php
            if (isset($_POST['answer'])) {
                $answer = $_POST['answer'];
                $id = $_GET['id'];
                $id_user = $_SESSION['user_id'];
                $sql = mysqli_query($connect, "INSERT INTO `answers` (`id_topic`, `id_user`, `answer`) VALUES ('$id','$id_user','$answer')");
                echo "Ответ успешно добавлен";
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
                    echo "<a href='add.php'>Профиль</a>";
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
