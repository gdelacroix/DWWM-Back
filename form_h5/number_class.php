<?php class number extends range{protected $classe = __CLASS__;static $compteur = 0;protected $readonly;const TYPE = 'number';function __construct( $param=NULL ){$this::$compteur++;$refparam = self::TYPE;BASE_TEXT::__construct( $param, $refparam );
$this->set_list( $refparam[0] );$this->set_readonly( $refparam[1] );parent::set_float_format( $refparam[2], $this->min );parent::set_float_format( $refparam[3], $this->max );parent::set_float_format( $refparam[4], $this->step, '+' );parent::set_value_format( $this->value);
$this->pattern = NULL;$this->maxlength = NULL;$this->size = NULL;}
function write( $screen = NULL ){$name = $this->name;for( $i = 1; $i <= $this->number; $i++ ){if( $this->number > 1 ){ $name = $this->name.'[]'; }$l1 = '<input name="'.$name.'" type="'.self::TYPE.'"';$lab = '';parent::multi_write( $i, $l1, $lab );
if( $this->css != NULL ){$l1 .= ' '.$this->css;}if( $this->source != NULL ){$l1 .= ' '.$this->source;}if( isset( $this->value[$i-1] ) ){$l1 .= ' value="'.$this->value[$i-1].'"';}if( $this->autocomplete == '1' ){$l1 .= ' autocomplete="on"';}if( $this->autocomplete == '0' ){
$l1 .= ' autocomplete="off"';}if( $this->autofocus == '1' && $i < 2 ){$l1 .= ' autofocus="autofocus"';}if( $this->list != NULL ){$l1 .= ' list="'.$this->list.'"';}if( $this->readonly != NULL ){$l1 .= ' readonly="readonly"';}if( isset( $this->placeholder[$i-1] ) ){
$l1 .= ' placeholder="'.$this->placeholder[$i-1].'"';}if( $this->required != NULL ){$l1 .= ' required="required"';}if( $this->form != NULL ){$l1 .= ' form="'.$this->form.'"';}if( $this->min != NULL ){$l1 .= ' min="'.$this->min.'"';}if( $this->max != NULL ){$l1 .= ' max="'.$this->max.'"';}
if( $this->step != NULL ){$l1 .= ' step="'.$this->step.'"';}if( $this->globalattr != NULL ){$l1 .= $this->globalattr->write_globalattr( $i );}$l1 .= '>';switch( $this->past ){case 1:$l1 = $l1.$lab;break;case 0:$l1 = $lab.$l1;break;}
if( $this->br != NULL ){ $l1.= $this->br; }
if( $screen == NULL ){echo $l1, "\n";
}else{echo htmlentities( $l1, ENT_QUOTES ), "\n";}}}}?>