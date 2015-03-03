<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "ga");
$dbh = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_SERVER . ';charset=utf8', DB_USER, DB_PASSWORD);
//if (isset($_GET["add"])) {
    $behandling = filter_input(INPUT_GET, 'behandling', FILTER_SANITIZE_SPECIAL_CHARS);
    $langd = filter_input(INPUT_GET, 'langd', FILTER_SANITIZE_SPECIAL_CHARS);
    $sql = "INSERT INTO `behandlingar`(`namn`, `längd`) VALUES ('$behandling','$langd')";


    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(":behandling", $behandling);
    $stmt->bindParam(":langd", $langd);
    $stmt->execute();
    $login = $stmt->fetch();
//}
    header ('Location: index.php');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

