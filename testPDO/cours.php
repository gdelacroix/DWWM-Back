<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP / MySQL</title>
        <meta charset='utf-8'>                
    </head>
    <body>
        <h1>Bases de données MySQL</h1>  
        <?php
            $servname = "localhost"; $dbname = "pdodb"; $user = "root"; $pass = "";
            
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                //Crée la table Users
               /* // $sql = "CREATE TABLE Users (
                  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                  Prenom VARCHAR(30) NOT NULL,
                  Nom VARCHAR(30) NOT NULL,
                  Mail VARCHAR(50) NOT NULL
                )";
                $dbco->exec($sql);
                
                //On prépare la requête et on lie les paramètres
                $sth = $dbco->prepare("
                  INSERT INTO Users (Prenom, Nom, Mail)
                  VALUES (:prenom, :nom, :mail)
                ");
                $sth->bindParam(':prenom', $prenom);
                $sth->bindParam(':nom', $nom);
                $sh->bindParam(':mail', $mail);
                
                //Insère une première entrée
                $prenom = "Pierre"; $nom = "Giraud"; $mail = "pierre.giraud@edhec.com";
                $sth->execute();
                
                //Insère une deuxième entrée
                $prenom = "Victor"; $nom = "Durand"; $mail = "v.durandd@edhec.com";
                $sth->execute();
                
                //Insère une troisième entrée
                $prenom = "Julia"; $nom = "Joly"; $mail = "july@gmail.com";
                // $sth->execute();*/
                
                echo "Parfait, tout s'est bien passé";
            }
                  
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
        ?>
    </body>
</html>