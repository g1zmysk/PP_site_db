<?php
    session_start();
    require_once 'connect.php';
    if (isset($_POST['login']) && isset($_POST['pass'])) {
        $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
        $pass=$_POST['pass'];
        $passmd5 = md5($pass);
        $query = "SELECT *FROM `users` WHERE `login`='{$login}' AND `pass`='{$passmd5}' LIMIT 1";
        $sql = mysqli_query($connect, $query) or die(mysqli_error());
        if (mysqli_num_rows($sql) == 1) {
            $row = mysqli_fetch_assoc($sql);
            $_SESSION['user_id'] = $row['id_user'];
            $_SESSION['user_per'] = $row['perm'];
            $_SESSION['user_name'] = $login;
            $sql = mysqli_query($connect, "INSERT INTO `events` (`text`,`login`) VALUES ('Попытка входа: удачный вход','{$_SESSION['user_name']}')");
            if ($_SESSION['user_per']=="admin"){
                echo "<script>window.location.href='admin.php'</script>";
                echo 'Привет '.$_POST['login'].', права admin';
            }
            if ($_SESSION['user_per']=="user") {
                echo "<script>window.location.href='lk.php'</script> ";
                echo 'Привет '.$_POST['login'].', права user';
            }
        }else {
            $sql = mysqli_query($connect, "INSERT INTO `events` (`text`,`login`) VALUES ('Попытка входа: неудачный вход','{$_POST['login']}')");
            die('Неверное имя пользователя или пароль');
        }
    }
?>