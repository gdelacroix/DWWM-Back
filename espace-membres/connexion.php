<?php
//on inclue un fichier contenant nom_de_serveur, nom_bdd, login et password d'accès à la bdd mysql
include ("connect.php");
//on vérifie que le visiteur a correctement saisi puis envoyé le formulaire
if (isset($_POST['connexion']) && $_POST['connexion'] == 'Connexion') {
if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['pwd']) && !empty($_POST['pwd']))) {
//on se connecte à la bdd
try{
    $connexion = new PDO (SERVEUR, LOGIN, MDP);    
}
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
    } 

if (!$connexion) {echo "LA CONNEXION AU SERVEUR MYSQL A ECHOUE\n"; exit;}

$sql = 'SELECT * FROM T_D_USER_USR WHERE USR_MAIL="'.$_POST['login'].'" 
AND USR_PASSWORD="'.md5($_POST['pwd']).'"';
$UserStatement = $mysqlConnection->prepare($sql);

        $UserStatement->execute();
        $Users = $UserStatement->fetchAll();


        $count = $Users->rowCount();
// si on obtient une réponse, alors l'utilisateur est un membre
//on ouvre une session pour cet utilisateur et on le connecte à l'espace membre
if ($count == 1){
session_start();
$_SESSION['login'] = $_POST['login'];
header('Location: espace-membre.php');
exit();}
//si le visiteur a saisi un mauvais login ou mot de passe, on ne trouve aucune réponse
elseif ($count == 0) {
$erreur = 'Login ou mot de passe non reconnu !';echo $erreur; 
echo"<br/><a href=\"accueil.php\">Accueil</a>";exit();}
// sinon, il existe un problème dans la base de données
else {
$erreur = 'Plusieurs membres ont<br/>les memes login et mot de passe !';echo $erreur; 
echo"<br/><a href=\"accueil.php\">Accueil</a>";exit();}}
else {
$erreur = 'Errreur de saisie !<br/>Au moins un des champs est vide !'; echo $erreur; 
echo"<br/><a href=\"accueil.php\">Accueil</a>";exit();}}
