<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: /signin.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>

<body>
    <main>
        <h1>Bienvenue sur ta page de profil</h1>
        <a href="/signout.php">Déconnexion</a>
        <a href="/">Retour sur la page d'accueil</a>
    </main>
</body>

</html>