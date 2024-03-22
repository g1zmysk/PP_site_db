<?php
require_once 'connect.php';
session_start();
$user_id = $_SESSION['user_id'];
$id = $_GET['id'];

$sql = mysqli_query($connect, "DELETE FROM quests WHERE id_q = $id");

if (isset($_GET['id'])) {
    echo "Отзыв успешно удален";
    echo '<pre>';
        echo '<a href="lk.php">Вернуться назад</a>';
        echo '</pre>';
} 
$connect->close();
?>