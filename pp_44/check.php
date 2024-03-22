<?php
session_start();
 if ($_SESSION['user_per']=="user") {
    echo "<script>window.location.href='lk.php'</script>";
}
else {
    echo "<script>window.location.href='admin.php'</script>";
}
?>