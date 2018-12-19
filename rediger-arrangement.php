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

<header>
    <!--Logo til Mobil-->
    <nav class="logo-mobil">
        <figure>
            <a href="index.php" class="logo">
                <img src="images/logo/logo-02.png" alt="Netværk for yngre kræftramte logo">
            </a>
        </figure>
    </nav>
    <!--Logo til WEB-->
    <nav class="logo-web">
        <figure>
            <a href="index.php" class="logo">
                <img src="images/logo/logo-02.png" alt="Netværk for yngre kræftramte logo">
            </a>
        </figure>
    </nav>
    <!--Selve navigationen-->
    <nav class="topnav" id="myTopnav">
        <!--Menuknap til burgermenu-->
        <div class="menuknap">
            <i id="menuOpen" class="fas fa-bars"></i>
        </div>
        <!--Menu-->
        <div class="topnavContentWrapper">
            <!--Lukkeknap til burgermenu-->
            <i class="fas fa-times burgermenuClose"></i>
            <!--Menupunkter-->
            <div class="topnavContent">
                <a class="menuActive" href="index.php">Forside</a>
                <a href="arrangementer.php">Arrangementer</a>
                <a href="hvemervi.php">Hvem er vi?</a>
                <a href="sponsorer.php">Sponsorer</a>
                <a href="kontakt.php">Kontakt</a>
            </div>
        </div>
    </nav>
</header>

<main>
    <div class="log-ud">
        <a href = "admin-arrangementer.php">
            <button class="btnReg log-ud-btn">Annuller</button>
        </a>
        <a href = "logud.php">
            <button class="btnReg log-ud-btn">Log ud</button>
        </a>
    </div>

    <div class="flex-wrapper-arrangement">
    <section class="opret-arrangement">
        <h1>Rediger arrangement</h1>
        <form id="opret-arrangement" method ="post" action="rediger-arrangement.php" enctype="multipart/form-data">

            <label for="titel">Hvad hedder arrangementet?</label><br>
            <input class="" type="text" name="yklf_titel" id="titel" placeholder="Overskrift" value="<?php echo $arrangement["yklf_titel"]; ?>"><br><br>

            <label>Hvornår afholdes arrangementet?</label><br>
            <div class="opret-arrangement-tidspunkt-wrapper">
                <input class="" type="text" name="yklf_dagtekst" id="dagtekst" placeholder="Ugedag" value="<?php echo $arrangement["yklf_dagtekst"]; ?>">
                <input class="" type="text" name="yklf_dagtal" id="dagtal" placeholder="Dato (DD)" value="<?php echo $arrangement["yklf_dagtal"]; ?>">
                <input class="" type="text" name="yklf_maaned" id="maaned" placeholder="Måned (MM)" value="<?php echo $arrangement["yklf_maaned"]; ?>">
                <input class="" type="text" name="yklf_aar" id="aar" placeholder="År (YYYY)" value="<?php echo $arrangement["yklf_aar"]; ?>">
                <input class="" type="text" name="yklf_tidspunkt" id="tidspunkt" placeholder="Tidspunkt (XX:XX)" value="<?php echo $arrangement["yklf_tidspunkt"]; ?>"><br><br>
            </div>

            <label for="kortbeskrivelse">Lav en kort beskrivelse af arrangementet.</label><br>
            <input class="" type="text" name="yklf_kortbeskrivelse" id="kortbeskrivelse" placeholder="Kort beskrivelse" value="<?php echo $arrangement["yklf_kortbeskrivelse"]; ?>"><br><br>

            <label for="langbeskrivelse">Lav en længere beskrivelse af arrangementet.</label><br>
            <textarea class="" name="yklf_langbeskrivelse" id="langbeskrivelse" placeholder="Lang beskrivelse" value=""><?php echo $arrangement["yklf_langbeskrivelse"]; ?></textarea><br><br>

            <input type="hidden" name="yklf_id" value="<?php echo $arrangement["yklf_id"]; ?>">
            <button type="submit" class="btnReg">Gem ændringer</button>

        </form>
    </section>
    </div>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/script.js"></script>
</body>

</html>