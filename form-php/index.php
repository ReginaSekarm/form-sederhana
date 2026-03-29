<?php
require_once 'Person.php';

$person = null;
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['reset'])) {
    $errors = Person::validate($_POST);

    if (empty($errors)) {
        $person = new Person(
            $_POST['firstname'],
            $_POST['lastname'],
            $_POST['phone_number'],
            $_POST['address']
        );
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Input Form - PHP OOP</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
<div class="card">
    <div class="card-header">
        <h1>Input Form</h1>
        <p>Silakan isi data diri Anda</p>
    </div>

    <?php if (!empty($errors)): ?>
        <div class="error-box">
            <ul>
                <?php foreach ($errors as $err): ?>
                    <li><?= $err ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if ($person === null): ?>
        <form method="POST" action="">
            <div class="form-group">
                <input
                    type="text"
                    name="firstname"
                    placeholder="Firstname"
                    value="<?= htmlspecialchars($_POST['firstname'] ?? '') ?>"
                />
            </div>
            <div class="form-group">
                <input
                    type="text"
                    name="lastname"
                    placeholder="Lastname"
                    value="<?= htmlspecialchars($_POST['lastname'] ?? '') ?>"
                />
            </div>
            <div class="form-group">
                <input
                    type="text"
                    name="phone_number"
                    placeholder="Phone Number"
                    value="<?= htmlspecialchars($_POST['phone_number'] ?? '') ?>"
                />
            </div>
            <div class="form-group">
                <textarea
                    name="address"
                    placeholder="Address"
                ><?= htmlspecialchars($_POST['address'] ?? '') ?></textarea>
            </div>
            <div class="form-action">
                <button type="submit" class="btn-submit">Submit</button>
            </div>
        </form>

    <?php else: ?>
        <div class="result-box">
            <div class="result-item">
                <span class="result-label">Nama</span>
                <span class="result-value"><?= $person->getFullname() ?></span>
            </div>
            <div class="result-item">
                <span class="result-label">Phone Number</span>
                <span class="result-value"><?= $person->getPhoneNumber() ?></span>
            </div>
            <div class="result-item">
                <span class="result-label">Address</span>
                <span class="result-value"><?= $person->getAddress() ?></span>
            </div>
        </div>

        <div class="result-summary">
            <p>Hi, my name is <strong><?= $person->getFullname() ?></strong></p>
            <p>Phone Number : <?= $person->getPhoneNumber() ?></p>
            <p>Address : <?= $person->getAddress() ?></p>
        </div>

        <form method="POST" action="">
            <div class="form-action">
                <button type="submit" name="reset" value="1" class="btn-reset">Reset</button>
            </div>
        </form>
    <?php endif; ?>
</div>
</body>
</html>