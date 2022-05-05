<?php
require_once './inc/header.inc.php';

// Récupération de la connexion à la BDD
require_once 'connexion.php';
$db = getConnect();
?>

<section class="container my-5">
    <div class="row">
        <div class="col-6 mx-auto">
            <h1 class="text-center">Citation du jour</h1>
            <?php
                $sqlrand = "SELECT * FROM citation, auteurs WHERE idauteur = auteurid GROUP BY RAND()";
                $requetCit = $db->query($sqlrand);
                $citation = $requetCit->fetch();
                
  
                echo "<p class=text-center>".$citation['texte']."</p>";
                echo "<p class='fst-italic text-end'>".$citation['prenom']." ".$citation['nom']."</p>";

            ?>
        </div>
    </div>
</section>

<section class="container my-5">
    <div class="row">
        <form class="col-6 mx-auto" method="POST" action="affichecit.php">
          <fieldset>
            <legend>Rechercher dans les citations</legend>
            <div class="mb-3">
              <label for="saisie" class="form-label">Saisissez un mot :</label>
              <input type="text" id="saisie" name="saisie" class="form-control" placeholder="Votre recherche...">
            </div>
            <div class="mb-3">
                <select class="form-select" name="auteurs" aria-label="liste des auteurs">
                    <option selected>Liste des auteurs</option>
                    <?php
                                            
                        // Création requête SQL
                        $sql = "SELECT idauteur, nom, prenom FROM auteurs";
                        
                        // Exécution de la requête SQL
                        $requete = $db->query($sql);
                        
                        // Récupération des données
                        $auteurs = $requete->fetchAll();
                        
                        // Affichage des données
                        foreach ($auteurs as $value):
                            echo"<option value=".$value['idauteur'].">".$value['prenom']." ".$value['nom']."</option>";
                        endforeach;                        
                    ?>
                 </select>
            </div>
            <!-- Liste des siècles -->
            <div class="mb-3">
                <select class="form-select" name="siecle" aria-label="liste des siècles">
                    <option selected>Liste des siècles</option>
                    <option value="16">XVI</option>
                    <option value="17">XVII</option>
                    <option value="18">XVIII</option>
                    <option value="19">XIX</option>
                    <option value="20">XX</option>
                    <option value="21">XXI</option>
                 </select>
            </div>
            <!-- Boutons radio de tri -->
            <div class="mb-3">
                <input class="form-check-input" type="radio" name="tri" value="auteur" checked>
                <label class="form-check-label" for="auteur">Auteur</label>
                
                <input class="form-check-input" type="radio" name="tri" value="siecle">
                <label class="form-check-label" for="siecle">Siècle</label>
            </div>
            <div class="mb-3">
                <input type="submit" name="sub" value="Rechercher"/>
                <a href="saisiecit.php" class="btn btn-info float-end">Saisir nouvelle citation</a>
            </div>
          </fieldset>
        </form>
    </div>
</section>

<?php
require_once './inc/footer.inc.php';
 ?>
        
