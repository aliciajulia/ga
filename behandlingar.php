<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "ga");
$dbh = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_SERVER . ';charset=utf8', DB_USER, DB_PASSWORD);

if (isset($_POST["add"])){
    $behandlingar = filter_input(INPUT_POST, 'behandlingar', FILTER_SANITIZE_SPECIAL_CHARS);
    $langd = filter_input(INPUT_POST, 'langd', FILTER_SANITIZE_SPECIAL_CHARS);
    
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(":behandlingar", $behandlingar);
    $stmt->bindParam(":langd", $langd);
    $stmt->execute();
    $login = $stmt->fetch();
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lägg till behandlingar</title>
    </head>
    <body>
 <form method = 'POST'>
            Lägg till en behandling
            <p>Namn</p> <input type = 'text' name = 'behandling' required>
            <p>Längd (min)</p> <input type = 'number' name = 'langd' required>
            <input type = 'submit' value = 'Lägg till' name="add">
        </form>
    </body>
</html>
