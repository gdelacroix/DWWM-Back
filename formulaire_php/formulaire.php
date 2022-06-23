<?php
if($_POST) {
if($_POST['nom']!='') {
echo "<br /><br />Bonjour " . $_POST['titre'] . " " . $_POST['nom'] . "!<br />";
echo "Je peux vous appeler " . $_POST['prenom'] . "?<br /><br />";

if(isset($_POST['bDebutant'])) {
echo "C'est une bonne idée de commencer à apprendre à programmer en PHP !<br /><br />";
}
else {
if($_POST['sexe']=='H') {
$mot = "débutant";
}
else {
$mot = "débutante";
}
echo "Comme vous n'êtes pas " . $mot . " inutile de vous expliquer ce qu'est l'algorithmie<br /><br />";
}
}
}
?>