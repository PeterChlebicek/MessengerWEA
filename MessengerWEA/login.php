<?php

$host = 'localhost';  
$dbname = 'test'; 
$username = 'root'; 
$password = ''; 


$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

// získání uživatele se zadaným uživatelským jménem a heslem z databáze
$stmt = $db->prepare("SELECT * FROM register WHERE username = :username AND password = :password");
$stmt->bindParam(':username', $_POST['username']);
$stmt->bindParam(':password', $_POST['password']);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// pokud nebyl nalezen žádný uživatel tak vyskočí chybová zpráva
if (!$user) {
    echo "Neplatné přihlašovací údaje";
    exit();
}

// pokud byl uživatel nalezen, přesměruje se na stránku s messengerem
header("Location: page.html");
exit();
?>