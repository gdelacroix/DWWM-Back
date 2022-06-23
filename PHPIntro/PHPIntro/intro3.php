<?php

$creneaux = [];
while (true) {
    $debut = (int)readline('Entrez l\'heure d\'ouverture : ');
    $fin = (int)readline('Entrez l\'heure de fermeture : ');
    if ($debut > $fin) {
        echo "Le créneau ne peut être enregistré car l'heure d'ouverture ({$debut}h) est 
        supérieure à l'heure de fermeture ({$fin}h)\n";
    } else {
        $creneaux[] = [$debut, $fin];
        $action = readline('Voulez-vous enregistrer un nouveau créneau ? (o/n) : ');
        if ($action === 'n') {
            break;
        }
    }

}

var_dump($creneaux);