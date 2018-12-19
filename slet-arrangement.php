<?php
require "db/db.php";
include'session.php';
session_start();

$deleteId = $_GET["id"];
$arrangement = mysqli_query($db, "DELETE FROM arrangementer WHERE yklf_id = '$deleteId'");

?>

<script>
    alert("Arrangementet er nu slettet.");
    document.location = "admin-arrangementer.php";
</script>