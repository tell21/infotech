<?php
session_start();
echo $_SESSION['boleto'];

unset($_SESSION['boleto']);
?>
