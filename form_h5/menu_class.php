<?php class menu extends base_text{protected $classe = __CLASS__;static $compteur = 0;protected $selected;protected $multiple;const TYPE = 'menu';function __construct( $param=NULL ){$this::$compteur++;$refparam = self::TYPE;
parent::__construct( $param, $refparam );if( $refparam[2] == 0 ){$this->size = NULL;}$this->set_selected( $refparam[0] );$this->set_multiple( $refparam[1] );$this->set_value_menu( $this->value );$this->number = 1;$this->pattern = NULL;$this->maxlength = NULL;$this->placeholder = NULL;
$this->autocomplete = NULL;}
private function test_mdel( $tab, $key ){if( !is_string( $tab ) ){array_splice( $this->value, $key );}}
protected function set_value_menu( $arg = NULL ){if( is_array( $arg ) ){array_walk( $arg, 'MENU::test_mdel' );}else{$this->value = NULL;}}
private function set_multiple( $arg=NULL ){$arg = strtoupper( $arg );if( ($arg == '1' || $arg == 'TRUE') && $this->size > 0 ){$this->multiple = 1;}else{$this->multiple = NULL;}}
private function set_selected( $arg=NULL ){$tmp = $this->string_array( $arg );$nbr = count( $this->value );$this->selected = array();try{if( $tmp ){$tmp = explode( '|', $arg, $nbr+1 );if( $this->size < 1 ){array_splice( $tmp, 1 );}
foreach( $tmp as $el ){if( $el > $nbr ){throw new Exception( 'selected argument overflow =>class MENU' );}}$this->selected = $tmp;}elseif( $tmp === FALSE ){foreach( $arg as $el ){if( $el > $nbr ){throw new Exception( 'selected argument overflow =>class MENU' );}}
if( $this->size < 1 ){array_splice( $tmp, 1 );}$this->selected = $arg;}else{$this->selected = array();}}catch( Exception $error ){echo $error->getMessage();}}
function write( $screen = NULL ){$name = $this->name;for( $i = 1; $i <= $this->number; $i++ ){if( $this->number > 1 ){ $name = $this->name.'[]'; }$l1 = '<select name="'.$name.'"';$lab = '';parent::multi_write( $i, $l1, $lab );
if( $this->size != NULL ){$l1 .= ' size="'.$this->size.'"';}if( $this->css != NULL ){$l1 .= ' '.$this->css;}if( $this->source != NULL ){$l1 .= ' '.$this->source;}if( $this->multiple != NULL && $this->size != NULL ){$l1 .= ' multiple="multiple"';}
if( $this->autofocus == '1' && $i < 2 ){$l1 .= ' autofocus="autofocus"';}if( $this->required != NULL ){$l1 .= ' required="required"';}if( $this->form != NULL ){$l1 .= ' form="'.$this->form.'"';}if( $this->globalattr != NULL ){$l1 .= $this->globalattr->write_globalattr( $i );}$l1 .= '>';
if( isset( $this->value[0] ) ){foreach( $this->value as $k=>$el ){$l1 .= '<option';if( in_array( ($k+1), $this->selected ) ){$l1 .= ' selected';}$l1 .= '>'.$el.'</option>';}$l1 .= '</select>';}switch( $this->past ){case 1:$l1 = $l1.$lab;break;case 0:$l1 = $lab.$l1;break;}
if( $this->br != NULL ){ $l1.= $this->br; }
if( $screen == NULL ){echo $l1, "\n";}else{echo htmlentities( $l1, ENT_QUOTES ), "\n";}}}}?>