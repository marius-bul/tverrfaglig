<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    
    // Sjekk om brukeren allerede finnes
    $stmt = $pdo->prepare("SELECT * FROM brukere WHERE navn = :username");
    $stmt->execute([":username" => $username]);

    if ($stmt->rowCount() > 0) {
        die("Brukernavnet er allerede tatt. <a href='register.html'>Prøv igjen</a>");
    }

    // Hash passordet for lagring
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Sett inn brukeren i databasen
    $stmt = $pdo->prepare("INSERT INTO brukere (navn, passord) VALUES (:username, :password)");
    if ($stmt->execute([":username" => $username, ":password" => $hashed_password])) {
        echo "Registrering vellykket! <a href='index.html'>Logg inn</a>";
    } else {
        echo "Noe gikk galt. <a href='register.html'>Prøv igjen</a>";
    }
}
?>
