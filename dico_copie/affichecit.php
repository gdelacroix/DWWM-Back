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

$submit     = $_POST['sub'];
$keyword    = $_POST['saisie'];
$auteur     = isset($_POST['auteur'])? $_POST['auteur'] : false;
$siecle     = isset($_POST['siecle'])? $_POST['siecle'] : false;
$tri        = $_POST['tri'];

//$sth = NULL;


if(isset($submit)){    
    $word = '%'.$keyword.'%';
    if($auteur != "Liste des auteurs" and $siecle == false){        
        $sql = "SELECT * FROM citation LEFT JOIN auteurs ON auteurid = idauteur WHERE texte LIKE :keyword AND idauteur = :id";
        $sth = $db->prepare($sql);
        $sth->bindParam(':keyword', $word, PDO::PARAM_STR);
        $sth->bindParam(':id', $auteur, PDO::PARAM_INT);
        $sth->execute();
        $count = $sth->rowCount();
    } elseif ($auteur == false and $siecle != "Liste des siècles") {
        $sql = "SELECT * FROM citation LEFT JOIN auteurs ON auteurid = idauteur WHERE texte LIKE :keyword AND siecle = :century";
        $sth = $db->prepare($sql);
        $sth->bindParam(':keyword', $word, PDO::PARAM_STR);
        $sth->bindParam(':century', $siecle, PDO::PARAM_INT);
        $sth->execute();
        $count = $sth->rowCount();
    } else{
        $sql = "SELECT * FROM citation LEFT JOIN auteurs ON auteurid = idauteur WHERE texte LIKE :keyword";
        $sth = $db->prepare($sql);
        $sth->bindParam(':keyword', $word, PDO::PARAM_STR);
        $sth->execute();
        $count = $sth->rowCount();
    }

    
}?>

<section class="container my-5">
    <div class="row">
        
        <?php
        if($count==0){
            echo 'Il n\'y a pas de citation pour votre mot clé';
        } else {
            $result = $sth->fetchAll();
            echo "<h1 class='text-center mb-5'>il y a $count citation(s) pour votre mot clé $keyword"."</h1><br>";
            echo '<div class="col-md-6 mx-auto">';
            foreach ($result as $value) {
                echo $value['texte']."<br>";
                echo "<span class='fst_italic'>".$value['prenom']." ".$value['nom']."</span><br>";
                echo "<hr>";
            }
            echo'</div>';

        }?>
        
    </div>
</section>


<?php require_once './inc/footer.inc.php'; ?>
