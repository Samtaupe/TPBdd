<?php
unset($_SESSION['user_logged_in']);
$_SESSION['user_logged_in']=false;
header("Location: index.php");
exit();
?>
