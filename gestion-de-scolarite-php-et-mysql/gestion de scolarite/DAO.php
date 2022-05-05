<?php

class DAO extends PDO 
{	
	private $db = 'boutique'; 		// base de donn�es
	private $host = 'localhost'; 	// adresse de la base
	private $user = 'root'; 		// nom
	private $pwd = ''; 				// mot de passe
	private $con;					// 
	private $select; 				// requette de s�l�ction
	private $execute; 				// requette d'execution
	private $email='guizmohackett@gmail.com';					// email de l'admin du site
	private $dns;
      
    public function __construct () 
    {
        try 
        {
			$this->con = parent::__construct($this->getDns(), $this->user, $this->pwd);
		    // pour mysql on active le cache de requ�te
		    if($this->getAttribute(PDO::ATTR_DRIVER_NAME) == 'mysql')
		    	$this->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
		    return $this->con;
        }
        catch(PDOException $e) {
			//On indique par email qu'on n'a plus de connection disponible
			error_log(date('D/m/y').' � '.date("H:i:s").' : '.$e->getMessage(), 1, $this->email);
			
		
		}
    }
    
	public function select($reqSelect)
	{
		try
		{
			$this->con = parent::beginTransaction();
			//$result= parent::query($reqSelect);
			$result = parent::prepare($reqSelect);
			$result->execute();
			$this->con = parent::commit();
			// ou
			// $this->con = parent::rollBack();
	  		return $result;
		}
		catch (Exception $e) 
		{
			//On indique par email que la requ�te n'a pas fonctionn�.
			error_log(date('D/m/y').' � '.date("H:i:s").' : '.$e->getMessage(), 1, 'guizmohackett@gmail.com');
			$this->con =parent::rollBack();
		
		
		}
	}
	
	// renvoie un tableau que l'on peux travailler avec count($result)...
	public function selectTableau($reqSelect)
	{
		$result = parent::prepare($reqSelect);
		$result->execute();
		/* R�cup�ration de toutes les lignes d'un jeu de r�sultats "�quivalent � mysql_num_row() " */
		$resultat = $result->fetchAll();
		return $resultat;
	}

	// on change le type de base ici
	public function getDns()
	{
		return 'mysql:dbname='.$this->db.';host='.$this->host;
	}
}

// * SIMPLE EXEMPLE *
////////////////////////////////////////////
$connection = new DAO();
$sql="SELECT * FROM categorie";
$result= $connection->select($sql);
foreach ($result as $row)
{
	echo $row['description'].'<br>';
}
////////////////////////////////////////////
// * COUNT RESULT EXEMPLE *
$sql="SELECT id_categorie FROM produits WHERE id_categorie='$id'";
$result = $connection->selectTableau($sql);
if (count($result) == 1)
	echo count($result).' produit';
elseif (count($result) > 0)
	echo count($result).' produits';
else
	echo 'aucun produit';
?>