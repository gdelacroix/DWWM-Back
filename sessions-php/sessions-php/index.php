<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="test.php" method="POST">
        <h1>Bienvenue sur notre site web</h1>
        <div class="mb-3">
          <label for="nom" class="form-label">Votre nom : </label>
          <input type="text" class="form-control" id="nom" name="nom" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="age" class="form-label">age</label>
          <input type="number" class="form-control" id="age" name="age">
        </div>

        <div class="mb-3">
            <label for="marie">Marié</label>
            <input type="radio" id="marie" name="situation" value="marié" checked>  
        </div>
        <div class="mb-3">
            <label for="veuf">Veuf</label>
            <input type="radio" id="veuf" name="situation" value="veuf">  
        </div>

        <div>
            <input type="checkbox" id="internet" name="internet">
            <label for="internet">internet</label>
         </div>

            <div>
                <input type="checkbox" id="jeux" name="jeux" checked>
                <label for="jeux">jeux vidéos</label>
            </div>
        
        <input type="submit" class="btn btn-primary" value="Envoyer">
        <input type="reset" class="btn btn-primary" value="Recommencer">
      </form>
</body>
</html>


