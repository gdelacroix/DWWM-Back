<?php
// page de controle de login 
// page "aveugle" qui mémorise les var de session et redirige vers le menu
session_start();
$_SESSION["usrnom"] = $_POST["nom"];
header("location:loginsuite.php") ;
?>


