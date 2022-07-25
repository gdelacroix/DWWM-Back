<?php
require_once  '../Include/init.php';

require '../layout/top2.php';
adminSecurity();

// lister les catégories dans un tableau HTML

// le requêtage ici
require __DIR__ .'/../Model/DossSAVModel.php';
$savModel = new ModeleDossierSAV(0);
if (empty($_GET['nomuser']) ){
    $savStatement = $savModel->lireDossier();
}
else{
    
    $savStatement = $savModel->lireDossierViaUser($_GET['nomuser'], $_GET['prenomuser']);
}
$sav = $savStatement->fetchAll();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="dossierSAV.php" method="get">
<input type="search" name="nomuser"></input>
<input type="search" name="prenomuser"></input>
<input type="submit">
</form>
<table class="table_cat th_produits table table-striped">


    <tr>
        <th>ID Dossier</th>
        <th>Status</th>
        <th>description</th>
        <th></th>
        
    </tr>
    <?php
    if (count($sav) > 0){
    foreach ($sav as $item) :
      
    ?>
    <tr>
        <td><?= $item['csf_ID']; ?></td>
        <td><?= $item['csf_status']; ?></td>
        <td><?= $item['csf_description']; ?></td>
        
        <td>
            <a class="btn btn-primary"
               href="produit-edit.php?id=<?= $item['PRD_ID']; ?>">
               Modifier
            </a>
        <a class="btn btn-danger"
               href="produit-delete.php?id=<?= $item['PRD_ID']; ?>" onclick="myFunction()">
               Supprimer
            </a>
        </td>
    </tr>
    
    <?php
    endforeach;
    }
    else{
        echo '<td>table vide</td>';
    }
    ?>
</table>






    
</body>
</html>





















<?php

require __DIR__ . '/../layout/bottom.php';
?>
