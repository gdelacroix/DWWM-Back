
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<?php
require_once './inc/header.inc.php';

// Récupération de la connexion à la BDD
require_once 'connexion.php';
$db = getConnect();
?>
<section class="container my-5">
    <div class="row">
        <h1 class='text-center mb-5'>Saisir une nouvelle citation</h1>
        <form class="col-6 mx-auto" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div class="mb-3">
              <label for="nom" class="form-label">Nom de l'auteur</label>
              <input type="text" class="form-control" id="nom" name="nom">
            </div>
            <div class="mb-3">
              <label for="prenom" class="form-label">Prénom de l'auteur</label>
              <input type="text" class="form-control" name="prenom" id="prenom">
            </div>
            <!-- Liste des siècles -->
            <div class="mb-3">
                <select class="form-select" name="siecle" id="siecle" aria-label="liste des siècles">
                    <option selected>Liste des siècles</option>
                    <option value="16">XVI</option>
                    <option value="17">XVII</option>
                    <option value="18">XVIII</option>
                    <option value="19">XIX</option>
                    <option value="20">XX</option>
                    <option value="21">XXI</option>
                 </select>
            </div>
            <!-- Zone de saisie citation -->
            <div class="mb-3">
                <label for="citation" class="form-label">Citation</label>
                <textarea class="form-control" id="citation" name="citation" rows="5"></textarea>
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Insérer">
                <a href="index.php" class="btn btn-info float-end">Retour à l'accueil</a>
            </div>
        </form>
    </div>
</section>
<?php
require_once './inc/footer.inc.php';
 ?>