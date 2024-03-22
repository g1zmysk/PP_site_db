<?php
session_start();
require_once 'connect.php';
$answer = $_POST['answer'];
$id = $_GET['id'];
$sql = mysqli_query($connect, "UPDATE `quests` SET `answer` = '$answer' WHERE `id_q` = $id");
echo "Ответ успешно добавлен";
echo '<pre>';
echo '<a href="admin.php">Вернуться назад</a>';
echo '</pre>';
?>