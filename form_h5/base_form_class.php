<?PHP

class base_form extends analyse{
	
	protected $action;				//Url de destination
	protected $enctype;  
	protected $method;				//Méthode d'envoies 'Get' ou 'Post' 
	protected $novalidate;			/*le formulaire ne devrait pas être validée
									 0=non soumis, 1=soumis*/
									
	protected $autocomplete;		//Le formulaire devrait avoir une autocompletion 1=ON 0=OFF
	protected $target;
	
	protected $elements = array();	//array('objets') Stockage des champs
	static	$compteur = 1;			//int Compte les occurences de la classe
	
	private $t_enctype = array( 'data'=>'multipart/form-data',
								'url'=>'application/x-www-form-urlencoded',
								'text'=>'text/plain' );
	private $t_target = array( 'blank'=>'_blank', 'self'=>'_self', 'parent'=>'_parent', 
								'top'=>'_top' ); 
	const ON = 'on';
	const OFF = 'off';
	
	//character-set, Spécifie une liste de caractère encoding que le serveur accepte	
	protected $charset = array('ue'=>'iso-8859-1', 'zh'=>'gb2312', 'uc'=>'utf-8',
	 'ar'=>'iso-8859-6', 'ja'=>'euc-jp' );
	
	/**
	*__construct( $action, $post, $css, $source )
	*@return void
	*/
	function __construct( $action=NULL, $enctype=NULL, $methode=NULL ,$target=NULL, 
							$novalidate=0, $autocomplete=1 ){
		
		$this::$compteur++;
		
		$enctype = strtolower( $enctype  );
		$target = strtolower( $target );
		$method = strtolower( $methode );					
				
		if( is_string( $action ) ){
			$this->action = $action;
		}else{	
			$this->action = htmlentities( $_SERVER['PHP_SELF'], ENT_QUOTES, 'UTF-8' );
		}		
			
		if( array_key_exists( $enctype, $this->t_enctype ) ){
			$this->enctype = $this->t_enctype[$enctype];
		}else{
			$this->enctype = NULL;
		}
		
		if( $method == 'get' ){
			$this->method = $method;
		}else{
			$this->method = 'post';
		}		
		
		if( array_key_exists( $target, $this->t_target ) ){
			$this->target = $this->t_target[$target];
		}else{
			$this->target = NULL;
		}			
		
		if( $novalidate == '1' ){
			$this->novalidate = ' novalidate="novalidate"';
		}else{
			$this->novalidate = NULL;
		}
		
		if( $autocomplete == '1' ){
			$this->autocomplete = ' autocomplete="ON"';
		}elseif( $autocomplete === NULL ){
			$this->autocomplete = NULL;
		}else{
			$this->autocomplete = ' autocomplete="OFF"';
		}		
		
	}

	/**
	*surcharge des fonctions d'analyse
	*@return void
	*/	
	public function  __call( $name , $arguments ){
		parent::$name( $arguments[0] );
	}

	/**
	*ajoute un champ, add( $obj1, $obj2,, )
	*@return void
	*/
	function add(){
		
		$nbr = func_num_args();

		try{
			for( $i = 0; $i < $nbr; $i++ ){	
				
				if( !func_get_arg( $i ) instanceof analyse ){
				
					throw new Exception( "argument is not a class form =>add()" );
				}
			
				$this->elements[] = func_get_arg( $i );
			}
		}catch( Exception $error ){
			echo $error->getMessage();
		}	
	}
	/**
	*pointe sur un des champs du formulaire. Soit par index[0] ou son nom ou id
	*@return objet
	*/
	function & get( $num ){
		$n = count( $this->elements );
	
		try{
			if( is_numeric( $num ) ){

				if( $num >= $n || $num < 0 ){ 
					
					throw new Exception( 'argument overflow =>get()' );
				}
				
				return $this->elements[ $num ];
			}
			
			if( is_string( $num ) ){
			
				foreach( $this->elements as $k=>$el ){
					
					if( strcasecmp( $el->name, $num ) == 0 || 
						strcasecmp( $el->id, $num ) == 0 ){
						
						return  $this->elements[ $k ];
					}
				}
			}
			
			throw new Exception( 'no valide argument name =>get()' );
			
		}catch( Exception $error ){
			echo $error->getMessage();
		}
	}

	/**
	*supprime champs du formulaire. Soit par index[0] ou son nom ou id. 
	*$f->delete( 'radio', 2 ) si aucun agument effacement total 
	*@return void
	*/	
	function delete(){
	
		$n = count( $this->elements );
		$nbr = func_num_args();
		
		//sans paramètre efface tout
		if( $nbr == 0 ){
			$this->elements = array();
			return;	
		}
		
		try{
			for( $i = 0; $i < $nbr; $i++ ){	

				switch( $v = func_get_arg( $i ) ){
					
					case FALSE:			
						unset( $this->elements[ 0 ] );
						break;	
					case is_numeric( $v ):
			
						if( $v < $n && $v >= 0 ){
							
							unset( $this->elements[ $v ] );
							break;
						}
						throw new Exception( "argument $i overflow =>delete()" );
					case is_string( $v ):

						$alert = true;
											
						foreach( $this->elements as $k=>$el ){
							
							$name = $el->name();
							$id = $el->id();
							if( (is_array( $name ) && in_array( $v, $name )) ||
							 (is_array( $id ) && in_array( $v, $id ))){
								
								unset( $this->elements[ $k ] );
								$alert = NULL;
								break;	
							}
								
							if( strcasecmp( $el->name, $v ) == 0 || 
								strcasecmp( $el->id, $v ) == 0 ){
						
								unset( $this->elements[ $k ] );
								$alert = NULL;
								break;
							}
						}
						
						if( $alert ){
							throw new Exception( "bad name argument $i =>delete()" );
						}
						break;
					default:
						throw new Exception( "no valide argument $i =>delete()" );
				}
			}
			
			$this->elements = array_values( $this->elements );
			
		}catch( Exception $error ){
			echo $error->getMessage();
		}
	}

}
?>
