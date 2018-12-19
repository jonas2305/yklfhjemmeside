<?php
include'session.php';
session_start();

$arrangementQuery = mysqli_query($db, "SELECT * FROM arrangementer ORDER BY yklf_id ASC");

?>
<html>

<head>
    <title>Welcome </title>

    <!-- Sikrer man kan benytte CSS ved at tilkoble en CSS fil -->
    <link href="scss/finalStyle.css" rel="stylesheet" type="text/css">

    <!-- Sikrer den vises korrekt på mobil, tablet mv. ved at tage ift. skærmstørrelse -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

<main>
    <h1>Welcome <?php echo $login_session; ?></h1>
    <h2><a href = "logud.php">Sign Out</a></h2>
    <h2><a href = "opret-arrangement.php">Opret arrangement</a></h2>

    <section class="arrangement-section">
            <h1>Alle arrangementer</h1>

            <?php
            $n = 0;

            while($arrangement = mysqli_fetch_assoc($arrangementQuery)){ ?>

                    <div class="arrangement">
                        <img src="<?php echo $arrangement["yklf_thumbnail"]?>">
                        <h3><?php echo $arrangement["yklf_titel"]?></h3>
                        <p><?php echo $arrangement["yklf_dagtekst"]." d. ".$arrangement["yklf_dag"]." ".$arrangement["yklf_dagtal"]." ".$arrangement["yklf_maaned"]." ".$arrangement["yklf_aar"]." - kl. ".$arrangement["yklf_tidspunkt"]?></p>
                        <p><?php echo $arrangement["yklf_kortbeskrivelse"]?></p>
                        <a href="rediger-arrangement.php?id=<?php echo $arrangement["yklf_id"]?>"><button>Rediger</button></a>
                        <a href="slet-arrangement.php?id=<?php echo $arrangement["yklf_id"]?>"><button>Slet</button></a>
                    </div>

                <?php } ?>

    </section>
</main>

</body>

</html>