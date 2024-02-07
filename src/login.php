
<?php
require("connector.php");
if(isset($_POST["username"]) && isset($_POST["password"])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $connextion = dbconnect();

    $stmt = $connextion->prepare("SELECT * FROM lecteur WHERE pseudo = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();
    
    if ($user && password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['user'] = $user['username'];
        session_start();
        header("Location: index.php"); 
        $_SESSION['user_logged_in'] = true;
    } else {
        exit();
    }

}else{
    header("Location: index.php");
    exit();
}
?>
<div id="flashMessage" class="alert alert-success" role="alert" style="display: none;">
    <p>Vous êtes bien connecté</p>
</div>

<script>
window.onload = function() {
    // Vérifiez si le message existe et affichez-le
    <?php if (isset($_SESSION['flash_message'])): ?>
        document.getElementById('flashMessage').style.display = 'block';
        document.getElementById('flashMessage').textContent = '<?php echo $_SESSION['flash_message']; ?>';
        setTimeout(function() {
            document.getElementById('flashMessage').style.display = 'none';
        }, 5000); // Le message disparaît après 5 secondes
        <?php unset($_SESSION['flash_message']); ?>
    <?php endif; ?>
};
</script>
<?php exit(); ?>