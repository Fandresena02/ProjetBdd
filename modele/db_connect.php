<?php
$user = "root";
$pass = "roototo123";
$host = "localhost"; // Nom du service MySQL dans Docker Compose
$db_name = "bdd_efrei";
$dbh = new PDO("mysql:host=$host;dbname=$db_name", $user, $pass);
?>
