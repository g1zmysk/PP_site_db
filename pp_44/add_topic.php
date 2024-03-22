<?php
session_start();
require_once 'connect.php';
if (isset($_POST['name']) && isset($_POST['opis'])) {
    $name = $_POST['name'];
    $opis = $_POST['opis'];
    $id_user = $_SESSION['user_id'];
    $sql = mysqli_query($connect, "INSERT INTO `topics` (`name_topic`, `quest`, `id_user`) VALUES ('$name', '$opis', '$id_user')");
    echo "Тема успешно добавлена";
    echo '<pre>';
    echo '<a href="forum.php">Вернуться назад</a>';
    echo '</pre>';
}
else {
    echo "Введите данные";
}
// header("Location: forum.php"); 
?>