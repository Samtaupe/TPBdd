<?php
    require("connector.php");
    require("connexiontForm.php");
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<header>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliothèque IUT</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="https://iutsd.univ-lorraine.fr">Bibliothèque IUT</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="catalogue.php">Catalogue</a>
                </li>
                
                <?php if (isset($_SESSION['user_logged_in'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="livre_emprunt.php">Mes livres</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Déconnexion</a>
                    </li>

                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#connexionModal">Connexion</a>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link" href="affRequete.php">Requêtes SQL</a>
                </li> 

            </ul>
        </div>
    </nav>
</header>
<div id="loginModal" class="modal">
  
  <form id="loginForm" class="modal-content animate" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <div class="dlgheadcontainer">
          <span onclick="document.getElementById('loginModal').style.display='none'" class="close" title="Close Modal">&times;</span>
              <h1>Log-in !</h1>
      </div>

      <div class="dlgcontainer">
          <label for="uname"><b>Username</b></label>
          <input type="text" placeholder="Enter Username" name="login" id="login" required>

          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="password" id="password" required>
              
          <button type="submit" class="okbtn">Login</button>
          <button type="button" onclick="document.getElementById('loginModal').style.display='none'" class="cancelbtn">Cancel</button>

      </div>

  </form>
</div>