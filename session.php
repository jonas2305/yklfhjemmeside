<?php
require 'db/db.php';
session_start();

$user_check = $_SESSION['login_user'];

$ses_sql = mysqli_query($db,"select login_brugernavn from login where login_brugernavn = '$user_check' ");

$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$login_session = $row['username'];

if(!isset($_SESSION['login_user'])){
    header("location:login.php");
}
?>