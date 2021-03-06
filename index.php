<?php
require "db/db.php";

$arrangementQuery = mysqli_query($db, "SELECT * FROM arrangementer ORDER BY yklf_id ASC");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forening for Yngre Kræft ramte</title>
    <meta name="description" content="Har du, eller kender du nogen med kræft / cancer? Vi er Forening for Yngre Kræft Ramte. Vi hjælper dig med at håndtere dit kræft forløb.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="scss/finalStyle.css">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Hind+Siliguri:400,600&amp;subset=latin-ext" rel="stylesheet">

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

<main class="mainForside">
    <section class="forside-slider">
        <div class="maksBredde">
            <div class="forside-slider-tekst">
                <h1 >Mød ligestillede med kræft, der har samme bekymringer og spørgsmål. <br>
                    Du er ikke alene.</h1>
                <a href="hvem-er-forening-for-yngre-kraeft-ramte.php">
                    <button class="btnReg">Hvem er vi?</button>
                </a>
            </div>
        </div>

    </section>

    <section class="blaa-bar">
        <div class="maksBredde">
            <h1>Venner i øjenhøjde</h1>
            <div class="blaa-bar-indhold">
                <p>En forening for yngre med kræft i alderen 18-45 år, hvor vi  møder hinanden i øjenhøjde. Alle har oplevet kræft sygdommen på egen krop, og ved derfor hvad det handler om.</p>
                <a href="hvem-er-forening-for-yngre-kraeft-ramte.php">
                    <button class="btnReg">Læs mere her</button>
                </a>
            </div>
        </div>
    </section>
    <section class="forside-arrangementer maksBredde">
        <div class="billede">
            <img src="images/sidebilleder/giv-til-folk-med-cancer.jpg">
        </div>
        <div class="forside-arrangementer-tekst">
            <h1>Arrangementer for dig</h1>
            <p>Hos os kommer du til en forening, hvor du kan møde ligestillede mennesker med kræft, der står med de samme bekymringer. Kom og snak, lyt og få oplevelser, der kan hjælpe dig i hverdagen, eller give et afbræk fra vanerne. </p>
            <a href="arrangementer-for-folk-med-cancer.php">
                <button class="btnReg">Se vores arrangementer</button>
            </a>
        </div>
    </section>
    <section class="arrangement-section">
        <div class="maksBredde">
            <h1>Næste arrangementer</h1>
            <div class="arrangementer-wrapper">
                <div class="arrangement-wrapper">

                    <?php
                    $n = 0;

                    while($arrangement = mysqli_fetch_assoc($arrangementQuery)){
                        if($n < 3){

                            ?>

                            <div class="arrangement">
                                <img src="<?php echo $arrangement["yklf_thumbnail"]?>">
                                <h3><?php echo $arrangement["yklf_titel"]?></h3>
                                <time>
                                    <p><?php echo $arrangement["yklf_dagtekst"]." d. ".$arrangement["yklf_dag"]." ".$arrangement["yklf_dagtal"]."  ".$arrangement["yklf_maaned"]." ".$arrangement["yklf_aar"]." - kl. ".$arrangement["yklf_tidspunkt"]?></p>
                                </time>
                                <p><?php echo $arrangement["yklf_kortbeskrivelse"]?></p>
                                <div class="arrangement-buttons-wrapper">
                                    <a href="tilmelding-til-arrangement-for-folk-med-cancer.php?id=<?php echo $arrangement["yklf_id"]?>"<button class="btnReg">Læs mere</button></a>
                                </div>
                            </div>
                        <?php } $n++;} ?>
                </div>
            </div>
        </div>

    </section>

    <!--EKSEMPLER PÅ SPONSORATER-->
    <section class="sponsorerEksempler">
        <h1 class="maksBredde">Vores sponsorer</h1>
        <p class="maksBredde">Vores forening er drevet på sponsorer og offentlige midler, og vi er derfor meget glade for dem der vil støtte. Se her, hvem der har støttet os i kampen mod kræft.<br><br></p>
        <div class="sponsorerEksemplerFlex maksBredde">
            <div class="sponsorerEksemplerAfsnit">
                <img src="images/sidebilleder/hjaelp-kraeft-ramte-i-forening.jpg" alt="sponsorat Netværk for yngre kræftramte">
                <h3>Stafet for livet</h3>
                <p class="pWhite">Støttet af: Lions Sydlolland<br><br>
                    Donation til afvikling af Stafet for livet.</p>
            </div>
            <div class="sponsorerEksemplerAfsnit">
                <img src="images/sidebilleder/en-god-oplevelse-til-kraeft-ramte.jpg" alt="wellnesstur Netværk for yngre kræftramte">
                <h3>Wellnesstur</h3>
                <p class="pWhite">Støttet af: Tryg Fonden<br><br>
                    Wellnesstur til Nordtyskland for alle foreningens medlemmer.</p>
            </div>
            <div class="sponsorerEksemplerAfsnit">
                <img src="images/sidebilleder/giv-til-folk-med-cancer.jpg" alt="taske Netværk for yngre kræftramte">
                <h3>Tasker til medlemmer</h3>
                <p class="pWhite">Støttet af: Halstedhus Efterskole<br><br>
                    Donation af tasker til alle medlemmer.</p>
            </div>
        </div>
        <div class="se-alle-sponsorer-button">
            <a href="sponsorer-i-kamp-mod-cancer.php"><button class="btnBig">Se alle sponsorer</button></a>
        </div>
    </section>

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