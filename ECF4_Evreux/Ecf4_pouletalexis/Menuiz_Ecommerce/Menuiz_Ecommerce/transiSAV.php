<?php 
require 'Model/dossSAVModel.php';
require 'model/userModel.php';
$savModel = new ModeleDossierSAV(0);
$userModel = new ModeleUser(0);
$userid = $userModel -> recupUserByNomPrenom($_GET['td_3'], $_GET['td_2']);
$savModel -> InsertDossier($_GET['FormSelect'],$_GET['tsdDescription'],$userid['USR_ID'],'NULL','NULL','NULL','NULL');





header('Location:index.php');
?>