<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "ga");
$dbh = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_SERVER . ';charset=utf8', DB_USER, DB_PASSWORD);
session_start();


if (isset($_POST["anvnam"])) {
    $anvnam = filter_input(INPUT_POST, 'anvnam', FILTER_SANITIZE_SPECIAL_CHARS);
    $losord = filter_input(INPUT_POST, 'losord', FILTER_SANITIZE_SPECIAL_CHARS);
    $sql = "SELECT * FROM `login` WHERE username='$anvnam' AND password='$losord'";
    echo $sql;
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(":anvnam", $anvnam);
    $stmt->bindParam(":losord", $losord);
    $stmt->execute();
    $login = $stmt->fetch();
    if (!empty($login)) {
        $_SESSION["login"] = 1;
        $_SESSION["namn"] = $anvnam;
        echo '<p>Välkommen, du är nu inloggad!</p>';
    } else {
        echo 'Något stämde inte!';
    }
}
if ($_SESSION["login"] == 1) {
    echo "<p>Du är nu inloggad som " . $_SESSION["namn"] . "!</p>";
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Välkommen, logga in.</title>
    </head>
    <body>
        <form method="POST">
            <p>Användarnamn:</p> <input type="text" name="anvnam" required>
            <p>Lösenord:</p><input type="text" name="losord" required>
            <input type="submit" value="Logga in">
        </form>

    </body>
</html>