<?php
    require("header.php");
    try {
        $query = "SELECT * FROM livre WHERE disponible = 1 ORDER BY id DESC LIMIT 3";
        $stmt = dbConnect()->query($query);
        enregistrerRequete($query);

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

        <div class="intro-text mb-4 px-4 border">
            <h1 class="mb-3 text-center display-4">Enoncé du TP</h1>
            <p>Bienvenue sur ce mini TP conçu pour vous introduire au fonctionnement des bases de données. À travers ce site, vous pourrez explorer les différentes fonctionnalités liées à la gestion d'une bibliothèque, telles que l'affichage des derniers livres ajoutés, l'emprunt de livres, et plus encore. C'est une opportunité d'apprendre comment les applications web interagissent avec les bases de données pour stocker, récupérer et manipuler des données.</p>
            <p>Dans un premier temps, vous pouvez vous familliariser avec le site, après avoir fait le tour de ce qui est possible de faire, vous serez invité à effectué de petites requêtes SQL similaires à celles effectuées pour ce site. Cela vous permettra de visualisé plus simplement la gestion des données et le rôle et utilisation des bases de données</p>
        </div>
        
        <h2 class="mb-3">Derniers livres ajoutés</h2>
        <div class="row">
            <?php foreach ($livres as $livre): ?>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img src="img/<?=htmlspecialchars($livre['nom'])?>.jpg" class="card-img-top" alt="Image de couverture" height="500">
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
