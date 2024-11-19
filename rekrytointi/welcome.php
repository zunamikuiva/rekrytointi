<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <title>Etusivu</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Tervetuloa, <?= htmlspecialchars($_SESSION['username']) ?>!</h1>
    </header>
    <main>
        <p>Olet kirjautunut sisään onnistuneesti.</p>
        <!-- Lisää sisältöä, kuten linkkejä eri toimintoihin -->
    </main>
</body>
</html>
