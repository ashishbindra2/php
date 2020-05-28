<?php 
session_start();
include('db.php');
include('function.php');
    unset($_SESSION['rid']);
     unset($_SESSION['name']);
        session_destroy();
  
     header('location:index.php');
?>