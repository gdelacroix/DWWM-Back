<?php class color extends base_text{protected $classe = __CLASS__;protected $list;static $compteur = 0;const TYPE = 'color';function __construct( $param=NULL ){$this::$compteur++;$refparam = self::TYPE;parent::__construct( $param, $refparam );
$this->set_list( $refparam[0] );$this->set_value_color( $this->value );$this->pattern = NULL;$this->maxlength = NULL;$this->placeholder = NULL;$this->required = NULL;$this->size = NULL;}
protected function set_color( $arg=NULL, & $val = NULL ){$cr = strlen( $arg );if( strpos( $arg, '#' ) !== 0 ){$tc = explode( ' ', $arg, 4 );if( count( $tc ) != 3 ){return;}$val = $this->rgb( $tc[0], $tc[1], $tc[2] );return;}
if( $cr == 4 || $cr == 7 ){$val = $arg;}}
function rgb( $r, $g, $b ){try {if( ($r < 0 || $r > 255) || ($g < 0 || $g > 255) || ($b < 0 || $b > 255)  ){throw new Exception( 'bad argument =>rgb()' );}}catch( Exception $error ){echo $error->getMessage();return;}
return sprintf( '#%-02s%-02s%-02s', dechex($r), dechex($g), dechex($b) );}
private function test_cdel( $tab, $key ){$this->set_color( $tab, $t );if( $t == NULL ){array_splice( $this->value, $key );}else{$this->value[$key] = $t;}}
protected function set_value_color( $arg = NULL ){if( is_array( $arg ) ){array_walk( $arg, 'COLOR::test_cdel' );}else{$this->value = NULL;}}
function write( $screen = NULL ){$name = $this->name;for( $i = 1; $i <= $this->number; $i++ ){if( $this->number > 1 ){ $name = $this->name.'[]'; }$l1 = '<input name="'.$name.'" type="'.self::TYPE.'"';$lab = '';parent::multi_write( $i, $l1, $lab );
if( $this->css != NULL ){$l1 .= ' '.$this->css;}if( $this->source != NULL ){$l1 .= ' '.$this->source;}if( isset( $this->value[$i-1] ) ){$l1 .= ' value="'.$this->value[$i-1].'"';}if( $this->autocomplete == '1' ){$l1 .= ' autocomplete="on"';}if( $this->autocomplete == '0' ){
$l1 .= ' autocomplete="off"';}if( $this->autofocus == '1' && $i < 2 ){$l1 .= ' autofocus="autofocus"';}if( $this->list != NULL ){$l1 .= ' list="'.$this->list.'"';}if( $this->form != NULL ){$l1 .= ' form="'.$this->form.'"';}if( $this->globalattr != NULL ){
$l1 .= $this->globalattr->write_globalattr( $i );}$l1 .= '>';switch( $this->past ){case 1:$l1 = $l1.$lab;break;case 0:$l1 = $lab.$l1;break;}
if( $this->br != NULL ){ $l1.= $this->br; }
if( $screen == NULL ){echo $l1, "\n";}else{echo htmlentities( $l1, ENT_QUOTES ), "\n";}}}}?>