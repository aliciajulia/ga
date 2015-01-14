<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "ga");
$dbh = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_SERVER . ';charset=utf8', DB_USER, DB_PASSWORD);



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
//var_dump($sql);
//redigera
//if (isset($_POST[])){
//    
//}
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

if (isset($_POST["andra"])){
    $startred = filter_input(INPUT_POST, 'startred', FILTER_SANITIZE_SPECIAL_CHARS);
    $slutred = filter_input(INPUT_POST, 'slutred', FILTER_SANITIZE_SPECIAL_CHARS);
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
    $sql = "UPDATE `tider` SET `starttid`='$startred',`sluttid`='$slutred' WHERE 'id=$id'";
    
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(":startred", $startred);    
    $stmt->bindParam(":slutred", $slutred);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $login = $stmt->fetch();
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>6</title>
    </head>
    <body>
        <form method = 'POST'>
            Lägg till en tid
            <p>Starttid ÅÅÅÅ-MM-DD TT:MM:SS</p> <input type = 'text' name = 'start' required>
            <p>Sluttid ÅÅÅÅ-MM-DD TT:MM:SS</p> <input type = 'text' name = 'slut' required>
            <input type = 'submit' value = 'Lägg till'>
        </form>

        <form method = 'POST'></form>
        <br>
        <!--visa alla tider-->
<?php
$sql = "SELECT * FROM tider";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$tider = $stmt->fetchAll();

foreach ($tider as $tid) {
    echo "<br>";
    echo $tid["id"];
    echo "<br>";
    echo $tid["starttid"];
    echo "<br>";
    echo $tid ["sluttid"];
    echo "<br>";
    echo "<form method='POST'><input type = 'submit' value = 'Redigera' name='redigera'><input type='text' value='" . $tid["id"] . "' name='id'></form>";
    if (isset($_POST["redigera"]) and $_POST["id"]==$tid["id"]) {
        echo "<form method='POST'><input type='text' value='".$tid["starttid"]."' name='startred'> </form>";
        echo "<form method='POST'><input type='text' value='".$tid["sluttid"]."' name='slutred'> </form>";
        echo "<form method='POST'><input type='submit' value='Ändra' name='andra'></form>";
    }
    echo "<form method='POST'><input type='text' value='" . $tid["id"] . "' name='id'><input type = 'submit' value = 'Delete' name='delete'></form>";
    echo "<br>";
}



var_dump($tider);
?>

 <!--            <p>Ny starttid ÅÅ-MM-DD TT:MM:SS</p> <input type = 'number' name = 'startR' required>
             <p>Ny sluttid ÅÅ-MM-DD TT:MM:SS</p> <input type = 'number' name = 'slutR' required>-->





    </body>
</html>
