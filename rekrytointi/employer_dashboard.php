<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <title>Työnantajan näkymä</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Työnhakijat</h1>
    </header>
    <main class="dashboard">
        <table class="styled-table">
            <thead>
                <tr>
                    <th>Nimi</th>
                    <th>Email</th>
                    <th>Koulutus</th>
                    <th>Kokemus</th>
                    <th>Osaaminen</th>
                    <th>Toiminnot</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($applicants as $applicant): ?>
                <tr>
                    <td><?= htmlspecialchars($applicant['name']) ?></td>
                    <td><?= htmlspecialchars($applicant['email']) ?></td>
                    <td><?= htmlspecialchars($applicant['education']) ?></td>
                    <td><?= htmlspecialchars($applicant['experience']) ?></td>
                    <td><?= htmlspecialchars($applicant['skills']) ?></td>
                    <td>
                        <a class="button edit-button" href="edit_applicant.php?id=<?= $applicant['id'] ?>">Muokkaa</a>
                        <form method="POST" action="delete_applicant.php" style="display:inline;">
                            <input type="hidden" name="applicant_id" value="<?= $applicant['id'] ?>">
                            <button class="button delete-button" type="submit">Poista</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a class="button add-button" href="add_applicant.php">Lisää työnhakija</a>
    </main>
</body>
</html>
