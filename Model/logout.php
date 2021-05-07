<?php
    require_once 'connect.php';
    if(isset($_POST['logout'])){
        session_destroy();
        header('location: ../View/login.php');
    }

?>