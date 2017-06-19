<?php
  session_start();
  unset($_SESSION['carrinho:produtos']);
  header("Location: indexcontroller.php");
?>
