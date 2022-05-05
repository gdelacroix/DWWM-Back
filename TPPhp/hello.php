<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Une boucle for next pour dire Bonjour au monde</title>
</head>
<body>
<?php for ($i = 3; $i <= 7; $i++)
{
	echo '<font size="' . $i . "\">Hello World !</font><br />\n";   // syntaxe classique
	echo "<font size=\"$i\">Hello World !</font><br />\n";		   // synataxe PHP avec concaténation implicite
	//echo "<font size=$i>Hello World !</font><br />\n';		   // ne fonctionne pas car PHP n'interprète pas la chaîne entre simples cotes
	
}
print ("<hr />\n");    // ou echo  "<hr />\n";
?> 

<?php
// variante avec insertion des parties variables dans les balises HTML
// moins lisible mais même résultat
for ($i = 5 ; $i >= 1; $i--)
{ 
?>
	<h<?php echo  $i; ?>>Hello World !</h<?php echo $i; ?> > 
<?php
} 
?> 
... et la suite de la page Web...
</body>
</html>


