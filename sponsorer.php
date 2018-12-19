<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="description" content="Beskrivelse">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="scss/finalStyle.css">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Hind+Siliguri:400,600&amp;subset=latin-ext" rel="stylesheet">

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

<!--HEADER-->
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

<!--MAIN SPONSORER-->
<main class="mainSponsorer">
    <!--SIDETITEL-->
    <section class="sideTitel">
        <h1>Sponsorer</h1>
    </section>
    <!--INTRO-->
    <section class="sponsorerIntro">
        <div class="sponsorerIntroTekst">
            <h4>I netværket kan du møde ligestillede, der har samme tanker og bekymringer i forhold til børn, familieliv, arbejdsliv, angst for
                tilbagefald og i forhold til det at komme videre i livet.
            </h4>
        </div>
        <div class="sponsorerIntroBillede">
            <img src="images/sidebilleder/holdbilledeStafetForLivet.jpg" alt="holdbillede Netværk for yngre kræftramte Stafet for Livet">
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