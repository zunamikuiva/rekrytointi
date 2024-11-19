<?php
include 'db.php'; // Sisällytetään tietokantayhteys

// Tarkistetaan, että id-parametri on annettu URL:ssa
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Valmistellaan SQL-kysely työpaikan poistamiseksi
    $stmt = $pdo->prepare("DELETE FROM jobs WHERE id = ?");
    
    if ($stmt->execute([$id])) {
        // Onnistuneen poistamisen jälkeen uudelleenohjataan takaisin jobs.php-sivulle
        header("Location: jobs.php");
        exit();
    } else {
        echo "Virhe työpaikan poistamisessa.";
    }
} else {
    echo "Virhe: Työpaikan ID:tä ei ole määritelty.";
}
?>
