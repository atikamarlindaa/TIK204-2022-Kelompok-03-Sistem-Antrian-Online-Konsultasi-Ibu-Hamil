<?php
session_start();
if(!isset($_SESSION['sid']) AND !isset($_COOKIE['cid'])){
    header("location:pages/samples/login.php");
    die();
}

if(isset($_SESSION['sid'])){
    #user login menggunakan session
    $login_id = $_SESSION['sid'];
    $login_nama = $_SESSION['snama'];
    $login_level = $_SESSION['slevel'];
    $login_user= $_SESSION['suser'];

}elseif(isset($_COOKIE['cid'])){
    $login_id = $_COOKIE['cid'];
    $login_nama = $_COOKIE['cnama'];
    $login_level = $_COOKIE['clevel'];
    $login_user= $_COOKIE['cuser'];

}

?>