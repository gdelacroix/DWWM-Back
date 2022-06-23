<?php class range extends base_text{protected $classe = __CLASS__;static $compteur = 0;protected $list;protected $min;protected $max;protected $step;const TYPE = 'range';function __construct( $param=NULL ){$this::$compteur++;$refparam = self::TYPE;
parent::__construct( $param, $refparam );$this->set_list( $refparam[0] );$this->set_float_format( $refparam[1], $this->min );$this->set_float_format( $refparam[2], $this->max );$this->set_float_format( $refparam[3], $this->step, '+' );$this->pattern = NULL;
$this->set_value_format( $this->value );$this->maxlength = NULL;$this->placeholder = NULL;$this->required = NULL;$this->size = NULL;}
protected function set_float_format( $arg=NULL, & $val=NULL, $special=NULL ){switch( $special ){case '+':if( is_numeric( $arg ) && $arg > 0 ){$val = $arg;}else{$val = NULL;}break;case '+INT':if( is_numeric( $arg ) && $arg > 0 ){$val = round( $arg );
}else{$val = NULL;}break;default:if( is_numeric( $arg ) ){$val = $arg;}else{$val = NULL;}}}
private function test_del( $tab, $key, $s ){switch( $s ){case '+':if( !is_numeric( $tab ) || $tab < 0 ){unset( $this->value[$key] );}break;default:if( !is_numeric( $tab ) ){unset( $this->value[$key] );}}}
protected function set_value_format( $arg = NULL, $special = NULL ){if( is_array( $arg ) ){array_walk( $arg, 'RANGE::test_del', $special );}else{$this->value = NULL;}}
function write( $screen = NULL ){$name = $this->name;for( $i = 1; $i <= $this->number; $i++ ){if( $this->number > 1 ){ $name = $this->name.'[]'; }$l1 = '<input name="'.$name.'" type="'.self::TYPE.'"';$lab = '';parent::multi_write( $i, $l1, $lab );
if( $this->css != NULL ){$l1 .= ' '.$this->css;}if( $this->source != NULL ){$l1 .= ' '.$this->source;}if( isset( $this->value[$i-1] ) ){$l1 .= ' value="'.$this->value[$i-1].'"';}if( $this->autocomplete == '1' ){$l1 .= ' autocomplete="on"';}if( $this->autocomplete == '0' ){
$l1 .= ' autocomplete="off"';}if( $this->autofocus == '1' && $i < 2 ){$l1 .= ' autofocus="autofocus"';}if( $this->list != NULL ){$l1 .= ' list="'.$this->list.'"';}if( $this->form != NULL ){$l1 .= ' form="'.$this->form.'"';}if( $this->min != NULL ){
$l1 .= ' min="'.$this->min.'"';}if( $this->max != NULL ){$l1 .= ' max="'.$this->max.'"';}if( $this->step != NULL ){$l1 .= ' step="'.$this->step.'"';}if( $this->globalattr != NULL ){$l1 .= $this->globalattr->write_globalattr( $i );}$l1 .= '>';switch( $this->past ){case 1:
$l1 = $l1.$lab;break;case 0:$l1 = $lab.$l1;break;}
if( $this->br != NULL ){ $l1.= $this->br; }
if( $screen == NULL ){echo $l1, "\n";}else{echo htmlentities( $l1, ENT_QUOTES ), "\n";}}}}?>