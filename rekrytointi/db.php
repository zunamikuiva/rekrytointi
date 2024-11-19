<?php
// Tietokantayhteysasetukset
$host = 'localhost';      
$dbname = 'rekrytointi';   
$username = 'root';        
$password = '';            

// Yritetään muodostaa yhteys tietokantaan
try {
    // Luodaan uusi PDO-yhteys tietokantaan
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    
    // Asetetaan PDO-virheenkäsittelytila (näyttää virheilmoitukset)
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    // Jos yhteys epäonnistuu, näytetään virheilmoitus
    die("Tietokantayhteys epäonnistui: " . $e->getMessage());
}
?>
