<!DOCTYPE html>
<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "ga");
$dbh = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_SERVER . ';charset=utf8', DB_USER, DB_PASSWORD);
session_start();
$_SESSION["inlog"] = 0;

if (isset($_POST['logout'])) {
    $_SESSION["inlog"] = 0;
}


if (isset($_POST["anvnam"])) {
    $anvnam = filter_input(INPUT_POST, 'anvnam', FILTER_SANITIZE_SPECIAL_CHARS);
    $losord = filter_input(INPUT_POST, 'losord', FILTER_SANITIZE_SPECIAL_CHARS);
    $sql = "SELECT * FROM `inlog` WHERE anvnam='$anvnam' AND losord='$losord'";
//    echo $sql;
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(":anvnam", $anvnam);
    $stmt->bindParam(":losord", $losord);
    $stmt->execute();
    $login = $stmt->fetchAll();
}

//byt lösenord
if (isset($_POST["sparalos"])) {
    $nylos = filter_input(INPUT_POST, 'nylos', FILTER_SANITIZE_SPECIAL_CHARS);
    $anvnam = $_SESSION["namn"];
    $sql = "UPDATE `inlog` SET `losord`='$nylos' WHERE `anvnam`='$anvnam'";

    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(":nylos", $nylos);
    $stmt->bindParam(":anvnam", $anvnam);
    $stmt->execute();
    $login = $stmt->fetchAll();
}

//redigera tider
//if (isset($_POST["redtid"])) {
////include 'tider.php';
//    ?>
<!--    <html>
        <head>
            <meta charset="UTF-8">

        </head>
        <body>
            <form method = 'POST'>
                Lägg till en tid
                <p>Starttid ÅÅÅÅ-MM-DD TT:MM:SS</p> <input type = 'text' name = 'start' required>
                <p>Sluttid ÅÅÅÅ-MM-DD TT:MM:SS</p> <input type = 'text' name = 'slut' required>
                <input type = 'submit' value = 'Lägg till' name='addt'>
            </form>

            <form method = 'POST'></form>
            <br>
        </body>
    </html>-->
    <?php
//lägg till
//
//    if (isset($_POST["addt"])) {
//
//        $start = filter_input(INPUT_POST, 'start', FILTER_SANITIZE_SPECIAL_CHARS);
//        $slut = filter_input(INPUT_POST, 'slut', FILTER_SANITIZE_SPECIAL_CHARS);
//        $sql = "INSERT INTO `tider`(`id`, `starttid`, `sluttid`) VALUES ('','$start','$slut')";
////    echo $sql;
//        $stmt = $dbh->prepare($sql);
//        $stmt->bindParam(":start", $start);
//        $stmt->bindParam(":slut", $slut);
//        $stmt->execute();
//        $login = $stmt->fetchAll();
//    }
//
////ta bort
//    if (isset($_POST["delete"])) {
//        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
//        $sql = "DELETE FROM `tider` WHERE id=$id";
////    var_dump($_POST);
//        $stmt = $dbh->prepare($sql);
//        $stmt->bindParam(":id", $id);
//        $stmt->execute();
//        $login = $stmt->fetchAll();
//    }
////redigera tider
//    if (isset($_POST["andra"])) {
//        $startred = filter_input(INPUT_POST, 'startred', FILTER_SANITIZE_SPECIAL_CHARS);
//        $slutred = filter_input(INPUT_POST, 'slutred', FILTER_SANITIZE_SPECIAL_CHARS);
//        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
//        $sql = "UPDATE `tider` SET `starttid`='$startred',`sluttid`='$slutred' WHERE id='$id'";
//
//        $stmt = $dbh->prepare($sql);
//        $stmt->bindParam(":startred", $startred);
//        $stmt->bindParam(":slutred", $slutred);
//        $stmt->bindParam(":id", $id);
//        $stmt->execute();
//        $login = $stmt->fetchAll();
//    }
//
//    $sql = "SELECT * FROM tider";
//    $stmt = $dbh->prepare($sql);
//    $stmt->execute();
//    $tider = $stmt->fetchAll();
//
//
//    foreach ($tider as $tid) {
//        echo "<br>" . $tid["id"];
//        echo "<br>" . $tid["starttid"];
//        echo "<br>" . $tid ["sluttid"];
//        echo "<br><form method='POST'><input type = 'submit' value = 'Redigera' name='redigera'><input type='hidden' value='" . $tid["id"] . "' name='id'></form>";
//
//        if (isset($_POST["redigera"]) and $_POST["id"] == $tid["id"]) {
//            echo "<form method='POST'><input type='text' value='" . $tid["starttid"] . "' name='startred'> <br>";
//            echo "<input type='text' value='" . $tid["sluttid"] . "' name='slutred'> <br>";
//            echo "<input type='hidden' value='" . $tid["id"] . "' name='id' ><br>";
//            echo "<input type='submit' value='Ändra' name='andra'></form>";
//        }
//        echo "<form method='POST'><input type='hidden' value='" . $tid["id"] . "' name='id'><input type = 'submit' value = 'Delete' name='delete'></form>";
//        echo "<br>";
//    }
//}
//var_dump($_POST);
//SLUT PÅ TIDER
//
//
//Lägg till behandling
//if (isset($_POST["lagbeh"])) {
//    include 'behandlingar.php';
//lägg till behandlingarna
    ?>
