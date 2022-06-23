<?PHP

class file_field extends analyse{
	
	protected $size;					//int nbr de caratères
	protected $maxlength;				//int nbr maximum de caratères
	protected $ext;						//array accepte uniqument ce type d'extention si fourni
	protected $filepath;				//string destination des fichiers uploader
	protected $classe = __CLASS__;
	
	static $compteur = 0;				//int Compte les occurences de la classe
	protected $maxfsize;				//instancié par info_ini_upload() taille en byte du champ 
	protected $log = 0;					//si 1 créer un fichier log des sauvegardes dans
										//le répertoire par défaut. FALSE non
	protected $number = 1;				//nombre de champs maxi de 1 à 5
	protected $accept = NULL;			//type de fichier du champ uniquement
	protected $multiple;				//bool envoie plusiers fichiers

	const DIR = 'files_upload_dft';		//dossier par défaut si non créé
	const TYPE = 'file'; 
	
	function __construct( $param=NULL ){
		
		$this::$compteur++;			
		//analyse les arguments du constructeur
		$st = parent::string_array( $param );

		if( $st !== NULL ){
			//seul le tableau 0 est utilisé comme constructeur
			$tmp = parent::format_parameter( $param, $st );
			parent::tri_parameter( $tmp[0] );		
				
		}else{
			//valeur par defaut
			$tmp[0]= get_class_vars( $this->classe );
		}

		//vérification si répertoire
		if( is_dir( $tmp[0]['filepath'] ) ){
		
			$this->filepath = $tmp[0]['filepath'];			
		}else{
		
			$this->make_defaut_path();	
		}
		
		parent::set_maxlength( $tmp[0]['maxlength'] );
		parent::set_size( $tmp[0]['size'] );
		parent::set_name( $tmp[0]['name'] );
		parent::set_id( $tmp[0]['id'] );
		parent::set_css( $tmp[0]['css'] );
		parent::set_label( $tmp[0]['label'] );
		parent::set_form( $tmp[0]['form'] );
		
		$this->set_number( $tmp[0]['number'] );
		$this->set_log( $tmp[0]['log'] );
		$this->set_ext( $tmp[0]['ext'] );
		$this->maxfsize = $this->set_convert( ini_get( 'upload_max_filesize' ) ); 
		$this->set_multiple( $tmp[0]['multiple'] );
		
		//modification du chemin temporaire d'upload (sécurité)
		if( $this->filepath != NULL ){
			putenv( "upload_tmp_dir=$this->filepath" );
		}
		
		if( $this->globalattr == 1 ){
			$this->globalattr = new global_attr( $tmp[0]['accesskey'], 
			$tmp[0]['contenteditable'], $tmp[0]['contextmenu'], $tmp[0]['draggable'],
			$tmp[0]['hidden'], $tmp[0]['spellcheck'], $tmp[0]['tabindex'],
			$tmp[0]['title'], $tmp[0]['dropzone'] );
		}		
		
	}
	

	private function make_defaut_path(){
			
		$this->filepath = getcwd();
		
		try {
			if( !$this->filepath ){
				throw new Exception( "no valide upload directory =>$this->classe" );
			}
			
			$this->filepath = $this->filepath.'/'.$this::DIR;
			
			//vérifie l'existance du rep par defaut
			if( !is_dir( $this->filepath ) ){

				if( !mkdir( $this->filepath, 0600 ) ){
					throw new Exception( "default directory not created =>$this->classe" );
				}
			}
		}
		catch( Exception $error ){
			$this->filepath = NULL;
			echo $error->getMessage();
		}			
	}

	
	private function set_convert( $arg=NULL ){
		
		$L = strtolower( $arg[ strlen($arg)-1 ] );
		
		switch($L) {
			case 'g':
				$arg *= 1000000000;
				break;
			case 'm':
				$arg *= 1000000;
				break;
			case 'k':
				$arg *= 1000;
		}
	
		return $arg;
	}

