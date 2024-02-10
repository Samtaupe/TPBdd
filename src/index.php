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
        <div class="intro-text mb-4 px-4 border">
            <h1 class="mb-3 text-center display-4">Enoncé du TP</h1>
            <p>Bienvenue sur ce mini TP conçu pour vous introduire au fonctionnement des bases de données. À travers ce site, vous pourrez explorer les différentes fonctionnalités liées à la gestion d'une bibliothèque, telles que l'affichage des derniers livres ajoutés, l'emprunt de livres, et plus encore. C'est une opportunité d'apprendre comment les applications web interagissent avec les bases de données pour stocker, récupérer et manipuler des données.</p>
            <p>Dans un premier temps, vous pouvez vous familiariser avec le site ; après avoir fait le tour de ce qui est possible de faire, vous serez invité à effectuer de petites requêtes SQL similaires à celles effectuées pour ce site. Cela vous permettra de visualiser plus simplement la gestion des données et le rôle et l'utilisation des bases de données.</p>
        </div>

        <div class="intro-text mb-4 px-4 border">
            <h1 class="mb-3 text-center display-4">Quelques définitions</h1>
            <h2 class = "card-title">Base de données</h2>
            <p>Une base de données est un système organisé pour stocker, gérer et récupérer des informations. Elle permet de conserver de vastes quantités de données de manière structurée afin de faciliter la recherche et la manipulation de ces informations. Les bases de données sont cruciales pour diverses applications, allant des sites web aux systèmes bancaires, en passant par les réseaux sociaux et bien plus. Elles peuvent être relationnelles, où les données sont organisées en tables reliées entre elles par des relations, ou non relationnelles (NoSQL), conçues pour stocker des données de manière plus flexible.</p>
            <h2 class = "card-title">Requête</h2>    
            <p>Une requête est une instruction ou un ensemble d'instructions envoyées à la base de données pour effectuer une opération sur les données. Ces opérations peuvent inclure la récupération de données (SELECT), l'insertion de nouvelles données (INSERT), la mise à jour de données existantes (UPDATE) ou la suppression de données (DELETE). Les requêtes permettent d'interagir avec la base de données pour extraire les informations nécessaires, modifier les données stockées, ou gérer la structure de la base de données elle-même.</p>
            <h2 class = "card-title">Entité</h2>    
            <p>Dans le contexte des bases de données relationnelles, une entité fait généralement référence à un objet du monde réel qui peut être identifié de manière unique et dont les informations sont stockées dans la base de données. Chaque entité est représentée par une table dans la base de données, et chaque ligne de cette table représente une instance ou un enregistrement de l'entité. Par exemple, dans une base de données gérant une bibliothèque, vous pourriez avoir des entités telles que "Livre", "Auteur", et "Emprunteur".</p>
            <h2 class = "card-title">Association</h2>    
            <p>Une association désigne la relation entre deux entités dans une base de données. Elle spécifie comment les instances de ces entités se rapportent les unes aux autres. Dans les bases de données relationnelles, les associations sont souvent représentées par des clés étrangères qui lient les enregistrements d'une table à ceux d'une autre. Par exemple, une association peut lier des livres à des auteurs, où chaque livre peut être associé à un ou plusieurs auteurs, et chaque auteur peut être lié à plusieurs livres. Les associations peuvent être de différents types, tels que "un-à-un", "un-à-plusieurs", ou "plusieurs-à-plusieurs", en fonction de la nature de la relation entre les entités.</p>
            
        </div>

        
        
        <h2 class="mb-3">Exemple de requête :</h2>
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
