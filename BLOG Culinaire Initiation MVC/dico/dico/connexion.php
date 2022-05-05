<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

define("DBHOST", 'localhost');
define("DBUSER", 'root');
define("DBPASS", '');
define("DBNAME", 'dico');

function getConnect(){
    $dsn = 'mysql:host='.DBHOST.';dbname='.DBNAME;    
    $db = new PDO($dsn, DBUSER, DBPASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $db->exec("SET NAMES utf8");
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        
    return $db;
}

