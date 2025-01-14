<?php 
    session_start();
    require "functions/functions.php";
    
    if (empty($_SESSION['login'])) {
      header('Location: login.php');
      exit;
    }
    
    session_unset();
    session_destroy();

    setcookie('login', '', time() - 3600);
    setcookie('level', '', time() - 3600);
    setcookie('id', '', time() - 3600);
    setcookie('key', '', time() - 3600);
    
    header('Location: index.php');