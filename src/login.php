<?php
require("connector.php");
if(isset($_POST["username"]) && isset($_POST["password"])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $connexion = dbconnect();

    $stmt = $connexion->prepare("SELECT * FROM lecteur WHERE pseudo = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();
    
    if ($user && password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_logged_in'] = true;
        header("Location: index.php");
        exit();
    } else {
        header("Location: index.php?error=invalid_credentials");
        exit();
    }
}else{
    header("Location: index.php?error=missing_credentials");
    exit();
}
?>
