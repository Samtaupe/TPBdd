<?php
    require('header.php');
    require("getListe.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue - Bibliothèque IUT</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Catalogue des livres</h1>
        <div class="row">
            <?php foreach ($livres as $livre): ?>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img src="img/<?=$livre['nom']?>.jpg" class="card-img-top" alt="Image de couverture" height="500px">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($livre['nom']) ?></h5>
                        <p class="card-text"><?= htmlspecialchars($livre['auteur']) ?> - <?= htmlspecialchars($livre['dateSortie']) ?></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">Emprunter</button>
                            </div>
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