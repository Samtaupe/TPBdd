<?php
    require('header.php');
    require("getListe.php");
?>
<body>
    <div class="container mt-5">
        <h1 class="titre">Catalogue des livres</h1>
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