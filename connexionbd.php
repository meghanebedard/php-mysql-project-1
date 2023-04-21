<?php

$servername = "localhost";
$username = "alfy";
$password = "nufhig-Cepxob-jenzu1";
$port = 8889;

try{ 
    $dbco = new PDO("mysql:host=$servername;port=$port", $username, $password);
    $dbco -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //$dropdb = "DROP DATABASE IF EXISTS Projet";
    $createdb = "CREATE DATABASE IF NOT EXISTS Projet";
    //$connect -> exec($dropdb);
    $dbco -> exec($createdb);

} catch (PDOException$e) {
    echo "Erreur : " . $e -> getMessage();
}

$dbname = "Projet";

try {
    $dbco = new PDO("mysql:host=$servername;dbname=$dbname;port=$port", $username, $password);
    $dbco -> setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE TABLE IF NOT EXISTS auto(
        Id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        modele VARCHAR(30) NOT NULL,
        marque VARCHAR(30) NOT NULL,
        annee INT,
        kilometrage INT,
        ville VARCHAR(50)
        )";
    $dbco -> exec($sql);
} catch (PDOException $e) {
    echo "Erreur : " . $e -> getMessage();
}
?>