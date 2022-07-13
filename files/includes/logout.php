<?php
    // echo '<script>alert("Kardu?")</script>';
    session_start();
    session_unset();
    session_destroy();
    // print_r($_SESSION);
    // $_SESSION['auth']='false';
    // var_dump($_SESSION['auth']);
    header('location: ../../login.php');
?>