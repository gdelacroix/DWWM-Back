<?php

define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASS", "");
define("DBNAME", "bdd_blog_culinaire");


function threeLastRecipes(){
    $db = getBdd();
    $threeLastRecipesQuery = "SELECT rec_id, rec_resume, rec_miniature FROM t_recipe ORDER BY rec_id DESC LIMIT 3";
    $threeLastQuery = $db->query($threeLastRecipesQuery);
    $recipes = $threeLastQuery->fetchAll();

    return $recipes;

}

function threeLastComments(){
   
    $db = getBdd();
    $threeLastCommentsQuery = "SELECT com_auteur, com_contenu, rec_nom FROM t_comment LEFT JOIN t_recipe ON rec_id = id_rec ORDER BY com_id DESC LIMIT 3";
    $threeLastComQuery = $db->query($threeLastCommentsQuery);
    $comments = $threeLastComQuery->fetchAll();

    return $comments;
}


function getBdd() {    
    $dsn = 'mysql:host='.DBHOST.';dbname='.DBNAME;    
    $db = new PDO($dsn, DBUSER, DBPASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $db->exec("SET NAMES utf8");
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        
    return $db;
}