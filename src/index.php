<?php
    require("header.php");
    try {
        $stmt = dbConnect()->query("SELECT * FROM livre WHERE disponible = 0 order by id desc limit 3");
        if ($stmt === false) {
            throw new Exception('Erreur dans la requête SQL');
        }
        $livres = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage();
        exit;
    }
?>
<body>


    <div class="container mt-5">
        <h1 class="mb-4 text-center">Bienvenue à la Bibliothèque de l'IUT</h1>
        <h2 class="mb-3">Derniers livres ajoutés</h2>
        <div class="row">
            <?php foreach ($livres as $livre): ?>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img src="img/<?=$livre['nom']?>.jpg" class="card-img-top" alt="Image de couverture" height="500">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($livre['nom']) ?></h5>
                        <p class="card-text"><?= htmlspecialchars($livre['auteur']) ?> - <?= htmlspecialchars($livre['dateSortie']) ?></p>
                        <div class="d-flex justify-content-between align-items-center">
                        </div>
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