<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <title>Rekisteröidy</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Rekisteröidy</h1>
    </header>
    <main class="form-container">
        <?php
        $message = '';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            include 'db.php';
            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $role = $_POST['role'];

            $stmt = $pdo->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
            if ($stmt->execute([$username, $password, $role])) {
                $message = "<p class='success'>Rekisteröinti onnistui!</p>";
            } else {
                $message = "<p class='error'>Virhe rekisteröinnissä. Yritä uudelleen.</p>";
            }
        }
        ?>

        <?= $message ?>

        <form method="POST" action="register.php">
            <label>Käyttäjätunnus:</label>
            <input type="text" name="username" required>
            <label>Salasana:</label>
            <input type="password" name="password" required>
            <label>Rooli:</label>
            <select name="role">
                <option value="employee">Työntekijä</option>
                <option value="employer">Työnantaja</option>
            </select>
            <button type="submit">Rekisteröidy</button>
			<a href='login.php'>Kirjaudu</a><br><br>
        </form>
    </main>
</body>
</html>
