<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: vxod.php"); 
    exit();
}
require_once 'connect.php';
$sql = mysqli_query($connect, "SELECT * FROM `uslugi`");
$row = mysqli_fetch_assoc($sql);
$name = $row['name'];
if (isset($_POST['quest'])) {
    $quest = $_POST['quest'];
    $id_user = $_SESSION['user_id'];
    $sql = mysqli_query($connect, "INSERT INTO `topics` (`name_topic`, `quest`, `id_user`) VALUES ('Услуга $name', '$quest', '$id_user')");
    echo "Тема успешно добавлена";
    echo '<pre>';
    echo '<a href="uslugi.php">Вернуться назад</a>';
    echo '</pre>';
}
else {
    echo "Введите данные";
}
header("Location: forum.php"); 
?>