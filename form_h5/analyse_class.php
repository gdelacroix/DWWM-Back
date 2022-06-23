<?php class analyse{protected $id;protected $name;protected $css;protected $source;protected $value;protected $label;protected $past = 0;protected $form;protected $globalattr;const PASTE = 'past';const MAXNUMBER = 10;protected $br;
protected function set_css( $arg=NULL ){try {if( strpos( $arg, '#' ) !== false ){if( isset( $this->id ) ){throw new Exception( "id already exist =>set_css()" );}else{$this->id = str_replace( '#', '', $arg );return;}}
if( strpos( $arg, '.' ) !== false ){$this->css = 'class="'.str_replace( '.', '', $arg ).'"';return;}if( $arg != NULL ){throw new Exception( "no valide argument =>set_css()" );}$this->css = NULL;}catch( Exception $error ){echo $error->getMessage();}}
protected function set_id( $arg=NULL ){if( $arg == NULL || strcasecmp( $arg, 'null' ) == 0 ){$this->id = $this->classe.substr( crc32( $this->name ), -4, 4 );}elseif( strcasecmp( $arg, 'FALSE' ) == 0 ){$this->id = NULL;}else{$this->id = trim( $arg );
}}
protected function set_br( $arg=NULL ){	
	if( ctype_digit( $arg ) && $arg < 20 ){
		for( $i=1; $i<= $arg; $i++){
				$this->br .= '<br>';
		}
	}elseif( $arg == true ){
		$this->br = '<br>';
	}else{
		$this->br = NULL;
	}
}
protected function set_name( $arg=NULL ){if( $arg === false ){$this->name = NULL;}elseif( $arg == NULL ){$this->name = $this->classe.$this::$compteur;}else{$this->name = trim( $arg );}}
protected function set_maxlength( $arg=NULL ){
	if( ctype_digit( $arg ) && $arg < 255 && $arg > 0 ){
		$this->maxlength = $arg;
	}else{
		$this->maxlength = NULL;
	}
}
protected function set_size( $arg=NULL ){if( ctype_digit( $arg ) && $arg < 255 && $arg > 0 ){$this->size = $arg;}else{$this->size = 15;}}
protected function _htmlentites( & $tab, $t ){
	if( $t == 0 ){
		array_walk ( $tab , create_function('& $v','$v = htmlentities( $v, ENT_QUOTES, \'UTF-8\' );') );
	}else{
		array_walk ( $tab , create_function('& $v', '$v = htmlentities( trim($v), ENT_QUOTES, \'UTF-8\' );') );
	}
}

protected function set_value( $arg=NULL, $trim = 1 ){
	if( $arg == NULL ){$this->value = NULL;return;}if( is_array( $arg ) ){$this->_htmlentites( $arg, $trim );$this->value = $arg;return;}elseif( is_string( $arg ) && strpos ( $arg , '|' ) !== FALSE ){
$this->value = explode( '|', $arg );$this->_htmlentites( $this->value, $trim );}else{$this->value = array( htmlentities( trim($arg), ENT_QUOTES ) );}}
protected function set_label( $arg=NULL ){	
	if( $arg == NULL ){
		$this->label = NULL;
		return;
	}
	if( is_array( $arg ) ){
		$this->_htmlentites( $arg, 0 );
		$this->set_past( $arg );
		$this->label = $arg;
		return;
	}
	elseif( is_string( $arg ) && strpos ( $arg , '|' ) !== FALSE ){			
		$this->label = explode( '|',  htmlentities( $arg, ENT_QUOTES, 'UTF-8' ) );
		$this->set_past( $this->label );
	}else{	
		$this->label = array( htmlentities( $arg, ENT_QUOTES, 'UTF-8' ) );
	}
}

private function set_past( & $arg=NULL ){
	if( $arg == NULL ){
		$this->past = 0;
		return;
	}
	foreach( $arg as $k => $el ){
		if( strcasecmp( $this::PASTE, $el ) == 0 ){
			$this->past = 1;array_splice( $arg, $k, 1 );
			return;
		}
	}
}

function set_source( $arg=NULL ){if( $arg == NULL ){$this->source = NULL;return;}if( is_string( $arg ) ){$this->source = preg_replace( '[<|>]', NULL, $arg );}}
protected function set_form( $arg=NULL ){if( $arg == NULL || strcasecmp( $arg, 'null' ) == 0 ){$this->form = NULL;}else{$this->form = $arg;}}/**
*Nom de l'objet
*@return mixed
*/
function name(){return $this->name;}/**
*Nombre de répétition d'un objet
*@return int
*/
function number(){return $this->number;}/**
*Id de l'objet
*@return mixed
*/
function id(){if( isset( $this->number ) && $this->number > 1 ){$tid = array( $this->id );for( $n = 2; $n <= $this->number; $n++ ){$tid[] = $this->id.$n;}return $tid;}return $this->id;}
protected function string_array( $tx ){if( is_string( $tx ) && !empty( $tx ) ){return TRUE;}elseif( is_array( $tx ) && !empty( $tx ) ){return FALSE;}else{return NULL;}}
private function string_key_parameter( $string ){	
	$k = strtok( $string, '=' );
	$e = strtok( '=' );
	return array( $k => $e );
}

private function string_space_save( $string ){

	$parametre = array( 'filepath', 'value', 'label', 'placeholder', 'form','contextmenu', 'title' );
	
	foreach( $parametre as $elm ){
		if( is_int( strpos( $string, $elm ) ) ){
			return TRUE;
		}
	}
}
protected function format_parameter( $val, $type ){

	$tab_parameter = array();
	$masque1 = array( ' ', '"', '\'' );
	$masque2 = array( '/\s+(?=\=)/', '/(?<=\=)\s+/' );
	if( $type ){
		$param2 = preg_replace( $masque2, '', $val );
		$ttmp = explode( ',', $param2 );
		foreach( $ttmp as $element ){
			$chr = preg_split( '/\s+(?=\w+[=])/', $element, -1, PREG_SPLIT_NO_EMPTY);
			$tmp_arg = array_filter( $chr, 'analyse::string_space_save' );
			$t = str_replace( $masque1, '' , $chr );
			$t = array_merge( $t, $tmp_arg );
			$pa = array_map( 'analyse::string_key_parameter', $t );
			$cpt = count( $pa )-1;
			
			for( $i = 0; $i < $cpt; $i++ ){
				$pa[0] = array_merge( $pa[0], $pa[$i+1] );
			}
			$tab_parameter[] = $pa[0];
		}
		return $tab_parameter;
	}else{
		if( is_string( key( $val ) ) ){
		
			if( array_key_exists( 'filepath', $val ) ){
				$tmp_arg[0] = $val['filepath'];
				//$tab_parameter[] = str_replace( $masque1, '' , $val);
				//$tab_parameter[0]['filepath'] = $tmp_arg;
			}
			if( array_key_exists( 'label', $val ) ){
				$tmp_arg[1] = $val['label'];
				//$tab_parameter[] = str_replace( $masque1, '' , $val);
				//$tab_parameter[0]['filepath'] = $tmp_arg;
			}
			
			//else{
				//$tab_parameter[] = str_replace( $masque1, '' , $val);
			//}

			$tab_parameter[] = str_replace( $masque1, '' , $val);
			
			if( isset( $tmp_arg[0] ) ){
				$tab_parameter[0]['filepath'] = $tmp_arg[0];
			}
			if( isset( $tmp_arg[1] ) ){
				$tab_parameter[0]['label'] = $tmp_arg[1];
			}			
			
			return $tab_parameter;
		}
		$val = preg_replace( $masque2, '', $val );
		
		foreach( $val as $element ){
			$chr = preg_split( '/\s+(?=\w+[=])/', $element, -1, PREG_SPLIT_NO_EMPTY);
			$tmp_arg = array_filter( $chr, 'analyse::string_space_save' );
			$t = str_replace( $masque1, '' , $chr );
			$t = array_merge( $t, $tmp_arg );
			$pa = array_map( 'analyse::string_key_parameter', $t );
			$cpt = count( $pa )-1;
			
			for( $i = 0; $i < $cpt; $i++ ){
				$pa[0] = array_merge( $pa[0], $pa[$i+1] );
			}
			$tab_parameter[] = $pa[0];
		}
		return $tab_parameter;
	}
}
protected function tri_parameter( & $contructeur_str ){$t_arg_global = get_class_vars("GLOBAL_ATTR");$t_arg_class = get_class_vars( $this->classe );foreach( $t_arg_global as $key=>$elem ){if( array_key_exists ( $key , $contructeur_str ) ){
$this->globalattr = 1;$t_arg_class = array_merge( $t_arg_global, $t_arg_class );break;}}$contructeur_str = array_intersect_key( $contructeur_str, $t_arg_class );$contructeur_str = array_merge( $t_arg_class, $contructeur_str );}
protected function multi_write( $i, & $l1, & $lab=NULL ){switch( $i ){case 1;if( $this->id != NULL ){$l1 .= ' id="'.$this->id.'"';}if( isset( $this->label[$i-1] ) ){$lab = '<label for="'.$this->id.'">'.$this->label[$i-1].'</label>';}break;default:
if( $this->id != NULL ){$l1 .= ' id="'.$this->id.$i.'"';}if( isset( $this->label[$i-1] ) ){$lab = '<label for="'.$this->id.$i.'">'.$this->label[$i-1].'</label>';}}}}?>