<?php class textarea extends base_text{protected $classe = __CLASS__;static $compteur = 0;protected $readonly;protected $dirname;protected $rows;protected $cols;protected $wrap;const TYPE = 'textarea';const HARD = 'hard';const SOFT = 'soft';
function __construct( $param=NULL ){$this::$compteur++;$refparam = self::TYPE;parent::__construct( $param, $refparam );$this->set_warp( $refparam[0] );$this->set_readonly( $refparam[1] );$this->set_dirname( $refparam[2] );$this->set_rows( $refparam[3] );
$this->set_cols( $refparam[4] );$this->set_tmaxlength( $refparam[5] );$this->set_value_textarea( $this->value );$this->size = NULL;$this->pattern = NULL;$this->autocomplete = NULL;}
private function test_tdel( $tab, $key ){if( !is_string( $tab ) ){array_splice( $this->value, $key );}}
protected function set_value_textarea( $arg = NULL ){if( is_array( $arg ) ){array_walk( $arg, 'TEXTAREA::test_tdel' );}else{$this->value = NULL;}}
private function set_warp( $arg=NULL ){$arg = strtolower( $arg );if( $arg == self::HARD ){$this->wrap = self::HARD;}else{$this->wrap = self::SOFT;}}
private function set_dirname( $arg=NULL ){$arg = strtoupper( $arg );if( $arg != NULL ){$this->dirname = $arg;}else{$this->dirname = NULL;}}
private function set_tmaxlength( $arg=NULL ){if( ctype_digit( $arg ) && $arg > 0 ){$this->maxlength = $arg;}else{$this->maxlength = 45;}}
private function set_rows( $arg=NULL ){if( ctype_digit( $arg ) && $arg > 0 ){$this->rows = $arg;}else{$this->rows = 3;}}
private function set_cols( $arg=NULL ){if( ctype_digit( $arg  ) && $arg > 0 ){$this->cols = $arg;}else{$this->cols = 15;}}
function write( $screen = NULL ){$name = $this->name;for( $i = 1; $i <= $this->number; $i++ ){if( $this->number > 1 ){ $name = $this->name.'[]'; }$l1 = '<textarea name="'.$name.'"';$lab = '';parent::multi_write( $i, $l1, $lab );
if( $this->maxlength != NULL ){$l1 .= ' maxlength="'.$this->maxlength.'"';}if( $this->css != NULL ){$l1 .= ' '.$this->css;}if( $this->source != NULL ){$l1 .= ' '.$this->source;}if( $this->autocomplete == '1' ){$l1 .= ' autocomplete="on"';}if( $this->autocomplete == '0' ){
$l1 .= ' autocomplete="off"';}if( $this->autofocus == '1' && $i < 2 ){$l1 .= ' autofocus="autofocus"';}if( isset( $this->placeholder[$i-1] ) ){$l1 .= ' placeholder="'.$this->placeholder[$i-1].'"';}if( $this->required != NULL ){$l1 .= ' required="required"';}
if( $this->form != NULL ){$l1 .= ' form="'.$this->form.'"';}if( $this->dirname != NULL ){$l1 .= ' dirname="'.$this->dirname.'"';}$l1 .= ' wrap="'.$this->wrap.'"';if( $this->globalattr != NULL ){$l1 .= $this->globalattr->write_globalattr( $i );}$l1 .= '>';
if( isset( $this->value[$i-1] ) ){$l1 .= $this->value[$i-1];}$l1 .= '</textarea>';switch( $this->past ){case 1:$l1 = $l1.$lab;break;case 0:$l1 = $lab.$l1;break;}
if( $this->br != NULL ){ $l1.= $this->br; }
if( $screen == NULL ){echo $l1, "\n";}else{echo htmlentities( $l1, ENT_QUOTES ), "\n";}}}}?>