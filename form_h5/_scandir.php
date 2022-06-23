<?PHP
/** 
	* récupère le contenu d un repertoire v2.8
	*
	* array _scandir( $path, $option, $encodage ) 
	* 
	* option 'a' : tri croissant
	* option 'z' : tri décroissant 
	* option '.xxx' : filtre uniquement cette extention
	* option '.' filtre les fichiers sans extention 
	*
	* encodage UTF8 | ISO : (convertion de l'un vers l'autre) optionnel
	*
	* retourne false en cas d echec.
	* retourne un tableau array( 'd'=>repertoires, 'f'=>fichiers ) 
	*
	*/

define( 'UTF8', 1, true );
define( 'ISO', 2, true );

function _scandir( $path = NULL , $option = NULL, $encodage = NULL ){
	
	if( is_null( $path ) || empty( $path ) ){
		$path = dirname( __FILE__ );
	}
			
	$path = rtrim( $path, '\\' );
	$path = rtrim( $path, '/' );
	$path = $path.'/';
	
	$scan = @scandir( $path );

	
	if( $scan == false ){
		$scan = @scandir( utf8_decode( $path ) );
	}
	if( $scan == false ){
		$scan = @scandir( utf8_encode( $path ) );
	}		
	
	try{
		if( $scan == false ){		
			throw new Exception( '_scandir => path error ' );
			return false;
		}
	}catch( Exception $error ){
		echo $error->getMessage();
	}	
	
	unset( $scan[ array_search( '.', $scan ) ] );
	unset( $scan[ array_search( '..', $scan ) ] );	
	
	$rep = array( 'd'=>array(), 'f'=>array() ); 

	$option = strtolower( $option );
	$ext = NULL;
	
	if( strlen( $option ) > 1 || $option == '.' ){
		$ext = trim( $option, '.' ) ;
		$option = 1;
	}
	
	foreach( $scan as $k=>$el ){	
				
		switch( $encodage ){
			case 1:
				$el = utf8_encode( $el );
				break;
			case 2:
				$el = utf8_decode( $el );
		}		
		 
		if( is_dir( $path.$el ) ){
			array_push( $rep['d'], $el ); 
		}else{
			
			if( $ext == NULL && $option != 1 ){
				array_push( $rep['f'], $el );
			}
			else{
				if( $ext == pathinfo( $path.strtolower( $el ) , PATHINFO_EXTENSION ) ){
					array_push( $rep['f'], $el );
				}		
			}
		}

	}
	
	switch( $option ){
		case 'a':
			natcasesort( $rep['d'] );
			natcasesort( $rep['f'] );
			break;
		case 'z':
			natcasesort( $rep['d'] );
			natcasesort( $rep['f'] );
			$rep['d'] = array_reverse( $rep['d'] );
			$rep['f'] = array_reverse( $rep['f'] );
	}
	
	if( !isset( $rep['d'][0] ) || $option == 1 ){
		$rep['d'] = array();
	}
	if( !isset( $rep['f'][0] ) ){
		$rep['f'] = array();
	}
	
	return $rep;
}
?>