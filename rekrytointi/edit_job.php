<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muokkaa Työpaikkaa</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Muokkaa Työpaikkaa</h1>
    </header>
    <main>
        <?php
        include 'db.php'; // Sisällytetään tietokantayhteys

        // Tarkistetaan, että id-parametri on annettu URL:ssa
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // Haetaan työpaikan nykyiset tiedot tietokannasta
            $stmt = $pdo->prepare("SELECT * FROM jobs WHERE id = ?");
            $stmt->execute([$id]);
            $job = $stmt->fetch();

            // Jos työpaikkaa ei löydy annetulla ID:llä, näytetään virheviesti
            if (!$job) {
                echo "<p>Työpaikkaa ei löytynyt.</p>";
                exit();
            }
        } else {
            echo "<p>Virhe: Työpaikan ID:tä ei ole määritelty.</p>";
            exit();
        }

        // Päivitetään työpaikan tiedot, kun lomake lähetetään
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $title = $_POST['title'];
            $company_name = $_POST['company_name'];
            $description = $_POST['description'];
            $requirements = $_POST['requirements'];

            // Päivityskysely tietokantaan ilman 'location' kenttää
            $stmt = $pdo->prepare("UPDATE jobs SET title = ?, company_name = ?, description = ?, requirements = ? WHERE id = ?");
            
            if ($stmt->execute([$title, $company_name, $description, $requirements, $id])) {
                echo "<p>Työpaikan tiedot päivitetty onnistuneesti!</p>";
            } else {
                echo "<p>Virhe työpaikan päivittämisessä.</p>";
            }
        }
        ?>

                <!-- Muokkauslomake, joka näyttää nykyiset tiedot -->
        <form method="POST" action="edit_job.php?id=<?php echo $job['id']; ?>">
            <label>Tehtävänimike:</label>
            <input type="text" name="title" value="<?php echo htmlspecialchars($job['title'] ?? ''); ?>" required>

            <label>Yrityksen Nimi:</label>
            <input type="text" name="company_name" value="<?php echo htmlspecialchars($job['company_name'] ?? ''); ?>" required>

            <label>Kuvaus:</label>
            <textarea name="description" required><?php echo htmlspecialchars($job['description'] ?? ''); ?></textarea>

            <label>Vaatimukset:</label>
            <textarea name="requirements"><?php echo htmlspecialchars($job['requirements'] ?? ''); ?></textarea>

            <button type="submit">Päivitä Työpaikka</button>
            <a href="jobs.php">Palaa takaisin</a>
        </form>
    </main>
    <footer>
        <p>&copy; 2024 Rekrytointisovellus Ninni</p>
    </footer>
</body>
</html>
        <form meth
