<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    try {
        $dsn = 'mysql:host=localhost;dbname=connexion_phpunit;charset=utf8';
        $username = 'root';
        $dbPassword = 'root';

        $pdo = new PDO($dsn, $username, $dbPassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT * FROM user WHERE email = :email";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "Cet e-mail est déjà utilisé.";
            header("Location: /signup.php");
            exit();
        } elseif ($password !== $confirmPassword) {
            echo "Les mots de passe ne correspondent pas.";
            header("Location: /signup.php");
            exit();
        } else {
            $hashedPassword = hash('sha512', $password);

            $insertQuery = "INSERT INTO user (email, password) VALUES (:email, :password)";
            $insertStmt = $pdo->prepare($insertQuery);
            $insertStmt->bindParam(':email', $email);
            $insertStmt->bindParam(':password', $hashedPassword);
            $insertStmt->execute();

            echo "Inscription réussie!";
            header("Location: /signin.php");
            exit();
        }

        $pdo = null;
    } catch (PDOException $e) {
        echo "Une erreur PDO est survenue : " . $e->getMessage();
    } catch (Exception $e) {
        echo "Une erreur est survenue : " . $e->getMessage();
    }
}
