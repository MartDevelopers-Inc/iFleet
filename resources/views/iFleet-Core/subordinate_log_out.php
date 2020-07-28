<?php
    session_start();
    unset($_SESSION['login_id']);
    session_destroy();

    header("Location: subordinate_login.php");
    exit;
