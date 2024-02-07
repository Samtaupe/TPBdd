<?php
require('header.php');  
$user_id = $_SESSION['user_id'];

$connexion = dbconnect();

$stmt = $connexion->prepare("
    SELECT livre.id, livre.nom, livre.auteur, livre.dateSortie
    FROM emprunt
    JOIN livre ON emprunt.fkLivre = livre.id
    WHERE emprunt.fkLecteur = ? 
");

$stmt->execute([$user_id]);
$livresEmpruntes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<div class="container mt-5">
        <h1 class="titre">Livres Empruntés</h1>
        <div class="row">
            <?php if(count($livresEmpruntes)==0): ?>
                <h2 class="display-4">Vous n'avez emprunté aucun livre.</h2>
            <?php endif;?>
            <?php foreach ($livresEmpruntes as $livre): ?>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img src="img/<?=$livre['nom']?>.jpg" class="card-img-top" alt="Image de couverture" height="500px">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($livre['nom']) ?></h5>
                        <p class="card-text"><?= htmlspecialchars($livre['auteur']) ?> - <?= htmlspecialchars($livre['dateSortie']) ?></p>
                        <?php if (isset($_SESSION['user_logged_in'])): ?>
                        <div class="d-flex justify-content-between align-items-center">

                            <div class="btn-group">
                                <form action="rendre.php" method="POST">
                                    <input type="hidden" name="livre_id" value="<?php echo $livre['id']; ?>">
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Rendre le livre</button>
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
<?php require("footer.php")?>
