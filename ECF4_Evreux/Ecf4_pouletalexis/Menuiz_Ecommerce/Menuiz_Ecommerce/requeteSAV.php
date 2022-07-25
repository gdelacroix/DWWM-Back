<?php


require_once __DIR__ . '/include/init.php';
require __DIR__ .'/layout/top.php';
$query = "SELECT C.*,U.USR_FIRSTNAME as user_name, U.USR_LASTNAME as user_prenom 
FROM T_D_ORDERHEADER_OHR C 
INNER JOIN T_D_USER_USR U ON C.USR_ID = U.USR_ID where c.OHR_NUMBER= '" . $_GET['commande'] ."'";
$stmt = $pdo->prepare($query);
$stmt -> execute();
$commandes = $stmt->fetchAll();




?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    
    , initial-scale=1.0">
    <title></title>
</head>
<body>
    <H1 class="offset-3"> Création de la requête SAV</H1>
<form action="transiSAV.php" method='get'>
<table class="table_cat th_produits table table-striped">
    <tr>
        <th>Numéro de commande</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Date de commande</th>
        <th>Statut</th>
      

    </tr>
    <?php


    foreach ($commandes as $commande) :
     
    ?>
        <tr>
            
            <td><?= $commande['OHR_NUMBER']; ?></td><input type="hidden" name="td_1" value="<?= $commande["OHR_NUMBER"];?>">
            <td><?= $commande['user_name']; ?></td><input type="hidden" name="td_2" value="<?= $commande["user_name"];?>">
            <td><?= $commande['user_prenom']; ?></td><input type="hidden" name="td_3" value="<?= $commande["user_prenom"];?>">
            <td><?= datetimeFR($commande['OHR_DATE']); ?></td><input type="hidden" name="td_4" value="<?= datetimeFR($commande["OHR_NUMBER"]);?>">
    
            <td>
                <?php

                //faire une verif en BDD pour voir si l'id enregistré dans la commande correspond au libellé de la table statuts via son id
                $stm = $pdo->query('select OSS_ID,OSS_WORDING from T_D_ORDERSTATUS_OSS where OSS_ID= ' . $commande['OSS_ID'] . ' ');
                $commande_statut = $stm->fetchAll();

                echo $commande_statut[0]['OSS_WORDING'];
                ?>

            </td><input type="hidden" name="td_5" value= "<?= $commande_statut[0]["OSS_WORDING"]?>">
        </tr>

    <?php
    endforeach;
    ?>
</table>




  <div class="form-group  pt-5  ">
    <label for="exampleFormControlSelect1">Type de requète</label>
    <select class="form-control" id="exampleFormControlSelect1" name="FormSelect">
      <option value="1">N'habite pas à l'adresse indiquée</option>
      <option value="2">Non présent à la livraison</option>
      <option value="3">Erreur client lors de la commande</option>
      <option value="4">Erreur de préparation</option>
      <option value="5">Service après vente</option>
    </select>
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description du problème </label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"  value="tsdDescription" name="tsdDescription" ></textarea>
  </div>
    <input type="submit" class="btn btn-primary>

</form>













</body>
</html>


<?php



require __DIR__ .'/layout/bottom.php';
?>

