<?php
    require("header.php");

    // Initialisation des variables
    $livres = [];

    // Traitement du formulaire si des données sont soumises
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupération de la requête SQL saisie par l'utilisateur
        $requete = $_POST["requete"];


        // Exécution de la requête
        try {
            $stmt = dbConnect()->query($requete);
            if ($stmt === false) {
                throw new Exception('Erreur dans la requête SQL');
            }
            $_SESSION["requete"] = $requete;
            $livres = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Erreur : " . $e->getMessage();
            exit;
        }
    }
?>

<body>
    <div class="container mt-5">
        <h1 class="titre">Requêtes SQL</h1>

        <!-- Formulaire pour saisir la requête SQL -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="requete">Entrez votre requête SQL :</label>
                    <input type="text" class="form-control" id="requete" name="requete" placeholder="Ex: SELECT * FROM livre WHERE nom = 'La peste'">
            </div>
            <button type="submit" class="btn btn-sm btn-outline-success">Exécuter la requête</button>
        </form>

        <!-- Affichage des résultats de la requête -->
        <div class="row">
            <?php foreach ($livres as $livre): ?>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img src="img/<?= $livre['nom'] ?>.jpg" class="card-img-top" alt="Image de couverture" height="500px">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($livre['nom']) ?></h5>
                            <p class="card-text"><?= htmlspecialchars($livre['auteur']) ?> - <?= htmlspecialchars($livre['dateSortie']) ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</body>
</html>

<?php
    require('footer.php');
?>
