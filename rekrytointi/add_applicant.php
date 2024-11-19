<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lisää Työnhakija</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Lisää Työnhakija</h1>
    </header>
    <main>
        <form method="POST" action="add_applicant.php">
            <label>Nimi:</label>
            <input type="text" name="name" required>
            
            <label>Email:</label>
            <input type="email" name="email" required>
            
            <label>Koulutus:</label>
            <input type="text" name="education">
            
            <label>Kokemus:</label>
            <select name="experience">
                <option value="0v">0v</option>
                <option value="1-2v">1-2v</option>
                <option value="3+v">3+v</option>
            </select>
            
            <label>Osaaminen:</label>
            <textarea name="skills"></textarea>
            
            <button type="submit">Lisää hakija</button>
			<a href='index.php'> Palaa etusivulle </a><br><br>
        </form>
		    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include 'db.php';
        $name = $_POST['name'];
        $email = $_POST['email'];
        $education = $_POST['education'];
        $experience = $_POST['experience'];
        $skills = $_POST['skills'];
        $stmt = $pdo->prepare("INSERT INTO applicants (name, email, education, experience, skills) VALUES (?, ?, ?, ?, ?)");
        if ($stmt->execute([$name, $email, $education, $experience, $skills])) {
            echo "<p>Hakija lisätty onnistuneesti!</p>";
        } else {
            echo "<p>Virhe lisättäessä hakijaa.</p>";
        }
    }
    ?>
    </main>
    <footer>
        <p>&copy; 2024 Rekrytointisovellus Ninni</p>
    </footer>
</body>
</html>
