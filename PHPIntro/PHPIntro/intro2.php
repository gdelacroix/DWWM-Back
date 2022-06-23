<?php

/*
$note = (int)readline("Entrez votre note\n");
switch ($note) {
    case 10 :
        echo 'Vous avez juste la moyenne';
        break;
    default :
        echo 'Expression par défaut';
    
}
*/


/*
if ($note < 10) {
    echo 'Vous n\'avez pas la moyenne';
} elseif ($note === 10) {
    echo 'Vous avez juste la moyenne';
} else {
    echo 'Vous avez la moyenne';
}
*/

/*
VRAI && VRAI = VRAI
VRAI && FAUX = FAUX
FAUX && FAUX = FAUX

VRAI || VRAI = VRAI
VRAI || FAUX = VRAI
FAUX || FAUX = FAUX
*/


// TABLEAUX
$creneaux = [[8, 12], [14, 18]];


$creneau = (int)readline("Entrez une heure :\n");
if (($creneau >= 8 && $creneau <= 12) || ($creneau >= 14 && $creneau <= 18)) {
    echo 'Le magasin sera ouvert';
} else {
    echo 'Le magasin sera fermé';
}


// BOUCLES
$chiffre = null;
while ($chiffre !== 5) {
    $chiffre = (int)readline("Entrez un chiffre entre 1 et 10\n");
}
echo 'Bravo, le chiffre à trouver était 5';



for ($i = 0; $i < 10; $i++) {
    echo $i;
}


print_r($creneaux);

$notes = [12, 13, 15];
foreach ($notes as $k => $note) {
    echo $note;
}