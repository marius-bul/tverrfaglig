<?php
require 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    // Sjekk om brukeren finnes
    $stmt = $pdo->prepare("SELECT * FROM brukere WHERE navn = :username");
    $stmt->execute([":username" => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user["passord"])) {
        $_SESSION["username"] = $username;
        echo "Innlogging vellykket! <a href='hjemside.html'>Gå til hjem side</a>"; //fører bruker til hjemside.html
    } else {
        echo "Feil brukernavn eller passord. <a href='index.html'>Prøv igjen</a>";
    }
}
?>
