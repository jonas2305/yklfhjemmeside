<?php
require "db/db.php";

$arrangementQuery = mysqli_query($db, "SELECT * FROM arrangementer ORDER BY yklf_id ASC");

?>

<!DOCTYPE html>
<html lang="en">
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
    <section class="forside-slider">
        <div class="forside-slider-tekst">
            <h1>Mød ligestillede med samme bekymringer og spørgsmål. <br>
                Du er ikke alene.</h1>
            <a href="hvemervi.php">
                <button class="btnReg">Hvem er vi?</button>
            </a>
        </div>
    </section>

    <section class="blaa-bar">
        <h1>Venner i øjenhøjde</h1>
        <div class="blaa-bar-indhold">
            <p>Et netværk for yngre kræftramte i alderen 18-45 år, hvor vi  møder hinanden i øjenhøjde. Alle har oplevet sygdommen på egen krop, og ved derfor hvad det handler om.</p>
            <a href="hvemervi.php">
                <button class="btnReg">Læs mere her</button>
            </a>
        </div>
    </section>
    <section class="forside-arrangementer">
        <div class="billede">
            <img src="">
        </div>
        <div>
            <div class="billede">
                <img src="images/sidebilleder/taskeSponsor.jpg">
            </div>
            <h1>Arrangementer for dig</h1>
            <p>Hos os kan du møde ligestillede mennesker, der står med de samme bekymringer. Kom og snak, lyt og få oplevelser, der kan hjælpe dig i hverdagen, eller give et afbræk fra vanerne. </p>
            <a href="arrangementer.php">
                <button class="btnReg">Se vores arrangementer</button>
            </a>
        </div>
    </section>
    <section class="naeste-arrangementer">
        <h1>Næste arrangementer</h1>
       //PHP
    </section>
    <section class="tilmeld">
        <h1>Jeg vil være med</h1>
        <h2></h2>
        <div class="form"></div>
        <div class="billede">
            <img src="">
        </div>
    </section>


    <section class="arrangement-section">
        <h1>Alle arrangementer</h1>
        <div class="arrangementer-wrapper">
            <div class="arrangement-wrapper">

                <?php
                $n = 0;

                while($arrangement = mysqli_fetch_assoc($arrangementQuery)){ ?>
                    <div class="arrangement">
                        <img src="<?php echo $arrangement["yklf_thumbnail"]?>">
                        <h3><?php echo $arrangement["yklf_titel"]?></h3>
                        <p><?php echo $arrangement["yklf_dagtekst"]." d. ".$arrangement["yklf_dag"]." ".$arrangement["yklf_dagtal"]."  ".$arrangement["yklf_maaned"]." ".$arrangement["yklf_aar"]." - kl. ".$arrangement["yklf_tidspunkt"]?></p>
                        <p><?php echo $arrangement["yklf_kortbeskrivelse"]?></p>
                        <div class="arrangement-buttons-wrapper">
                            <a href="rediger-arrangement.php?id=<?php echo $arrangement["yklf_id"]?>"><button class="btnReg">Rediger</button></a>
                            <a href="slet-arrangement.php?id=<?php echo $arrangement["yklf_id"]?>"><button class="btnReg">Slet</button></a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

</main>

<!--FOOTER SEKTION-->
<footer>
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
        <h3>Næste Arrangement</h3>
    </div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>