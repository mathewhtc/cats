<?php
/**
 * Codice HTML per il form di impostazione collegato 
 * al widget presente nella parte di amministrazione, questo
 * codice è su file separato per escluderlo dal frontend
 *
 * @package SZGoogle
 * @subpackage SZGoogleTinyMCE
 */
if (!defined('SZ_PLUGIN_GOOGLE') or !SZ_PLUGIN_GOOGLE) die();

// Creazione array per elenco campi che devono essere 
// presenti nel form prima di richiamare wp_parse_args()

$array = array(
	'title'       => '', // valore predefinito
	'channel'     => '', // valore predefinito
	'method'      => '', // valore predefinito
	'width'       => '', // valore predefinito
	'width_auto'  => '', // valore predefinito
	'height'      => '', // valore predefinito
	'height_auto' => '', // valore predefinito
);

// Creazione array per elenco campi da recuperare su FORM e
// caricamento del file con il template HTML da visualizzare

extract(wp_parse_args($instance,$array),EXTR_OVERWRITE);

// Impostazione eventuale di parametri di default per i
// campi che contengono dei valori non validi o non coerenti 

if (!ctype_digit($method) or $method == 0) { $method = '1'; }
if (!ctype_digit($width)  or $width  == 0) { $width  = 'auto'; $width_auto  = '1'; }
if (!ctype_digit($height) or $height == 0) { $height = 'auto'; $height_auto = '1'; }

// Caricamento template ADMIN per composizione shortcodes
// utilizzando in molti casi lo stesso codice del Widget

@include(dirname(SZ_PLUGIN_GOOGLE_MAIN).'/admin/mce/shortcodes/SZGoogleBaseHeader.php');
@include(dirname(SZ_PLUGIN_GOOGLE_MAIN).'/admin/widgets/SZGoogleWidgetYoutubeBadge.php');
@include(dirname(SZ_PLUGIN_GOOGLE_MAIN).'/admin/mce/shortcodes/SZGoogleBaseFooter.php');