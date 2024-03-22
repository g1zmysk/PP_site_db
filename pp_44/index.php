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
    <div class="form">
        <div class="zag">
            <h3>Поможем выбрать котёл под ваши услуги</h3>
            <h4>Для этого заполните форму</h4>
        </div>
        <div class="flex">
            <div class="form-flex">
                <p>Оставьте номер телефона и наши специалисты свяжутся с вами</p>
                <form action="" method="POST">
                    <input type="text" name="phone" placeholder="Номер телефона">
                    <div class="flex">
                        <input type="checkbox" name="check">
                        <p>Я принимаю условия пользовательского соглашения</p>
                    </div>
                    <input type="submit">
                </form>
                <?php
                if(isset($_POST['phone']) && isset($_POST['check'])) {
                    if (!isset($_SESSION['user_id'])) {
                        header("Location: vxod.php"); 
                        exit();
                    }
                    $phone = $_POST['phone'];
                    $id = $_SESSION['user_id'];
                    $sql = mysqli_query($connect, "INSERT INTO `zakaz` (`phone`,`id_user`) VALUES ('$phone','$id')");
                    echo "Форма успешно отправлена";
                }
                ?>
            </div>
            <div class="img">
                <img src="img/form.png" alt="">
            </div>
        </div>
    </div>
    <div class="reklama">
        <p>Котлы АО «Ирбис» отличаются высоким качеством и доступностью в цене.</p>
        <p>Среди отопительного оборудования, производимого заводом:</p>
        <ul>
            <li>напольные газовые котлы «Хопер» мощностью от 25 до 100 кВт;</li>
            <li>котлы «Барс», расширившие мощностную линейку отопительных котлоагрегатов АО «Ирбис» до 500 кВт;</li>
            <li>жаротрубные котлы «Вятич» от 500 кВт до 1,5 МВт;</li>
            <li>конденсационные котлы ZORD (120-1000 кВт);</li>
            <li>широкий модельный ряд уличных котлов и котлов наружного размещения Ирбис НК до 1 МВт;</li>
        </ul>
    </div>
    <div class="reklama2">
        <div class="reklama-flex">
            <div class="block">
                <h3>88 лет</h3>
                <p>на рынке отопительного оборудования</p>
            </div>
            <div class="block">
                <h3>25-1500 кВт</h3>
                <p>мощностной ряд производимых котлов</p>
            </div>
            <div class="block">
                <h3>более 100</h3>
                <p>изготовленных котлов наружного размещения</p>
            </div>
            <div class="block">
                <h3>3000 км</h3>
                <p>радиус поставок котельного оборудования АО «Ирбис»</p>
            </div>
        </div>
    </div>
    <div class="goods">
        <div class="zag">
            <h3>Лучшие товары</h3>
        </div>
        <div class="goods-flex">
            <?php
            $sql = mysqli_query($connect, "SELECT * FROM `goods` ORDER BY `price` DESC LIMIT 3");
            while($result = mysqli_fetch_array($sql)) {
                echo "<div class='good'><div class='good_img'><img src='img/{$result['foto']}'></div> <br> <div class='info'><b><p class='name'>{$result['name']}</p></b> <br> 
                <b>Описание:</b><br>{$result['opis']} <br> <p class='price'>Цена: {$result['price']} рублей</p><a href='good.php?id={$result['id']}'>Подробнее</a></div></div>";
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