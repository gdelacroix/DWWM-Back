<?php  
$rep_ = dirname( __FILE__ );
// Pour gagner en vitesse de chargement mettre en commentaire my_autoloader() et spl_autoload()
// et décommenter tous les includes

/*function my_autoloader( $class ){
	include $GLOBALS['rep_'].'/'.$class.'_class.php';
}

spl_autoload_register( 'my_autoloader' );*/

//-----------------------------------------

include_once( "$rep_/global_attr_class.php" );
include( "$rep_/analyse_class.php");
include( "$rep_/base_form_class.php");
include( "$rep_/form_class.php");
include_once( "/form_h5/_scandir.php" );
include( "$rep_/file_field_class.php" );
include( "$rep_/button_class.php");
include( "$rep_/base_text_class.php");
include( "$rep_/text_class.php");
include( "$rep_/email_class.php");
include( "$rep_/url_class.php");
include( "$rep_/tel_class.php");
include( "$rep_/search_class.php");
include( "$rep_/range_class.php");
include( "$rep_/number_class.php");
include( "$rep_/time_class.php");
include( "$rep_/week_class.php");
include( "$rep_/date_class.php");
include( "$rep_/date_time_class.php");
include( "$rep_/color_class.php");
include( "$rep_/checkbox_class.php");
include( "$rep_/password_class.php");
include( "$rep_/radio_class.php");
include( "$rep_/menu_class.php");
include( "$rep_/textarea_class.php");
include( "$rep_/datalist_class.php");
?>