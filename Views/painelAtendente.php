<?php
session_start();
require '../Model/init.php';
require '../controllers/check.php';
include ('headerAtendente.php');
?>
 
     <h3>Olá, <?php echo $_SESSION['user_name']; ?> . Seja Bem Vindo</h3>

<?php include ('footer.php'); ?>