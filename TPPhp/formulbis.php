<?php // analyse du formulaire recu :
// init des var
$interet = "" ;// libelle des intérets utilisateur
$marequ = "insert into Matable values(" ;// partie constante de la requete sql	 

// récup nom et age
$marequ = $marequ . "'" . $_GET["nom"] . "'," . $_GET["age"] . "," ;  

// recup situation maritale (bt radio dans le form)
$marequ = $marequ . "'" . $_GET["marit"] . "'," ;  

// récup du/des centres intéret utilisateur (checkbox dans le form)
// avec concaténation du libellé intérets utilisateur
if(isset($_GET["interet"])) // au moins une case est cochée
{

	foreach ($_GET["interet"] as $item)
	{
		if ($item == "internet")
		{
			// case Internet a été cochée
			
			
		}
		else if ($item == "micro")
		{
			// case Micro-informatique a été cochée
			
		}
		else if (...)
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
	$interet = $interet . " les jeux vid�o" ;
}	
else
{
	$marequ = $marequ . "0)" ;
}

if ($interet == "" ) { $interet = "rien (dommage...)." ; }
// fin préparation requete sql et libellé intérets utilisateur
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
Vous avez donc le bel âge de <b><?php echo $_GET["age"] ; ?></b> ans, 
vous êtes <b><?php echo $_GET["marit"] ; ?></b><br />
et vous vous intéressez à 

<b><?php echo $interet ; ?></b>.<br /><br />

Je m'empresse d'envoyer la requête :<br />
<b><?php echo $marequ ; ?><br /></b> à notre base de données.
</body>
</html>
