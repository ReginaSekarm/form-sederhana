<?php
require_once 'Person.php';

$result = null;
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim($_POST['nama'] ?? '');
    $hp   = trim($_POST['hp']   ?? '');

    $person = new Person($nama, $hp);
    $errors = $person->validate();  

    if (empty($errors)) {
        $result = $person;          
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP OOP – Person Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header class="site-header">
        <h1>Person Form</h1>
        <p class="subtitle">PHP OOP &amp; GitHub Collaboration</p>
    </header>

    <main class="container">

        <section class="card">
            <h2>Input Data</h2>

            <form method="POST" action="" novalidate>

                <div class="form-group <?= isset($errors['nama']) ? 'has-error' : '' ?>">
                    <label for="nama">Nama</label>
                    <input
                        type="text"
                        id="nama"
                        name="nama"
                        placeholder="Masukkan nama (huruf saja)"
                        value="<?= htmlspecialchars($_POST['nama'] ?? '') ?>"
                        autocomplete="off"
                    >
                    <?php if (isset($errors['nama'])): ?>
                        <span class="error-msg"><?= htmlspecialchars($errors['nama']) ?></span>
                    <?php endif; ?>
                </div>

                <div class="form-group <?= isset($errors['hp']) ? 'has-error' : '' ?>">
                    <label for="hp">Nomor HP</label>
                    <input
                        type="text"
                        id="hp"
                        name="hp"
                        placeholder="8–15 digit angka"
                        value="<?= htmlspecialchars($_POST['hp'] ?? '') ?>"
                        autocomplete="off"
                    >
                    <?php if (isset($errors['hp'])): ?>
                        <span class="error-msg"><?= htmlspecialchars($errors['hp']) ?></span>
                    <?php endif; ?>
                </div>

                <button type="submit" class="btn-submit">Kirim</button>

            </form>
        </section>

        <?php if ($result !== null): ?>
        <section class="result-box">
            <h2>Hasil</h2>
            <table class="result-table">
                <tr>
                    <th>Nama</th>
                    <td><?= htmlspecialchars($result->getNama()) ?></td>
                </tr>
                <tr>
                    <th>Nomor HP</th>
                    <td><?= htmlspecialchars($result->getHp()) ?></td>
                </tr>
            </table>
        </section>
        <?php endif; ?>

    </main>

    <footer class="site-footer">
        <p>&copy; <?= date('Y') ?> PHP OOP Project &mdash; Kelompok GitHub</p>
    </footer>

</body>
</html>