<?php
session_start();
require("connector.php");

if (isset($_POST['livre_id'])) {
    $livre_id = $_POST['livre_id'];
    $user_id = $_SESSION['user_id'];

    $connexion = dbconnect();

    $stmt = $connexion->prepare("INSERT INTO emprunt (fkLecteur, fkLivre) VALUES (?, ?)");
    $success = $stmt->execute([$user_id, $livre_id]);

    if ($success) {
        $update = $connexion->prepare("UPDATE livre SET disponible = 1 WHERE id = ?");
        $update->execute([$livre_id]);

        $_SESSION['flash_message'] = "Vous avez emprunté le livre avec succès.";
    } else {
        $_SESSION['flash_message'] = "Erreur lors de l'emprunt.";
    }
} else {
    $_SESSION['flash_message'] = "Informations de livre manquantes.";
}

header("Location: catalogue.php");
exit();
?>