<!--    <html>
        <head>
            <meta charset="UTF-8">
        </head>
        <body>
            <form method = 'POST'>
                Lägg till en behandling
                <p>Namn</p> <input type = 'text' name = 'behandling' required>
                <p>Längd (min)</p> <input type = 'text' name = 'langd' required>
                <input type = 'submit' value = 'Lägg till' name="addb">
            </form>
        </body>
    </html>-->
    <?php
//    $sql = "SELECT * FROM behandlingar";
//    $stmt = $dbh->prepare($sql);
//    $stmt->execute();
//    $behandlingar = $stmt->fetchAll();
//
//    foreach ($behandlingar as $behandling) {
//        echo "<br>" . $behandling["id"];
//        echo "<br>" . $behandling["namn"];
//        echo "<br>" . $behandling ["längd"] . "min <br>";
//    }
//    if (isset($_POST["addb"])) {
//        $behandling = filter_input(INPUT_POST, 'behandling', FILTER_SANITIZE_SPECIAL_CHARS);
//        $langd = filter_input(INPUT_POST, 'langd', FILTER_SANITIZE_SPECIAL_CHARS);
//        $sql = "INSERT INTO `behandlingar`(`namn`, `längd`) VALUES ('$behandling','$langd')";
//
//        $stmt = $dbh->prepare($sql);
//        $stmt->bindParam(":behandling", $behandling);
//        $stmt->bindParam(":langd", $langd);
//        $stmt->execute();
//        $login = $stmt->fetchAll();
//    }
//}
//SLUT PÅ BEHANDLINGAR
?>


<html>
    <head>
        <meta charset="UTF-8">
        <title>Välkommen, logga in.</title>
    </head>
    <body>
<!--<form method='POST'><a href='behandlingar.php'><input type='submit' value='Lägg till behandling' name='lagbeh'></a></form>-->
<?php
if (!empty($login)) {
    $_SESSION["inlog"] = 1;
    $_SESSION["namn"] = $anvnam;
    echo '<p>Välkommen, du är nu inloggad!</p>';
} else {
//    echo 'Vänligen logga in med ett registrerat användarnamn';
}

if ($_SESSION["inlog"] == 1) {
    echo "<p>Du är nu inloggad som " . $_SESSION["namn"] . "!</p>";
    echo "<form method='POST'><input type = 'submit' value = 'Logga ut' name='logout'></form>";
    echo "<form method='POST'><input type='submit' value='Byt lösenord' name='bytlos'></form>";
    if (isset($_POST["bytlos"])) {
        echo "Ange nytt lösenord <form method='POST'><input type='text' name='nylos'>"
        . "<input type='submit' value='Spara' name='sparalos'></form>";
    }

//    echo "<form method='POST'><input type='submit' value='Redigera Tider' name='redtid'></form>";

    echo "<a href=tider.php>Redigera Tider</a><br>";
    echo "<form method='POST'><input type='submit' value='Lägg till behandling' name='lagbeh'></form>";

    echo "<a href='tider.php'>Redigera tider</a><br>";
//    echo "<form method='POST'><a href='behandlingar.php'><input type='submit' value='Lägg till behandling' name='lagbeh'></a></form>";
    echo "<a href='behandlingar.php'>Lägg till behandling</a>";

}
if ($_SESSION["inlog"] == 0) {
    echo "<form method = 'POST'>
        <p>Användarnamn:</p> <input type = 'text' name = 'anvnam' required>
        <p>Lösenord:</p><input type = 'password' name = 'losord' required>
        <input type = 'submit' value = 'Logga in'>
        </form>";
}
?>
    </body>
</html>