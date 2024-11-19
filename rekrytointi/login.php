<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <title>Kirjaudu</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Kirjaudu sisään</h1>
    </header>
    <main class="form-container">
        <?php
        session_start();
        $message = '';
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            include 'db.php';
            $username = $_POST['username'];
            $password = $_POST['password'];

            $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
            $stmt->execute([$username]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['username'] = $user['username'];
                
                header("Location: welcome.php"); // Ohjaa etusivulle
                exit;
            } else {
                $message = "<p class='error'>Väärä käyttäjätunnus tai salasana.</p>";
            }
        }
        ?>

        <?= $message ?>

        <form method="POST" action="login.php">
            <label>Käyttäjätunnus:</label>
            <input type="text" name="username" required>
            <label>Salasana:</label>
            <input type="password" name="password" required>
            <button type="submit">Kirjaudu</button>
        </form>
    </main>
</body>
</html>
