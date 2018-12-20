<?php

require "db/db.php";
include'session.php';
session_start();

$filNavn = $_FILES['Filename']['name'];
$link = $db;

$mappe = "images/arrangementer/";
$filSti = $mappe.$filNavn;
$midlertidigtFilNavn = $_FILES["Filename"]["tmp_name"];
$fileDescription = $_POST['Description'];
$resultat = move_uploaded_file($midlertidigtFilNavn,$filSti);


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

$sendTilDatabase = mysqli_query($db, "INSERT INTO arrangementer (yklf_titel, yklf_dagtekst, yklf_dagtal, yklf_maaned, yklf_aar, yklf_tidspunkt, yklf_kortbeskrivelse, yklf_langbeskrivelse, yklf_thumbnail)
VALUES('$yklf_titel', '$yklf_dagtekst', '$yklf_dagtal', '$yklf_maaned', '$yklf_aar', '$yklf_tidspunkt', '$yklf_kortbeskrivelse', '$yklf_langbeskrivelse', '$filSti')");


if ($sendTilDatabase) {
?>

<script>
    alert("Arrangementet er oprettet");
    document.location = 'admin-arrangementer-for-folk-med-cancer.php';
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
    <title>Opret nyt arrangement</title>
    <meta name="description" content="Beskrivelse">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="scss/finalStyle.css">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Hind+Siliguri:400,600,700&amp;subset=latin-ext" rel="stylesheet">

    <!--Meta data til sociale medier-->
    <meta property="og:title" content="Forening for Yngre Kræft ramte" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://www.kjproductions.dk/yklf/index.php" />
    <meta property="og:image" content="http://www.kjproductions.dk/yklf/images/logo/logo-02.png" />
    <meta property="og:description" content="Har du, eller kender du nogen med kræft / cancer? Vi er Forening for Yngre Kræft Ramte. Vi hjælper dig med at håndtere dit kræft forløb." />
    <meta property="og:locale" content="da_dk" />

    <!--FAVICON-->
    <link rel="icon" type="image/x-icon" href="http://www.kjproductions.dk/yklf/images/logo/yklf-favicon.png" />

    <!--SØGEMASKINER MÅ IKKE INDEKSERE SIDEN-->
    <meta name="robots" content="noindex,nofollow">
</head>

<body>

<!--HEADER-->
<header>
    <div class="maksBredde headerWrapper">
        <!--Logo til Mobil-->
        <nav class="logo-mobil">
            <figure>
                <a href="index.php" class="logo">
                    <img src="images/logo/forening-for-yngre-kraeft-ramte-logo.png" alt="Netværk for yngre kræftramte logo">
                </a>
            </figure>
        </nav>
        <!--Logo til WEB-->
        <nav class="logo-web">
            <figure>
                <a href="index.php" class="logo">
                    <img src="images/logo/forening-for-yngre-kraeft-ramte-logo.png" alt="Netværk for yngre kræftramte logo">
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
                    <a href="index.php">Forside</a>
                    <a href="arrangementer-for-folk-med-cancer.php">Arrangementer</a>
                    <a href="hvem-er-forening-for-yngre-kraeft-ramte.php">Hvem er vi?</a>
                    <a href="sponsorer-i-kamp-mod-cancer.php">Sponsorer</a>
                    <a href="kontakt-forening-for-yngre-kraeft-ramte.php">Kontakt</a>
                </div>
            </div>
        </nav>
    </div>

</header>

<main class="maksBredde">
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

                    <label for="titel">Hvad hedder arrangementet?</label><br>
                    <input class="" type="text" name="yklf_titel" id="titel" placeholder="Overskrift" value=""><br><br>

                    <label>Hvornår afholdes arrangementet?</label><br>
                    <div class="opret-arrangement-tidspunkt-wrapper">
                        <input class="" type="text" name="yklf_dagtekst" id="dagtekst" placeholder="Ugedag" value="">
                        <input class="" type="text" name="yklf_dagtal" id="dagtal" placeholder="Dato (DD)" value="">
                        <input class="" type="text" name="yklf_maaned" id="maaned" placeholder="Måned (MM)" value="">
                        <input class="" type="text" name="yklf_aar" id="aar" placeholder="År (YYYY)" value="">
                        <input class="" type="text" name="yklf_tidspunkt" id="tidspunkt" placeholder="Tidspunkt (XX:XX)" value=""><br><br>
                    </div>

                    <label for="kortbeskrivelse">Lav en kort beskrivelse af arrangementet.</label><br>
                    <input class="" type="text" name="yklf_kortbeskrivelse" id="kortbeskrivelse" placeholder="Kort beskrivelse" value=""><br><br>

                    <label for="langbeskrivelse">Lav en længere beskrivelse af arrangementet.</label><br>
                    <textarea class="" name="yklf_langbeskrivelse" id="langbeskrivelse" placeholder="Lang beskrivelse"></textarea><br><br>

                    <label for="Filename">Upload et billede til arrangementet.</label><br>
                    <input class="" type="file" name="Filename" id="thumbnail" placeholder="" value=""><br><br>

                    <button type="submit" class="btnReg">Opret arrangement</button>

            </form>
        </section>
    </div>
</main>


<!--FOOTER SEKTION-->
<footer>
    <div class="maksBredde">
        <div class="footerSectionLeft">
            <h3>Adresse</h3>
            <p class="pWhite">Frivillig Center Lolland<br>
                Sdr. Boulevard 82 A <br>
                4930 Maribo<br></p>
            <a href="https://goo.gl/maps/CBCQgttvir42" target="_blank">Find vej</a>
        </div>
        <div class="footerSectionMiddle">
            <h3>Kontakt</h3>
            <p class="pWhite">Kontaktperson:<br>
                Neel Back Lund <br>
                <a href="mailto:nbl@yklf.dk">nbl@yklf.dk</a> <br>
                <a href="tel:+4551512249">51 51 22 49</a> <br></p>
        </div>
        <div class="footerSectionRight">
            <h3>Følg med</h3>
            <a href="https://www.facebook.com/nyklf/?ref=br_rs" target="_blank">
                <i class="fab fa-facebook-square"></i>
            </a>
            <a href="https://www.facebook.com/nyklf/?ref=br_rs" target="_blank">
                <i class="fab fa-linkedin"></i>
            </a>
            <a href="https://www.facebook.com/nyklf/?ref=br_rs" target="_blank">
                <i class="fab fa-instagram"></i>
            </a>

        </div>
    </div>

</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/script.js"></script>
</body>

</html>