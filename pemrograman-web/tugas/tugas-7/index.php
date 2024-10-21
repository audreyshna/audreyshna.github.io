<?php
session_start();
if (isset($_SESSION['level'])) {
    if ($_SESSION['level'] == '1') {
        header('Location: tampil_data.php');
    } else if ($_SESSION['level'] == '2') {
        header('Location: admin.php');
    }
} else {
    header('Location: login.php');
}
?>
