<?php
$host = "localhost";  // funker også med ip adresse
$dbname = "nettbutikk";
$username = "marius";   // brukernavn på mysql 
$password = "!";       // passord til mysql

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database-tilkobling feilet: " . $e->getMessage());
}
?>
