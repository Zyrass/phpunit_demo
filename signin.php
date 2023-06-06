<?php
session_start();

// Rediriger l'utilisateur s'il est déjà connecté
if (isset($_SESSION['user_id'])) {
    header("Location: /profile.php");
    exit;
}
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
        <h1>Connexion</h1>
        <form action="/checkConnexion.php" method="post">
            <input type="text" placeholder="pseudo" name="email">
            <input type="password" placeholder="mot de passe" name="password">
            <button type="submit">Connexion</button>
        </form>
    </main>
</body>

</html>