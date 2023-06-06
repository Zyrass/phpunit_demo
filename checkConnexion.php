<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

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
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $hashedPassword = $user['password'];

            if (password_verify($password, $hashedPassword)) {
                $_SESSION['user_id'] = $user['id'];
                header("Location: /profile.php");
                exit();
            }
        }

        header("Location: /signin.php");
        exit();

        $pdo = null;
    } catch (PDOException $e) {
        echo "Une erreur PDO est survenue : " . $e->getMessage();
    } catch (Exception $e) {
        echo "Une erreur est survenue : " . $e->getMessage();
    }
}
