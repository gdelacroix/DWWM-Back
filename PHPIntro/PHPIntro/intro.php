<?php
$maVariable = 12; // Types : entier, réel, chaîne de caractères
$nom = 'Jojo' . "\n" . $maVariable;

//echo "$nom";

// Tableaux
$notes = [10, 20, 12];
//echo $notes[1];

// Système clé-valeur
$classe = [
    [
        'prenom' => 'John',
        'nom' => 'Snow',
        'notes' => [10, 12, 8, 18]],
    [
        'prenom' => 'Jean',
        'nom' => 'Lanister',
        'notes' => [13, 14, 18, 8]],
    ];


//$eleves['notes'][1] = 16;
//$eleves['notes'][] = 3;
//echo $eleves['prenom'] . ' ' . $eleves['nom'];

$classe[0]['classe'] = 'Terminale';

$x = array_sum($classe[0]['notes']) / count($classe[0]['notes']);
$y = array_sum($classe[1]['notes']) / count($classe[1]['notes']);

echo $classe[0]['prenom'] . ' a ' . $x . ' de moyenne et ' .
$classe[1]['prenom'] . ' a ' . $y . ' de moyenne';

print_r($classe);
?>