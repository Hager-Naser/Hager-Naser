<?php 
session_start();
unset($_SESSION['user']);
if(isset($_COOKIE['information'])){
    setcookie('user','',time()-5,'/');
}
header("location:login.php");
