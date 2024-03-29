<?php
    require('header.php');
    require("getListe.php");
    if (isset($_SESSION['flash_message'])) {
        echo '<div class="alert alert-success" role="alert">' . $_SESSION['flash_message'] . '</div>';
        unset($_SESSION['flash_message']);
    }

?>
<body>
    <div class="container mt-5">
        <h1 class="titre">Catalogue des livres</h1>
        <div class="row">
            <?php if(count($livres)==0): ?>
                <h2 class="display-4">Aucun livre de disponible 😭</h2>
            <?php endif;?>
            <?php foreach ($livres as $livre): ?>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img src="img/<?=$livre['nom']?>.jpg" class="card-img-top" alt="Image de couverture" height="500px">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($livre['nom']) ?></h5>
                        <p class="card-text"><?= htmlspecialchars($livre['auteur']) ?> - <?= htmlspecialchars($livre['dateSortie']) ?></p>
                        <?php if (isset($_SESSION['user_logged_in'])): ?>
                        <div class="d-flex justify-content-between align-items-center">

                            <div class="btn-group">
                                <form action="emprunter.php" method="POST">
                                    <input type="hidden" name="livre_id" value="<?php echo $livre['id']; ?>">
                                    <button type="submit" class="btn btn-sm btn-outline-secondary">Emprunter</button>
                                </form>

                            </div>
                            
                        </div>
                        <?php endif; ?>
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