	function error_upload( & $files_error ){

		$message;
		$err = array( UPLOAD_ERR_OK, UPLOAD_ERR_INI_SIZE, UPLOAD_ERR_FORM_SIZE,
					UPLOAD_ERR_PARTIAL, UPLOAD_ERR_NO_FILE, UPLOAD_ERR_NO_TMP_DIR,
					UPLOAD_ERR_CANT_WRITE, UPLOAD_ERR_EXTENSION );
		
		$err_texte = array( 'File ok', 'File oversize (upload_max_filesize)', 
							'File oversize (MAX_FILE_SIZE)', 'File not complete',
							'No file uploaded', 'No temporary directory', 'Writing impossible',
							'Bad extension' );
							
		if( is_numeric( $files_error ) ){
			return $err_texte[ $files_error ];
		}
		
		$kerr = array_search( $files_error, $err );
			
		if( $kerr !== FALSE ){
			return $err_texte[ $kerr ];
		}else{
			return 'Error unknow';
		}
	}

	/**
	*info sur les conditions du serveur pour uploader,
	*si ok instancie $ini_upload = TRUE sinon FALSE
	*@return bool info_ini_upload( & array() )   
	*/
	function info_ini_upload( & $inf=NULL ){
		$upload;
		//variables d'environement nécessaires du serveur
		$verif = array( 'file_uploads'=>'%d', 'post_max_size'=>'%d' ,
						'upload_max_filesize'=>'%d', 'memory_limit'=>'%d',
						'max_execution_time'=>'%d', 'max_input_time'=>'%d' );
		
		//on récupère uniquement des int
		foreach( $verif as $k=>$el ){
			
			$verif[$k] = sprintf( $el, ini_get( $k ) );
		}
		
		//memory_limit > post_max_size > upload_max_filesize
		if( $verif['file_uploads'] != 1 ||
			$verif['memory_limit'] < $verif['post_max_size'] ||
			$verif['post_max_size'] < $verif['upload_max_filesize'] ){
		
			$upload = 0;
		}else{
			$upload = 1;
		}
		
		$inf = $verif;
		return $upload;
	}
	

	private function set_number( $arg=NULL ){
		
		if( $arg == NULL ){
			$this->number = 1;	
		
		}elseif( ctype_digit( $arg ) && ($arg > 1) && ($arg < 6)  ){
			
			$this->number = $arg;
		}
	}
	

	private function set_multiple( $arg=NULL ){
		$arg = strtoupper( $arg );
		
		if( $arg == '1' || $arg == 'TRUE' ){
			$this->multiple = 1;
			//priorité à pultiple plutôt qu'au nombre de champ
			$this->number = 1;
		}else{
			$this->multiple = NULL;
		}
	
	}
	

	private function set_accept( & $arg=NULL ){
		
		switch( $arg ){
			case 'image':
				$this->accept = 'accept="image/*"';
				$arg = NULL;
				break;
			case 'audio':
				$this->accept = 'accept="audio/*"';
				$arg = NULL;
				break;
			case 'video':
				$this->accept = 'accept="video"';
				$arg = NULL;
				break;
		}
	}	
	

	private function _trim( & $arg ){
		
		$arg = trim( $arg, ' .' );
		$arg = strtolower( $arg );	
		
		$this->set_accept( $arg );
	}
	

	protected function set_ext( $arg=NULL ){	
		
		if( $arg == NULL ){
			$this->ext = NULL;
			return;
		}
		elseif( is_array( $arg ) ){

			$this->ext = $arg;
		}
		//si caractère séparateur on crait un tableau
		elseif( is_string( $arg ) && strpos ( $arg , '|' ) !== FALSE ){
			
			$this->ext = explode( '|',  htmlentities( $arg, ENT_QUOTES ) );
		}else{
			$this->ext = array( $arg );
		}
		
		array_walk( $this->ext, 'file_field::_trim' );
		
		$this->ext = array_filter( $this->ext ); 
		
		if( empty( $this->ext ) ){
			$this->ext = NULL;
		} 
		
	}		
	
