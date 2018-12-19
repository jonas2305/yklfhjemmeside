<?php
$db_host = "kjproductions.dk.mysql";
$db_user = "kjproductions_dk_yklf";
$db_password = "kasperjonasthor";
$db_database = "kjproductions_dk_yklf";

$db = mysqli_connect($db_host, $db_user, $db_password, $db_database) or die("Error - cant connect or find db");
mysqli_set_charset($db, "utf8");
?>