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
    <title>Панель администратора</title>
</head>
<body>
    <div class="section">
        <div class="zag" id="lk">
            <h3>Панель администратора</h3>
        </div>
        <div class="exit">
        <input type="button" value="Выход" onclick="window.location.href='exit.php'"> <br>
        <input type="button" value="На главную" onclick="window.location.href='index.php'"> <br>
        <input type="button" value="Журнал событий" onclick="window.location.href='journal.php'"> <br>
        </div>
        <div class="backshow">
            <div class="zag" id="lk">
                <h4>Отзывы клиентов</h4>
            </div>
            <div class="form_lk">
                <?php
                $sql = mysqli_query($connect, "SELECT * FROM `quests`");
                    while ($result = mysqli_fetch_array($sql)) {
                        echo "<div class='block'><b>Имя пользователя: </b> {$result['name']} <br> <b>Телефон: </b>{$result['phone']} <br> <b>Отзыв: </b>{$result['message']} <br> <b>Ответ: </b>{$result['answer']}
                        <form action='red.php?id={$result['id_q']}' method='POST'>
                    <input type='text' name='answer' placeholder='Добавить ответ'>
                    <input type='submit'>
                </form></div>";
                    }
                    
                ?>
            </div>
            <div class="zag" id="lk">
                <h4>Вопросы клиентов на форуме</h4>
            </div>
            <div class="form_lk">
                <?php
                $sql = mysqli_query($connect, "SELECT * FROM `topics`");
                    while ($result = mysqli_fetch_array($sql)) {
                        echo "<div class='block'><b>Название темы: </b> {$result['name_topic']} <br> <b>Вопрос: </b>{$result['quest']} <br> <a href='delete_topic.php?id={$result['id_topic']}'>Удалить</a></div>";
                    }
                    
                ?>
            </div>
        </div>
    </div>
</body>
</html>