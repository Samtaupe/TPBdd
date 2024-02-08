<?php
session_start();
require("connector.php");

if (isset($_POST['livre_id'])) {
    $livre_id = $_POST['livre_id'];
    $user_id = $_SESSION['user_id'];

    $connexion = dbconnect();

    $query = "DELETE FROM emprunt WHERE emprunt.fkLecteur = ? AND emprunt.fkLivre= ?";
    $stmt = $connexion->prepare($query);
    enregistrerRequete($query);
    $success = $stmt->execute([$user_id, $livre_id]);

    if ($success) {
        $update = $connexion->prepare("UPDATE livre SET disponible = 0 WHERE id = ?");
        $update->execute([$livre_id]);
    }
} 

header("Location: livre_emprunt.php");
exit();
?>