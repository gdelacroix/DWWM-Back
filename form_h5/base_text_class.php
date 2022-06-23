<?php class base_text extends analyse{protected $size;protected $maxlength;protected $number = 1;protected $autocomplete;protected $autofocus;protected $pattern;protected $placeholder;protected $required;

function __construct( $param=NULL, & $param_class=NULL ){

	$st = parent::string_array( $param );

	if( $st !== NULL ){
		$valtmp = parent::format_parameter( $param, $st );		
		parent::tri_parameter( $valtmp[0] );
	}else{
		$valtmp[0]= get_class_vars( $this->classe );
	}
	parent::set_name( $valtmp[0]['name'] );
	parent::set_br( $valtmp[0]['br'] );
	parent::set_id( $valtmp[0]['id'] );
	parent::set_css( $valtmp[0]['css'] );
	parent::set_source( $valtmp[0]['source'] );
	parent::set_value( $valtmp[0]['value'] );
	parent::set_size( $valtmp[0]['size'] );
	parent::set_maxlength( $valtmp[0]['maxlength'] );
	parent::set_label( $valtmp[0]['label'] );	
	parent::set_form( $valtmp[0]['form'] );
	$this->set_number( $valtmp[0]['number'] );
	$this->set_multi_bool( $valtmp[0]['autocomplete'], 'autocomplete' );
	$this->set_multi_bool( $valtmp[0]['autofocus'], 'autofocus' );
	$this->set_multi_bool( $valtmp[0]['required'], 'required' );
	$this->set_pattern( $valtmp[0]['pattern'] );
	$this->set_placeholder( $valtmp[0]['placeholder'] );
	if( $this->globalattr == 1 ){
		$this->globalattr = new global_attr( $valtmp[0]['accesskey'],
		$valtmp[0]['contenteditable'], $valtmp[0]['contextmenu'], $valtmp[0]['draggable'],$valtmp[0]['hidden'], 
		$valtmp[0]['spellcheck'], $valtmp[0]['tabindex'],$valtmp[0]['title'], $valtmp[0]['dropzone'] );
	}
	switch( $param_class ){
		case 'checkbox':
			$param_class = array( $valtmp[0][ 'checked' ] );
			break;
		case 'color':
			$param_class = array( $valtmp[0][ 'list' ] );
			break;
		case 'email':
			$param_class = array( $valtmp[0][ 'list' ], $valtmp[0][ 'readonly' ], $valtmp[0][ 'multiple' ] );
			break;
		case 'url':
			$param_class = array( $valtmp[0][ 'list' ], $valtmp[0][ 'readonly' ] );
			break;
		case 'search':
			$param_class = array( $valtmp[0][ 'list' ], $valtmp[0][ 'readonly' ],$valtmp[0][ 'dirname' ] );
			break;
		case 'range':
			$param_class = array( $valtmp[0][ 'list' ], $valtmp[0][ 'min' ],$valtmp[0][ 'max' ], $valtmp[0][ 'step' ] );
			break;
		case 'number':
			$param_class = array( $valtmp[0][ 'list' ], $valtmp[0][ 'readonly' ], $valtmp[0][ 'min' ], $valtmp[0][ 'max' ], 
			$valtmp[0][ 'step' ] );break;case 'time':$param_class = array( $valtmp[0][ 'list' ], $valtmp[0][ 'readonly' ], 
			$valtmp[0][ 'min' ], $valtmp[0][ 'max' ], $valtmp[0][ 'step' ],$valtmp[0][ 'format' ] );
			break;
		case 'menu':
			$param_class = array( $valtmp[0][ 'selected' ], $valtmp[0][ 'multiple' ],$valtmp[0]['size'] );
			break;
		case 'textarea':
			$param_class = array( $valtmp[0][ 'wrap' ], $valtmp[0][ 'readonly' ],$valtmp[0][ 'dirname' ], $valtmp[0][ 'rows' ],
			 $valtmp[0][ 'cols' ],$valtmp[0]['maxlength'] );
			 break;
		default:
			$param_class = NULL;
		}
}

private function set_number( $arg=NULL ){if( $arg == NULL ){$this->number = 1;}elseif( ctype_digit( $arg ) && ($arg > 1) && ($arg <= self::MAXNUMBER)  ){$this->number = $arg;}}private function set_multi_bool( $arg=NULL, $key ){$arg = strtoupper( $arg );switch( $arg ){case '0':
$this->set_multi_key( $key, 0 );break;case '1':$this->set_multi_key( $key, 1 );break;case 'FALSE':$this->set_multi_key( $key, 0 );break;case 'TRUE':$this->set_multi_key( $key, 1 );break;default:$this->set_multi_key( $key, NULL );}}private function set_multi_key( $k, $a ){
switch( $k ){case 'autocomplete':$this->autocomplete = $a;if( $a === NULL ){ $this->autocomplete = NULL; }break;case 'autofocus':$this->autofocus = $a;if( $a === NULL ){ $this->autofocus = NULL; }break;case 'required':$this->required = $a;
if( $a === NULL ){ $this->required = NULL; }}}private function set_pattern( $arg=NULL ){if( is_string( $arg ) ){$this->pattern = strtr( $arg, ':', ',' );}else{$this->pattern = NULL;}}

private function set_placeholder( $arg=NULL ){

	if( $arg == NULL ){$this->placeholder = NULL;return;}

	if( is_array( $arg ) ){
		$this->placeholder = $arg;
		return;
	}elseif( is_string( $arg ) && strpos ( $arg , '|' ) !== FALSE ){
		$this->placeholder = explode( '|',  $arg );
	}else{
		$this->placeholder = array( $arg );
	}
}
protected function set_readonly( $arg=NULL ){
$arg = strtoupper( $arg );if( $arg == '1' || $arg == 'TRUE' ){$this->readonly = 1;}else{$this->readonly = NULL;}}protected function set_list( $arg=NULL ){if( $arg == NULL || strcasecmp( $arg, 'null' ) == 0 ){$this->list = NULL;}else{$this->list = $arg;}}}?>








