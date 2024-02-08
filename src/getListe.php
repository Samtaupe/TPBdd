<?php

try {
    $stmt = dbConnect()->query("SELECT * FROM livre WHERE disponible = 1");
    if ($stmt === false) {
        throw new Exception('Erreur dans la requête SQL');
    }
    $livres = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
    exit;
}

?>