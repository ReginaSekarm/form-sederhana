<?php
require_once 'person.php';

$person = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $firstName   = htmlspecialchars(trim($_POST['firstname'] ?? ''));
    $lastName    = htmlspecialchars(trim($_POST['lastname'] ?? ''));
    $phoneNumber = htmlspecialchars(trim($_POST['phone'] ?? ''));
    $address     = htmlspecialchars(trim($_POST['address'] ?? ''));

    if ($firstName && $lastName && $phoneNumber && $address) {
        $person = new Person($firstName, $lastName, $phoneNumber, $address);
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
    <div class="container">
        <form method="POST" action="">
            <input type="text" name="firstname" placeholder="Firstname"
                value="<?= isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname']) : '' ?>">
            <input type="text" name="lastname" placeholder="Lastname"
                value="<?= isset($_POST['lastname']) ? htmlspecialchars($_POST['lastname']) : '' ?>">
            <input type="text" name="phone" placeholder="Phone Number"
                value="<?= isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '' ?>">
            <textarea name="address" placeholder="Address"><?= isset($_POST['address']) ? htmlspecialchars($_POST['address']) : '' ?></textarea>
            <div class="form-action">
                <button type="submit" name="submit" class="btn-submit">Submit</button>
            </div>
        </form>

        <?php if ($person !== null): ?>
        <div class="result">
            <p>Hi, my name is <?= $person->getFullName() ?></p>
            <p>Phone Number : <?= $person->getPhoneNumber() ?></p>
            <p>Address : <?= $person->getAddress() ?></p>
            <a href="index.php" class="reset-link">Reset</a>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>