<?php
require("connector.php");
if (isset($_POST['email'], $_POST['newUsername'], $_POST['newPassword'], $_POST['confirmPassword'])) {
    $email = $_POST['email'];
    $username = $_POST['newUsername'];
    $password = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    if ($password !== $confirmPassword) {
        header("Location: signup.php?error=passwords_do_not_match");
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $connexion = dbconnect();

    $stmt = $connexion->prepare("INSERT INTO lecteur (email, pseudo, password) VALUES (?, ?, ?)");
    $success = $stmt->execute([$email, $username, $hashedPassword]);

    if ($success) {
        session_start();
        header("Location: login.php");
exit();

    } else {
        header("Location: signup.php?error=signup_failed");
    }
} else {
    header("Location: signup.php?error=missing_data");
    exit();
}

?>
