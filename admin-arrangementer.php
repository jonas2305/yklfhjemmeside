<?php
include'session.php';
session_start();

$arrangementQuery = mysqli_query($db, "SELECT * FROM arrangementer ORDER BY yklf_id ASC");

?>
<html>

<head>
    <meta charset="UTF-8">
    <title>Arrangementer</title>
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

<main class="admin-arrangementer">
    <div class="log-ud">
        <a href = "logud.php">
            <button class="btnReg log-ud-btn">Log ud</button>
        </a>
    </div>
    <div class="opret">
        <a href = "opret-arrangement.php">
            <button class="btnBig">Opret arrangement</button>
        </a>
    </div>

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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/script.js"></script>
</body>

</html>