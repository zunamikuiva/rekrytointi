<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Työnhakijoiden Lista</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Rekrytointisovellus</h1>
        <nav>
            <ul>
                <li><a href="index.php">Etusivu</a></li>
                <li><a href="login.html">Kirjaudu</a></li>
                <li><a href="applicants.php">Työnhakijat</a></li>
                <li><a href="jobs.php">Työpaikat</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <?php
        include 'db.php';
        $stmt = $pdo->query("SELECT * FROM applicants");
        $applicants = $stmt->fetchAll();
        ?>

        <table>
            <tr>
                <th>Nimi</th>
                <th>Email</th>
                <th>Koulutus</th>
                <th>Kokemus</th>
                <th>Osaaminen</th>
                <th>Toiminnot</th>
            </tr>
            <?php foreach ($applicants as $applicant): ?>
            <tr>
                <td><?php echo htmlspecialchars($applicant['name']); ?></td>
                <td><?php echo htmlspecialchars($applicant['email']); ?></td>
                <td><?php echo htmlspecialchars($applicant['education']); ?></td>
                <td><?php echo htmlspecialchars($applicant['experience']); ?></td>
                <td><?php echo htmlspecialchars($applicant['skills']); ?></td>
                <td>
                    <a href="edit_applicant.php?id=<?php echo $applicant['id']; ?>">Muokkaa</a> |
                    <a href="delete_applicant.php?id=<?php echo $applicant['id']; ?>">Poista</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
		<a href='add_applicant.php'> Lisää työnhakija </a><br><br>
		<a href='index.php'> Palaa etusivulle </a><br><br>
    </main>
    <footer>
        <p>&copy; 2024 Rekrytointisovellus Ninni</p>
    </footer>
</body>
</html>
