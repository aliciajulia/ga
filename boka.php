<!DOCTYPE html>
 <?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "ga");
$dbh = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_SERVER . ';charset=utf8', DB_USER, DB_PASSWORD);

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Boka tider</title>
    </head>
    <body>
      Välj behandling
       <?php
        
        ?>
    </body>
</html>
