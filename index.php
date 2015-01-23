<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "ga");
$dbh = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_SERVER . ';charset=utf8', DB_USER, DB_PASSWORD);
session_start();

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
    $login = $stmt->fetch();
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
    $login = $stmt->fetch();
}

//redigera tider
if (isset($_POST["redtid"])) {
include 'tider.php';

    //lägg till
    if (isset($_POST["start"])) {
        $start = filter_input(INPUT_POST, 'start', FILTER_SANITIZE_SPECIAL_CHARS);
        $slut = filter_input(INPUT_POST, 'slut', FILTER_SANITIZE_SPECIAL_CHARS);
        $sql = "INSERT INTO `tider`(`id`, `starttid`, `sluttid`) VALUES ('','$start','$slut')";
//    echo $sql;
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(":start", $start);
        $stmt->bindParam(":slut", $slut);
        $stmt->execute();
        $login = $stmt->fetch();
    }

//ta bort
    if (isset($_POST["delete"])) {
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
        $sql = "DELETE FROM `tider` WHERE id=$id";
//    var_dump($_POST);
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $login = $stmt->fetch();
    }
//redigera tider
    if (isset($_POST["andra"])) {
        $startred = filter_input(INPUT_POST, 'startred', FILTER_SANITIZE_SPECIAL_CHARS);
        $slutred = filter_input(INPUT_POST, 'slutred', FILTER_SANITIZE_SPECIAL_CHARS);
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
        $sql = "UPDATE `tider` SET `starttid`='$startred',`sluttid`='$slutred' WHERE id='$id'";

        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(":startred", $startred);
        $stmt->bindParam(":slutred", $slutred);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $login = $stmt->fetch();
    }
}

//Lägg till behandling
if (isset($_POST["lagbeh"])) {
    include 'behandlingar.php';

//lägg till behandlingarna
    if (isset($_POST["add"])) {
        $behandling = filter_input(INPUT_POST, 'behandling', FILTER_SANITIZE_SPECIAL_CHARS);
        $langd = filter_input(INPUT_POST, 'langd', FILTER_SANITIZE_SPECIAL_CHARS);
        $sql = "INSERT INTO `behandlingar`(`namn`, `längd`) VALUES ('$behandling','$langd')";


        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(":behandling", $behandling);
        $stmt->bindParam(":langd", $langd);
        $stmt->execute();
        $login = $stmt->fetch();
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Välkommen, logga in.</title>
    </head>
    <body>

        <?php
        if (!empty($login)) {
            $_SESSION["inlog"] = 1;
            $_SESSION["namn"] = $anvnam;
            echo '<p>Välkommen, du är nu inloggad!</p>';
        } else {
            echo 'Vänligen logga in med ett registrerat användarnamn';
        }

        if ($_SESSION["inlog"] == 1) {
            echo "<p>Du är nu inloggad som " . $_SESSION["namn"] . "!</p>";
            echo "<form method='POST'><input type = 'submit' value = 'Logga ut' name='logout'></form>";

            echo "<form method='POST'><input type='submit' value='Byt lösenord' name='bytlos'></form>";
            if (isset($_POST["bytlos"])) {
                echo "Ange nytt lösenord <form method='POST'><input type='text' name='nylos'>"
                . "<input type='submit' value='Spara' name='sparalos'></form>";
            }

            echo "<form method='POST'><input type='submit' value='Redigera Tider' name='redtid'></form>";
            echo "<form method='POST'><input type='submit' value='Lägg till behandling' name='lagbeh'></form>";
        }
        if ($_SESSION["inlog"] == 0) {
            echo "<form method = 'POST'>
        <p>Användarnamn:</p> <input type = 'text' name = 'anvnam' required>
        <p>Lösenord:</p><input type = 'text' name = 'losord' required>
        <input type = 'submit' value = 'Logga in'>
        </form>";
        }
        ?>
    </body>
</html>