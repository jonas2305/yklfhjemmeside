<?php
require 'db/db.php';
session_start();

$bruger_check = $_SESSION['bruger_login'];

$ses_sql = mysqli_query($db,"select login_brugernavn from login where login_brugernavn = '$bruger_check' ");

$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$login_session = $row['brugernavn'];

if(!isset($_SESSION['bruger_login'])){
    header("location:login.php");
}
?>