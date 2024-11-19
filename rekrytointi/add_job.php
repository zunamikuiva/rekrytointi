<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <title>Lisää työpaikka</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Lisää työpaikka</h1>
    </header>
    <main class="form-container">
        <form method="POST" action="add_job.php">
            <label>Työpaikan nimi:</label>
            <input type="text" name="title" required>
            <label>Kuvaus:</label>
            <textarea name="description" required></textarea>
            <label>Vaatimukset:</label>
            <textarea name="requirements"></textarea>
            <button type="submit">Lisää työpaikka</button>
        </form>
    </main>
</body>
</html>
