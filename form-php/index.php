<?php
require_once 'Person.php';

$person  = null;
$errors  = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $firstName   = trim($_POST['firstname'] ?? '');
    $lastName    = trim($_POST['lastname'] ?? '');
    $phoneNumber = trim($_POST['phone'] ?? '');
    $address     = trim($_POST['address'] ?? '');

    if ($firstName === '')   $errors[] = 'Firstname tidak boleh kosong.';
    if ($lastName === '')    $errors[] = 'Lastname tidak boleh kosong.';
    if ($phoneNumber === '') $errors[] = 'Phone Number tidak boleh kosong.';
    if ($address === '')     $errors[] = 'Address tidak boleh kosong.';

    if (empty($errors)) {
        $person = new Person(
            htmlspecialchars($firstName),
            htmlspecialchars($lastName),
            htmlspecialchars($phoneNumber),
            htmlspecialchars($address)
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
        <p>Isi data diri kamu di bawah ini</p>
    </div>

    
    <form method="POST" action="">
        <div class="form-group">
            <input type="text" name="firstname" placeholder="Firstname"
                value="<?= isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname']) : '' ?>">
        </div>
        <div class="form-group">
            <input type="text" name="lastname" placeholder="Lastname"
                value="<?= isset($_POST['lastname']) ? htmlspecialchars($_POST['lastname']) : '' ?>">
        </div>
        <div class="form-group">
            <input type="text" name="phone" placeholder="Phone Number"
                value="<?= isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '' ?>">
        </div>
        <div class="form-group">
            <textarea name="address" placeholder="Address"><?= isset($_POST['address']) ? htmlspecialchars($_POST['address']) : '' ?></textarea>
        </div>
        <div class="form-action">
            <button type="submit" name="submit" class="btn-submit">Submit</button>
        </div>
    </form>


    <?php if (!empty($errors)): ?>
    <div class="error-box">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>

    <?php if ($person !== null): ?>
    <div class="result-summary">
        <p>Hi, my name is <?= $person->getFullName() ?></p>
        <p>Phone Number : <?= $person->getPhoneNumber() ?></p>
        <p>Address : <?= $person->getAddress() ?></p>
    </div>

    <div class="result-box">
        <div class="result-item">
            <span class="result-label">Full Name</span>
            <span class="result-value"><?= $person->getFullName() ?></span>
        </div>
        <div class="result-item">
            <span class="result-label">Phone</span>
            <span class="result-value"><?= $person->getPhoneNumber() ?></span>
        </div>
        <div class="result-item">
            <span class="result-label">Address</span>
            <span class="result-value"><?= $person->getAddress() ?></span>
        </div>
    </div>

    <div class="form-action" style="padding: 20px 36px 28px;">
        <a href="index.php"><button type="button" class="btn-reset">Reset</button></a>
    </div>
    <?php endif; ?>

</div>

</body>
</html>