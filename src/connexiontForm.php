<div class="modal fade" id="connexionModal" tabindex="-1" role="dialog" aria-labelledby="connexionModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="connexionModalLabel">Connexion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="formConnexion" action="login.php" method="POST">
          <div class="form-group">
            <label for="username">Nom d'utilisateur</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Nom d'utilisateur">
          </div>
          <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">

          </div>
          <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>


        <form id="formInscription" action="signup.php" method="POST" class="d-none">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="newUsername">Nom d'utilisateur</label>
            <input type="text" class="form-control" id="newUsername" name="newUsername" placeholder="Nom d'utilisateur">
        </div>
        <div class="form-group">
            <label for="newPassword">Mot de passe</label>
            <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Mot de passe">
        </div>
        <div class="form-group">
            <label for="confirmPassword">Confirmez le mot de passe</label>
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirmez le mot de passe">
        </div>
        <button type="submit" class="btn btn-primary">S'inscrire</button>
        </form>
        <button type="button" class="btn btn-link" onclick="showInscriptionForm()">Pas encore inscrit ? S'inscrire ici.</button>

      </div>
    </div>
  </div>
</div>

<script>
function showInscriptionForm() {
    document.getElementById('formConnexion').classList.add('d-none');
    document.getElementById('formInscription').classList.remove('d-none');
}
</script>
