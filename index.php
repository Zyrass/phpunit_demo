<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>

<body>
    <main>
        <h1>Découverte de PHPUnit</h1>
        <?php if (isset($_SESSION['user_id'])) : ?>
            <a href="/profile.php">Profile</a>
            <a href="/signout.php">Déconnexion</a>
        <?php else : ?>
            <a href="/signup.php">Inscription</a>
            <a href="/signin.php">Connexion</a>
        <?php endif; ?>
    </main>
</body>

</html>