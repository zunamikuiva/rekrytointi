<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Työpaikkojen Lista</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Rekrytointisovellus</h1>
        <nav>
            <ul>
                <li><a href="index.php">Etusivu</a></li>
                <li><a href="login.php">Kirjaudu</a></li>
                <li><a href="applicants.php">Työnhakijat</a></li>
                <li><a href="jobs.php">Työpaikat</a></li>
            </ul>
        </nav>
    </header>
    <main>

        <?php
        include 'db.php';  // Sisällytetään tietokantayhteys
        $stmt = $pdo->query("SELECT * FROM jobs"); // Haetaan kaikki työpaikat
        $jobs = $stmt->fetchAll(); // Tallennetaan tulokset taulukkoon
        ?>

        <table>
            <tr>
                <th>Tehtävänimike</th>
                <th>Yritys</th>
                <th>Kuvaus</th>
                <th>Vaatimukset</th>
                <th>Toiminnot</th>
            </tr>
            <?php foreach ($jobs as $job): ?>
            <tr>
                <td><?php echo htmlspecialchars($job['title']); ?></td>
                <td><?php echo htmlspecialchars($job['company_name']); ?></td>
                <td><?php echo htmlspecialchars($job['description']); ?></td>
                <td><?php echo htmlspecialchars($job['requirements'] ?? 'Ei määritelty'); ?></td>
                <td>
                    <a href="edit_job.php?id=<?php echo $job['id']; ?>">Muokkaa</a> |
                    <a href="delete_job.php?id=<?php echo $job['id']; ?>">Poista</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        
        <a href='add_job.php'>Lisää työpaikka</a><br><br>
        <a href='index.php'>Palaa etusivulle</a><br><br>
    </main>
    <footer>
        <p>&copy; 2024 Rekrytointisovellus Ninni</p>
    </footer>
</body>
</html>
