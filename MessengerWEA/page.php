<?php
// Pokud byl odeslán formulář pro zaslání zprávy
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Získání hodnot z formuláře
    $message = $_POST["message"];
    $friend = $_POST["friend"];

    // Pole povolených přátel
    $allowed_friends = array("Bob", "Alice", "Charlie");

    // Kontrola, zda je přítel v poli povolených přátel
    if (!empty($message) && in_array($friend, $allowed_friends)) {
        // Připojení k databázi
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "test";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Připojení se nezdařilo: " . $conn->connect_error);
        }

        // Přidání zprávy do databáze
        $sql = "INSERT INTO zpravy (friend, message) VALUES ('$friend', '$message')";
        if ($conn->query($sql) === TRUE) {
            header("Location: page.html");
            exit;
        } else {
            echo "Chyba: " . $sql . "<br>" . $conn->error;
        }

        // Uzavření spojení s databází
        $conn->close();
    } else {
        echo "Prosim napiš jen kamarada ze seznamu, diky";
    }
}
?>