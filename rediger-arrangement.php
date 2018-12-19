<?php
include'session.php';
require 'db/db.php';
session_start();

if(isset($_POST["yklf_titel"]) && !empty($_POST["yklf_titel"])) {
    $yklf_id = $_POST["yklf_id"];
    $yklf_titel = $_POST["yklf_titel"];
    $yklf_dagtekst = $_POST["yklf_dagtekst"];
    $yklf_dagtal = $_POST["yklf_dagtal"];
    $yklf_maaned = $_POST["yklf_maaned"];
    $yklf_aar = $_POST["yklf_aar"];
    $yklf_tidspunkt = $_POST["yklf_tidspunkt"];
    $yklf_kortbeskrivelse = $_POST["yklf_kortbeskrivelse"];
    $yklf_langbeskrivelse = $_POST["yklf_langbeskrivelse"];
//    $yklf_thumbnail = $_POST["Filename"];

    $update = mysqli_query($db, "UPDATE arrangementer SET yklf_titel = '$yklf_titel', yklf_dagtekst = '$yklf_dagtekst', yklf_dagtal = '$yklf_dagtal', yklf_maaned = '$yklf_maaned', yklf_aar = '$yklf_aar', yklf_tidspunkt = '$yklf_tidspunkt', yklf_kortbeskrivelse = '$yklf_kortbeskrivelse', yklf_langbeskrivelse = '$yklf_langbeskrivelse' WHERE yklf_id = '$yklf_id'");


    if ($update) {
        ?>

        <script>
            alert("Ændringerne er blevet gemt");
            document.location = 'admin-arrangementer.php';
        </script>

        <?php
        exit;
    } else {
        echo mysqli_error($db);
    }
}

$id = $_GET["id"];
$arrangementQuery = mysqli_query($db, "SELECT * FROM arrangementer WHERE yklf_id = $id");
$arrangement = mysqli_fetch_assoc($arrangementQuery);

?>

<html>

<head>
    <title>Opret arrangement</title>

    <!-- Sikrer man kan benytte CSS ved at tilkoble en CSS fil -->
    <link href="scss/finalStyle.css" rel="stylesheet" type="text/css">

    <!-- Sikrer den vises korrekt på mobil, tablet mv. ved at tage ift. skærmstørrelse -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

<main>
    <h1>Rediger arrangement</h1>
    <h2><a href = "logud.php">Sign Out</a></h2>
    <h2><a href = "admin-arrangementer.php">Annuller</a></h2>

    <section class="opret-arrangement">
        <form id="opret-arrangement" method ="post" action="rediger-arrangement.php" enctype="multipart/form-data">
            <label for="title">Titel</label>
            <input class="" type="text" name="yklf_titel" id="titel" placeholder="" value="<?php echo $arrangement["yklf_titel"]; ?>">

            <label for="dagtekst">Ugedag</label>
            <input class="" type="text" name="yklf_dagtekst" id="dagtekst" placeholder="" value="<?php echo $arrangement["yklf_dagtekst"]; ?>">

            <label for="dagtal">d.</label>
            <input class="" type="text" name="yklf_dagtal" id="dagtal" placeholder="" value="<?php echo $arrangement["yklf_dagtal"]; ?>">

            <label for="maaned">Måned</label>
            <input class="" type="text" name="yklf_maaned" id="maaned" placeholder="" value="<?php echo $arrangement["yklf_maaned"]; ?>">

            <label for="aar">År</label>
            <input class="" type="text" name="yklf_aar" id="aar" placeholder="" value="<?php echo $arrangement["yklf_aar"]; ?>">

            <label for="tidspunkt">Tidspunkt</label>
            <input class="" type="text" name="yklf_tidspunkt" id="tidspunkt" placeholder="" value="<?php echo $arrangement["yklf_tidspunkt"]; ?>">

            <label for="kortbeskrivelse">Kort beskrivelse</label>
            <input class="" type="text" name="yklf_kortbeskrivelse" id="kortbeskrivelse" placeholder="" value="<?php echo $arrangement["yklf_kortbeskrivelse"]; ?>">

            <label for="langbeskrivelse">Lang beskrivelse</label>
            <input class="" type="text" name="yklf_langbeskrivelse" id="langbeskrivelse" placeholder="" value="<?php echo $arrangement["yklf_langbeskrivelse"]; ?>">

            <input type="hidden" name="yklf_id" value="<?php echo $arrangement["yklf_id"]; ?>">
            <button type="submit" class="">Gem ændringer</button>

        </form>
    </section>
</main>

</body>

</html>