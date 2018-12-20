<?php
require "db/db.php";
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $brugernavn = mysqli_real_escape_string($db,$_POST['brugernavn']);
    $kode = mysqli_real_escape_string($db,$_POST['kode']);

    $sql = "SELECT login_id FROM login WHERE login_brugernavn = '$brugernavn' and login_kode = '$kode'";
    $bruger = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($bruger,MYSQLI_ASSOC);
    $aktiv = $row['active'];

    $check = mysqli_num_rows($bruger);


    if($check == 1) {
        $_SESSION['bruger_login'] = $brugernavn;

        header("location: admin-arrangementer-for-folk-med-cancer.php");
    }else {
        $fejl = "Dit brugernavn eller kode er ugyldigt.";
    }
}
?>
<html>

<head>
    <meta charset="UTF-8">
    <title>Administrer arrangementer</title>
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

<main class="login-main">
    <div class="login-boks">
        <h2>Login</h2>
        <div>
            <form action = "" method = "post">
                <label>Brugernavn</label>
                <br>
                <input type = "text" name = "brugernavn"/><br /><br />
                <label>Adgangskode</label>
                <br>
                <input type = "password" name = "kode"/><br/><br />
                <input type = "submit" value = "Log ind" class="btnReg"/><br />
            </form>

            <div><?php echo $fejl; ?></div>
        </div>
    </div>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>
