<?php

session_start();
$nom = $_SESSION['nom'];
session_destroy();

if (!empty($nom)) {
    echo "Au menu du jour pour vous, ".$nom;
    echo"<ul><li>sommaire</li><li>Et aussi</li><li>Et encore</li></ul>";
} else {
    echo "<h1>ERREUR LOGIN , vous n'avez pas accès à ce site</h1>";
    echo '<a href="login.html">Retour à la page d\'accueil</a>';
}

