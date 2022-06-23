<?php class checkbox extends base_text{
protected $classe = __CLASS__;
static $compteur = 0;
protected $checked;
const TYPE = 'checkbox';
const CHECKED = ' checked="checked"';

function __construct( $param=NULL ){	
	$this::$compteur++;
	$refparam = self::TYPE;
	parent::__construct( $param, $refparam );	
	$this->set_checked( $refparam[0] );
	$this->set_value_checkbox( $this->value );
	$this->pattern = NULL;
	$this->maxlength = NULL;
	$this->placeholder = NULL;
	$this->size = NULL;
}

private function test_cbdel( $tab, $key ){
	if( !is_string( $tab ) ){array_splice( $this->value, $key );}
}
protected function set_value_checkbox( $arg = NULL ){
	
	if( is_array( $arg ) ){
		array_walk( $arg, 'CHECKBOX::test_cbdel' );
		$nbr = count( $this->value );
		if( $nbr < $this->number ){
			for( $nbr; $nbr < $this->number ; $nbr++){
				$this->value[] = 'cb'.($nbr+1);
			}
		}
	}else{
		$this->value = array();
		for( $i = 1; $i <= $this->number ; $i++){
			$this->value[] = 'cb'.$i;
		}
	}
}
protected function set_checked( $arg=NULL ){
	if( $arg == '1' || strcasecmp( $arg, 'TRUE' ) == 0 ){
		$this->checked = 1;
	}else{
		$this->checked = NULL;
	}
}

function write( $screen = NULL ){$name = $this->name;for( $i = 1; $i <= $this->number; $i++ ){if( $this->number > 1 ){ $name = $this->name.'[]'; }$l1 = '<input name="'.$name.'" type="'.self::TYPE.'"';$lab = '';parent::multi_write( $i, $l1, $lab );
if( $this->css != NULL ){$l1 .= ' '.$this->css;}if( $this->source != NULL ){$l1 .= ' '.$this->source;}if( isset( $this->value[$i-1] ) ){$l1 .= ' value="'.$this->value[$i-1].'"';}if( $this->autocomplete == '1' ){$l1 .= ' autocomplete="on"';}if( $this->autocomplete == '0' ){
$l1 .= ' autocomplete="off"';}if( $this->autofocus == '1' && $i < 2 ){$l1 .= ' autofocus="autofocus"';}if( $this->form != NULL ){$l1 .= ' form="'.$this->form.'"';}if( $this->checked != NULL ){$l1 .= self::CHECKED;}if( $this->globalattr != NULL ){
$l1 .= $this->globalattr->write_globalattr( $i );}$l1 .= '>';
switch( $this->past ){case 1:$l1 = $l1.$lab;break;case 0:$l1 = $lab.$l1;break;}
if( $this->br != NULL ){ $l1.= $this->br; }
if( $screen == NULL ){echo $l1, "\n";}else{echo htmlentities( $l1, ENT_QUOTES ), "\n";}}}}?>