<?php

require "db/db.php";

$fileExistsFlag = 0;
$fileName = $_FILES['Filename']['name'];
$link = $db;
$id = 2;
/*
*	Checking whether the file already exists in the destination folder
*/
//$query = "SELECT yklf_thumbnail FROM arrangementer WHERE yklf_id='$yklf_id'";
//$result = $link->query($query) or die("Error : ".mysqli_error($link));
//while($row = mysqli_fetch_array($result)) {
//    if($row['yklf_thumbnail'] == $yklf_thumbnail) {
//        $fileExistsFlag = 1;
//    }
//}
/*
* If file is not present in the destination folder
*/
//if($fileExistsFlag == 0) {
    $target = "files/";
    $fileTarget = $target.$fileName;
    $tempFileName = $_FILES["Filename"]["tmp_name"];
    $fileDescription = $_POST['Description'];
    $result = move_uploaded_file($tempFileName,$fileTarget);
    /*
    *	If file was successfully uploaded in the destination folder
    */
//    if($result) {
//        echo "Your file <html><b><i>".$fileName."</i></b></html> has been successfully uploaded";
//        $query = "INSERT INTO arrangementer (yklf_thumbnail) VALUES ('$fileTarget')";
//        $link->query($query) or die("Error : ".mysqli_error($link));
//    }
//    else {
//        echo "Sorry !!! There was an error in uploading your file";
//    }
//    mysqli_close($link);
//}
/*
* If file is already present in the destination folder
*/
//else {
//    echo "File <html><b><i>".$fileName."</i></b></html> already exists in your folder. Please rename the file and try again.";
//    mysqli_close($link);
//}






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
    <title>Opret arrangement</title>

    <!-- Sikrer man kan benytte CSS ved at tilkoble en CSS fil -->
    <link href="scss/finalStyle.css" rel="stylesheet" type="text/css">

    <!-- Sikrer den vises korrekt på mobil, tablet mv. ved at tage ift. skærmstørrelse -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

<main>
    <h1>Opret arrangement</h1>
    <h2><a href = "logud.php">Sign Out</a></h2>
    <h2><a href = "admin-arrangementer.php">Annuller</a></h2>

    <section class="opret-arrangement">
        <form id="opret-arrangement" method ="post" action="opret-arrangement.php" enctype="multipart/form-data">
            <label for="title">Titel</label>
            <input class="" type="text" name="yklf_titel" id="titel" placeholder="" value="">

            <label for="dagtekst">Ugedag</label>
            <input class="" type="text" name="yklf_dagtekst" id="dagtekst" placeholder="" value="">

            <label for="dagtal">d.</label>
            <input class="" type="text" name="yklf_dagtal" id="dagtal" placeholder="" value="">

            <label for="maaned">Måned</label>
            <input class="" type="text" name="yklf_maaned" id="maaned" placeholder="" value="">

            <label for="aar">År</label>
            <input class="" type="text" name="yklf_aar" id="aar" placeholder="" value="">

            <label for="tidspunkt">Tidspunkt</label>
            <input class="" type="text" name="yklf_tidspunkt" id="tidspunkt" placeholder="" value="">

            <label for="kortbeskrivelse">Kort beskrivelse</label>
            <input class="" type="text" name="yklf_kortbeskrivelse" id="kortbeskrivelse" placeholder="" value="">

            <label for="langbeskrivelse">Lang beskrivelse</label>
            <input class="" type="text" name="yklf_langbeskrivelse" id="langbeskrivelse" placeholder="" value="">

            <label for="Filename">Billede</label>
            <input class="" type="file" name="Filename" id="thumbnail" placeholder="" value="">

            <button type="submit" class="">Opret arrangement</button>

        </form>
    </section>
</main>

</body>

</html>