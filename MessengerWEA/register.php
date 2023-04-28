<?php

// Připojení k databázi
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kontrola, zda se podařilo připojit k databázi
if ($conn->connect_error) {
    die("Připojení se nezdařilo: " . $conn->connect_error);
}

// Získání údajů z formuláře
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

// Příprava SQL dotazu pro vložení údajů do databáze
$sql = "INSERT INTO register (username, password, email) VALUES ('$username', '$password', '$email')";

// Odeslání dotazu a kontrola, zda se podařilo vložit údaje do databáze
if ($conn->query($sql) === TRUE) {
    echo "Údaje byly úspěšně uloženy do databáze.";
    header("Location: page.html");
          exit;
} else {
    echo "Chyba při ukládání údajů do databáze: " . $conn->error;
}

// Uzavření spojení s databází
$conn->close();

?>