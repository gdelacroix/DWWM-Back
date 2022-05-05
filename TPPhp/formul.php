<?php // analyse du formulaire recu :
// init des var
$interet = "" ;// libelle des intérêt utilisateur
$marequ = "insert into Matable values(" ;// partie constante de la requete sql	 

// récup nom et age
$marequ = $marequ . "'" . $_GET["nom"] . "'," . $_GET["age"] . "," ;  

// recup situation maritale (bt radio dans le form)
$marequ = $marequ . "'" . $_GET["marit"] . "'," ;  

// récup du/des centres intérêt utilisateur (checkbox dans le form)
// avec concaténation du libellé intérêts utilisateur
if(isset($_GET["internet"]))
{
	$marequ = $marequ .  "1," ;
	$interet = "Internet," ;
}
else
{
	$marequ = $marequ . "0," ;
} 
	
if(isset($_GET["micro"]))
{
	$marequ = $marequ . "1," ;
	$interet = $interet .  " la micro-informatique," ;
} 
else
{
	$marequ = $marequ . "0," ;
}

if(isset($_GET["jeux"]))
{
	$marequ = $marequ .  "1)"; 
	$interet = $interet . " les jeux vidéo" ;
}	
else
{
	$marequ = $marequ . "0)" ;
}

if ($interet == "" ) { $interet = "rien (dommage...)." ; }
// fin prépration requete sql et du libellé intérêts utilisateur
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Une petite réponse</title>
</head>
<body>
<h2>Merci à vous, <?php echo $_GET["nom"] ; ?>.</h2>
<p>Vous avez donc le bel âge de <b><?php echo $_GET["age"] ; ?></b> ans, 
vous êtes <b><?php echo $_GET["marit"] ; ?></b></p>
<p>et vous vous intéressez à

<b><?php echo $interet ; ?></b>.</p>

<p>Je m'empresse d'envoyer la requête :<br />
<b><?php echo $marequ ; ?><br /></b> à notre base de données.</p>
</body>
</html>
