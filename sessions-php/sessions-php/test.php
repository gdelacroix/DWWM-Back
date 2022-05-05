<?php
$nom = $_POST['nom'];
$age = $_POST['age'];
$situation = $_POST['situation'];

$interets='';

if (isset($_POST['jeux'])) {
    $interets .= 'jeux vidéos';
}
if (isset($_POST['internet'])) {
    $interets .= 'internet';
}



echo "<h1>Merci à vous $nom</h1>";
echo "vous avez $age ans, vous êtes $situation et vous intéressez à $interets";