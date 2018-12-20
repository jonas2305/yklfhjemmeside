<?php
require "db/db.php";

$arrangementQuery = mysqli_query($db, "SELECT * FROM arrangementer ORDER BY yklf_id ASC");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Arrangementer for folk med kræft / cancer</title>
    <meta name="description" content="Mød mennesker med kræft, som forstår dig og hvad du går i gennem. Se alle vores arrangementer.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="scss/finalStyle.css">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Hind+Siliguri:400,600&amp;subset=latin-ext" rel="stylesheet">

    <!--Meta data til sociale medier-->
    <meta property="og:title" content="Arrangementer for folk med kræft / cancer" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://www.kjproductions.dk/yklf/arrangementer-for-folk-med-cancer.php" />
    <meta property="og:image" content="http://www.kjproductions.dk/yklf/images/logo/logo-02.png" />
    <meta property="og:description" content="Mød mennesker med kræft, som forstår dig og hvad du går i gennem. Se alle vores arrangementer." />
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

<main>

    <section class="sideTitel">
        <h1 class="maksBredde">Arrangementer</h1>
    </section>

    <section class="sponsorerIntro maksBredde">
        <div class="sponsorerIntroTekst">
            <h4>Igennem forskellige arrangementer møder du ligestillede mennesker i øjenhøjde, som både kan hjælpe dig, og har brug for din hjælp.
                <br><br>
                Kom og snak, lyt og få oplevelser, der hjælper og giver afbræk fra det du kender.
                <br>
                <span class="bold">Du er ikke alene.</span>
                <br><br>
                Herunder kan du se vores kommens arrangementer. Klik på dem, og tilmeld dig.
            </h4>
        </div>
        <div class="sponsorerIntroBillede">
            <img src="images/sidebilleder/forening-for-yngre-kraeft-ramte-til-stafet-for-livet.jpg" alt="holdbillede Netværk for yngre kræftramte Stafet for Livet">
        </div>
    </section>

    <div class="admin-arrangementer">
        <section class="arrangement-section">
            <div class="maksBredde">
                <h1>Alle arrangementer</h1>
                <div class="arrangementer-wrapper">
                    <div class="arrangement-wrapper">

                        <?php
                        while($arrangement = mysqli_fetch_assoc($arrangementQuery)){ ?>
                            <div class="arrangement">
                                <img src="<?php echo $arrangement["yklf_thumbnail"]?>">
                                <h3><?php echo $arrangement["yklf_titel"]?></h3>
                                <p><?php echo $arrangement["yklf_dagtekst"]." d. ".$arrangement["yklf_dag"]." ".$arrangement["yklf_dagtal"]."  ".$arrangement["yklf_maaned"]." ".$arrangement["yklf_aar"]." - kl. ".$arrangement["yklf_tidspunkt"]?></p>
                                <p><?php echo $arrangement["yklf_kortbeskrivelse"]?></p>
                                <div class="arrangement-buttons-wrapper">
                                    <a href="tilmelding-til-arrangement-for-folk-med-cancer.php?id=<?php echo $arrangement["yklf_id"]?>"<button class="btnReg">Læs mere</button></a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

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