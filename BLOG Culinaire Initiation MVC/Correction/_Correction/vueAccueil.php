<?php $titre = "Blog Culinaire"; ?>

<?php ob_start(); ?>
      <!-- Affichage info seule -->
      <div class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
          <div class="col-10 col-sm-8 col-lg-6">
            <img src="Contenu/img/pizza.jpg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
          </div>
          <div class="col-lg-6">
            <h1 class="display-5 fw-bold lh-1 mb-3">Comment réussir une vraie pizza italienne</h1>
            <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam ipsa eos debitis laudantium nisi soluta adipisci natus impedit voluptate voluptatibus necessitatibus maiores itaque quae architecto, repudiandae omnis laboriosam quasi nesciunt?</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
              <button type="button" class="btn btn-light btn-lg px-4 me-md-2">Consulter la recette</button>            </div>
          </div>
        </div>
      </div>

      <!-- -->
      <div class="container col-xxl-8 px-4 py-5">
          <h1 class="display-5 fw-bold text-center line"><span>Les recettes de saison... </span></h1>
          <div class="row">
            <?php foreach ($recipes as $recipe): ?>
                <div class="col-12 col-md-6 col-xl-4 my-3">
                <div class="card mx-auto" style="width: 18rem;">
                <a href="recette.php?id=<?= $recipe['rec_id']; ?>">lien</a>
                  <img src="./Contenu/img/<?=  $recipe['rec_miniature'];?>" class="card-img-top" alt="...">
                  <div class="card-body">
                    <p class="card-text"><?=  $recipe['rec_resume'];?></p>
                  </div>
                </div>
              </div>
             <?php endforeach; ?>
          </div>
      </div>
      <div class="container col-xxl-8 px-4 py-5">
          <h1 class="display-5 fw-bold text-center line"><span>Les derniers commentaires... </span></h1>
      
          <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <?php
                $flag = 1;
                foreach ($comments as $comment):
                if($flag === 1){
                  echo '<div class="carousel-item active">';
                } else{
                  echo '<div class="carousel-item">';
                }?>                
                  <div class="carousel-caption d-md-block">
                    <h5 class="text-dark"><?= $comment["com_contenu"];?></h5>
                    <p class="text-dark"><?= $comment["com_auteur"];?></p>
                    <p class="text-recipe-carousel fst-italic">Recette : <?= $comment["rec_nom"];?></p>
                  </div>
                </div>
               <?php 
                $flag += 1;
              endforeach;?>
            </div>
           </div> <!-- fin de carousel -->
        </div>
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>         