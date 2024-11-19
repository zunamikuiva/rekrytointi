<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <title>Työntekijän näkymä</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Tervetuloa, <?= htmlspecialchars($_SESSION['username']) ?></h1>
    </header>
    <main class="employee-dashboard">
        <p>Täällä voit tarkastella omia tietojasi tai hakea töitä.</p>
        <!-- Lisää mahdollisia toimintoja työntekijälle -->
    </main>
</body>
</html>
