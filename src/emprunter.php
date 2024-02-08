<?php
session_start();
require("connector.php");

if (isset($_POST['livre_id'])) {
    $livre_id = $_POST['livre_id'];
    $user_id = $_SESSION['user_id'];

    $connexion = dbconnect();

    $query = "INSERT INTO emprunt (fkLecteur, fkLivre) VALUES (?, ?)";
    $stmt = $connexion->prepare($query);
    enregistrerRequete($query);
    $success = $stmt->execute([$user_id, $livre_id]);

    if ($success) {
        $query = "UPDATE livre SET disponible = 0 WHERE id = ?";
        $update = $connexion->prepare($query);
        enregistrerRequete($query);
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
