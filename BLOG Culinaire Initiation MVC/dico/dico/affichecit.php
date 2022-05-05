<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
require_once './inc/header.inc.php';
require_once 'connexion.php';
$db = getConnect();


// Vérification du mot clé
// Vérification du mot clé + auteur
// Vérification du mot clé + siècle

if(isset($_POST['saisie'])){
    $saisie = '%'.$_POST['saisie'].'%';
    $sql = "SELECT * FROM citation LEFT JOIN auteurs ON auteurid = idauteur WHERE texte LIKE :toto  ";
    if(isset($_POST['auteurs'])){
        $auteur = $_POST['auteurs'];
        $sql = "";
    }
    if(isset($_POST['siecle'])){
        $siecle = $_POST['siecle'];
        $sql = "";
    }
} 

$tri    = $_POST['tri'];



$sth = $db->prepare($sql);
$sth->bindParam(':toto', $saisie, PDO::PARAM_STR);
$sth->execute();

$count = $sth->rowCount();

if($count==0){
    echo 'Il n\'y a pas de citation pour votre mot clé';
} else {
    $result = $sth->fetchAll();
    echo "il y a $count citation(s)"."<br>";
    foreach ($result as $value) {
        echo $value['texte']."<br>";
        echo $value['prenom']." ".$value['nom']."<br>";
    }

}







require_once './inc/footer.inc.php';
