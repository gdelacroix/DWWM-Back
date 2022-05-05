<?php
session_start();
foreach ($_GET as $key => $value) {
	$get[$key] = trim(strip_tags($value));
}

if(isset($get['name']) AND !empty($get['name'])) {
	mkdir($_SERVER['CONTEXT_DOCUMENT_ROOT']."/".$get['name']);
	$index = fopen($_SERVER['CONTEXT_DOCUMENT_ROOT']."/".$get['name']."/index.php", "w+");
	$contenu = "<!DOCTYPE html>\n";
	$contenu .= "<html>\n";
	$contenu .= "	<head>\n";
	$contenu .= "		<title>Index</title>\n";
	$contenu .= "	</head>\n";
	$contenu .= "	<body>\n";
	$contenu .= "		Contenu\n";
	$contenu .= "	</body>\n";
	$contenu .= "</html>";
	fwrite($index, $contenu);
}
?>