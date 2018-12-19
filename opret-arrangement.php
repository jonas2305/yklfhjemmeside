<?php

require "db/db.php";

$fileExistsFlag = 0;
$fileName = $_FILES['Filename']['name'];
$link = $db;
$id = 2;

    $target = "images/arrangementer/";
    $fileTarget = $target.$fileName;
    $tempFileName = $_FILES["Filename"]["tmp_name"];
    $fileDescription = $_POST['Description'];
    $result = move_uploaded_file($tempFileName,$fileTarget);

include'session.php';
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
$yklf_thumbnail = $_POST["Filename"];

$insert = mysqli_query($db, "INSERT INTO arrangementer (yklf_titel, yklf_dagtekst, yklf_dagtal, yklf_maaned, yklf_aar, yklf_tidspunkt, yklf_kortbeskrivelse, yklf_langbeskrivelse, yklf_thumbnail)
VALUES('$yklf_titel', '$yklf_dagtekst', '$yklf_dagtal', '$yklf_maaned', '$yklf_aar', '$yklf_tidspunkt', '$yklf_kortbeskrivelse', '$yklf_langbeskrivelse', '$fileTarget')");


if ($insert) {
?>

<script>
    alert("Arrangementet er oprettet");
    document.location = 'admin-arrangementer.php';
</script>

<?php
exit;
} else {
    echo mysqli_error($db);
}
}

$arrangementQuery = mysqli_query($db, "SELECT * FROM arrangementer ORDER BY yklf_id ASC");

?>

<html>

<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="description" content="Beskrivelse">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="scss/finalStyle.css">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Hind+Siliguri:400,600,700&amp;subset=latin-ext" rel="stylesheet">

    <!--Meta data til sociale medier-->
    <meta property="og:title" content="Rundvisning på vores campingplads - Ore Strand Camping" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://www.orestrandcamping.dk/rundvisning" />
    <meta property="og:image" content="http://www.orestrandcamping.dk/images/stemningsbilleder/OreStrandCampingWEB-9242.jpg" />
    <meta property="og:description" content="Rundvisning på vores campingplads, muligheder for overnatninger og aktiviteter til din campingferie" />
    <meta property="og:locale" content="da_dk" />

    <!--FAVICON-->
    <link rel="icon" type="image/x-icon" href="http://bondejonas.dk/orestrandcamping/logoFavican32x32-02.png" />

    <!--SØGEMASKINER MÅ IKKE INDEKSERE SIDEN-->
    <meta name="robots" content="noindex,nofollow">
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
            <h1>Opret arrangement</h1>
            <form id="opret-arrangement" method ="post" action="opret-arrangement.php" enctype="multipart/form-data">

                    <label for="titel">Hvad hedder arrangementet?</label>
                    <input class="" type="text" name="yklf_titel" id="titel" placeholder="" value="">

                    <label>Hvornår afholdes arrangementet?</label>
                    <label for="dagtekst">Ugedag</label>
                    <input class="" type="text" name="yklf_dagtekst" id="dagtekst" placeholder="" value="">
                    <label for="dagtal">d.</label>
                    <input class="" type="text" name="yklf_dagtal" id="dagtal" placeholder="" value="">
                    <label for="maaned">Måned</label>
                    <input class="" type="text" name="yklf_maaned" id="maaned" placeholder="" value="">
                    <label for="aar">År</label>
                    <input class="" type="text" name="yklf_aar" id="aar" placeholder="" value="">
                    <label for="tidspunkt">Tidspunkt</label>
                    <label>kl.</label>
                    <input class="" type="text" name="yklf_tidspunkt" id="tidspunkt" placeholder="" value="">

                    <label for="kortbeskrivelse">Lav en kort beskrivelse af arrangementet.</label>
                    <input class="" type="text" name="yklf_kortbeskrivelse" id="kortbeskrivelse" placeholder="" value="">

                    <label for="langbeskrivelse">Lav en længere beskrivelse af arrangementet.</label>
                    <input class="" type="text" name="yklf_langbeskrivelse" id="langbeskrivelse" placeholder="" value="">

                    <label for="Filename">Upload et billede til arrangementet.</label>
                    <input class="" type="file" name="Filename" id="thumbnail" placeholder="" value="">

                    <button type="submit" class="btnReg">Opret arrangement</button>

            </form>
        </section>
    </div>
</main>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/script.js"></script>
</body>

</html>