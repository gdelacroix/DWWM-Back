<?php
session_start();
$_SESSION['nom'] = $_GET['nom'];
echo $_SESSION['nom'];
//header('Location: loginsuite.php');