	private function set_log( $arg=NULL ){

		if( $arg == 1 || strcasecmp( $arg, 'TRUE' ) == 0 ){
			$this->log = 1;
		}else{
			$this->log = 0;
		}
	}
	

	private function write_log( $tab ){
		
		$log = $this->filepath.'/log.txt';
		array_unshift( $tab, "Error;name;ip;login;dd/mm/yy;time\n" );
		//nombre de lignes maxi du log
		$maxfile = 50;
			
		try{
			if( !file_exists( $log ) ){

				$handle = file_put_contents( $log, $tab, LOCK_EX|FILE_TEXT  );
			}else{
			//le fichier existe
				$tmp = file( $log, FILE_SKIP_EMPTY_LINES|FILE_TEXT );

				$tmp = array_slice ( $tmp, 1, $maxfile );
				$data = array_merge( $tab, $tmp );
				$handle = file_put_contents( $log, $data, LOCK_EX|FILE_TEXT  );
			}
					
			if( $handle == FALSE ){
				throw new Exception( "Writing error $classe=>write_log()" );
				return;
			}
		}
		catch( Exception $error ){
			echo $error->getMessage();
		}
	}
	
	/**
	*sauvegarde le fichier uploader (vérifie l'ext.)
	*si $overwrite=FALSE les fichiers de même nom ne seront pas écrasés
	*si un login est passé le nom sera inscrit dans le fichier log 
	*@return bool savefile( string, bool ); bool = 1 si fichier ok  
	*/
	function savefile( $login = NULL, $overwrite = 1 ){
		
		$confirm = array();
		$ip = $_SERVER['REMOTE_ADDR'];
		$date = date( 'j/n/y;G:i:s', $_SERVER['REQUEST_TIME'] );
		$return = array();
		
		//nom de la variable $_FILES[]
		$fname = $this->name;		
		
		if( isset( $_FILES[ $fname ] ) ){				
		
			if( $this->number > 1 || $this->multiple == 1 ){			
			
				foreach( $_FILES[ $fname ][ 'error' ] as $key => $error) {
				
					$name = $_FILES[ $fname ][ 'name' ][ $key ];
				
					switch( $error ){
					
						case UPLOAD_ERR_OK:
							
							$tmp_name = $_FILES[ $fname ][ 'tmp_name' ][$key];
							$ext = strtolower( pathinfo( $name,  PATHINFO_EXTENSION ) );
						 
							if( $this->ext == NULL || in_array( $ext, $this->ext ) ){
								
								$namesave = "$name.txt";
								
								//on ne réécrit pas le même fichier
								if( $overwrite == 0 ){
									//include_once "/form_h5/_scandir.php";
									$rep = _scandir( $this->filepath );
									
									//le nom existe déjà on le change
									if( in_array( $namesave, $rep['f'] ) ){

										$namesave = crypt( $name );
										$namesave = strtr( $namesave, "/$.", "aeo");
										$namesave = substr( $namesave, -5, 5 );
										$namesave = $name.'_'.$namesave.'.txt';
									}
								}
								
								$savepath = "$this->filepath/$namesave";
								
								$val = move_uploaded_file( $tmp_name, $savepath );
																
								if( $val == FALSE ){
									$confirm[] = "Not saved;$name;$ip;$login;$date\n";
									$return[$key] = 'move_uploaded_file error';
								}else{
									$confirm[] = "File ok;$namesave;$ip;$login;$date\n";
									$return[$key] = 1;
								}
							}						
							break;
						
						default:
							//on stock les messages d'erreur du téléchargement
							$return[$key] = $this->error_upload( $error );
							$confirm[] = $return[$key].";$name;$ip;$login;$date\n";						
					} 	
				}

			}else{
			//1 seul champ file
				$name = $_FILES[ $fname ][ 'name' ];
				$error = $_FILES[ $fname ][ 'error' ];
				
				switch( $error ){
				
					case UPLOAD_ERR_OK:
						
						$tmp_name = $_FILES[ $fname ][ 'tmp_name' ];
						$ext = strtolower( pathinfo( $name,  PATHINFO_EXTENSION ) );
					 
						if( $this->ext == NULL || in_array( $ext, $this->ext ) ){
							
							$namesave = "$name.txt";
							
							//on ne réécrit pas le même fichier
							if( $overwrite == 0 ){
								//include_once "/form_h5/_scandir.php";
								$rep = _scandir( $this->filepath );
								
								//le nom existe déjà on le change
								if( in_array( $namesave, $rep['f'] ) ){

									$namesave = crypt( $name );
									$namesave = strtr( $namesave, "/$.", "aeo");
									$namesave = substr( $namesave, -5, 5 );
									$namesave = $name.'_'.$namesave.'.txt';
								}
							}
							
							$savepath = "$this->filepath/$namesave";
							
							$val = move_uploaded_file( $tmp_name, $savepath );
															
							if( $val == FALSE ){
								$confirm[] = "Not save;$name;$ip;$login;$date\n";
								$return[0] = 'move_uploaded_file error';
							}else{
								$confirm[] = "File ok;$namesave;$ip;$login;$date\n";
								$return[0] = 1;
							}
						}						
						break;
					
					default:
						//on stock les messages d'erreur du téléchargement
						$return[0] = $this->error_upload( $error );
						$confirm[] = $return[0].";$name;$ip;$login;$date\n";						
				}				
				
				
			}
			
			//on écrit les évènements dans le fichier log
			if( $this->log == 1 ){							
				$this->write_log( $confirm );
			}
		}				
		unset( $_FILES[ $fname ] );
		return $return;
	}

