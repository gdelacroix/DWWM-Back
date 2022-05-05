<?php

require 'modele.php';
try {
   $recipes = threeLastRecipes();
   $comments = threeLastComments();
   require 'vueAccueil.php';
} // fin de try
catch (Exception $e) {
    $msgErreur = $e->getMessage();
    require 'vueErreur.php';
}