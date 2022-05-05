<?php
// page de menu qui teste l'existence des var de session 
// et affiche soit le menu soit un message d'erreur 
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>
<?php // titre page variable
if (!(isset($_SESSION["usrnom"])))
{
	echo "ERREUR login !";
}
else
{
	echo "Au menu...";
}
?>
</title>
<?php 
if (!(isset($_SESSION["usrnom"]))) // erreur authentification
{
	// refresh auto vers le login en cas d'erreur
	//echo "<meta http-equiv=\"refresh\" content=\"3;URL=login.htm\">";
	// pourrait aussi bien etre réalisé par l'instruction PHP : header("refresh:...");
}
?>

</head>
<body>
<?php // cas d'erreur ==> retour vers login.htm
if (!(isset($_SESSION["usrnom"])))
{ 
?>
<h1> ERREUR login : vous n'avez pas droit d'accès à ce site</h1>
<p><a href="login.htm">Retour à la page d'accueil</a></p>
<?php 
}
else // authentification OK ==> menu
{ 
?>
<h1>Au menu du jour pour vous, <?php echo $_SESSION["usrnom"]; ?>...</h1>
<ul>
	<li><a href="../">Sommaire</a></li>
	<li>Et aussi...</li>
	<li>Et encore...</li>
	<li>Et pour finir...</LI>
</ul>
<?php
}
?>
</body>
</html>