	/**
	*écrit le code php à l'endroit voulu
	*@return void
	*/
	function write( $screen = NULL ){
		
		if( $this->number > 1 || $this->multiple == 1 ){
			$tname = $this->name.'[]';
		}		
		
		$ltmp = '<input type="hidden" name="MAX_FILE_SIZE" value="'.$this->maxfsize.'">';
		
		for( $i = 1; $i <= $this->number; $i++ ){
		
			$l1 = '<input name="'.$tname.'" type="'.self::TYPE.'" size="'.$this->size.'"';	

			$lab = '';
			
			parent::multi_write( $i, $l1, $lab );
		
			if( $this->form != NULL ){
				$l1 .= ' form="'.$this->form.'"';
			}		
		
			if( $this->maxlength != NULL ){		
				$l1 .= ' maxlength="'.$this->maxlength.'"';
			}
			if( $this->css != NULL ){		
				$l1 .= ' '.$this->css;
			}
			if( $this->accept != NULL ){
				$l1 .= ' '.$this->accept;
			}
			if( $this->multiple != NULL ){
				$l1 .= ' multiple="multiple"';
			}
			if( $this->source != NULL ){		
				$l1 .= ' '.$this->source;
			}		
			
			if( $this->globalattr != NULL ){
				$l1 .= $this->globalattr->write_globalattr( $i );
			}			
			
			$l1 .= '>';

			switch( $this->past ){
				case 1:				
					$l1 = $l1.$lab;	
					break;
				case 0:
					$l1 = $lab.$l1;
					break;
			}
			
			//ajout du champ iden et de la taille en byte
			if( $i == 1 ){
				$l1 = $ltmp.$l1;
			}
			if( $this->br != NULL ){ $l1.= $this->br; }
			if( $screen == NULL ){
				echo $l1, "\n";
			}else{
				echo htmlentities( $l1, ENT_QUOTES ), "\n";
			}				
		
		}
	}

}

?>