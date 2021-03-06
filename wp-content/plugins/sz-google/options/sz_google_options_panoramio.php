<?php
/**
 * Definizione array per le opzioni del plugin legate al modulo
 * corrispondente con cui sviluppare la funzione getOptions() e
 * le operazioni legate alla fase di attivazione del plugin.
 *
 * @package SZGoogle
 * @subpackage SZGoogleOptions
 */
if (!defined('SZ_PLUGIN_GOOGLE') or !SZ_PLUGIN_GOOGLE) die();

// Definizione array() con tutte le opzioni collegate al modulo che
// dovranno essere richiamate tramite un include(setoptions)

return array(
	'panoramio_widget'        => array('N'=>'0','Y'=>'1','Z'=>'0','value' => '1'),
	'panoramio_shortcode'     => array('N'=>'0','Y'=>'1','Z'=>'0','value' => '1'),
	'panoramio_s_template'    => array('N'=>'1','Y'=>'0','Z'=>'0','value' => 'photo'),
	'panoramio_s_width'       => array('N'=>'1','Y'=>'0','Z'=>'1','value' => 'auto'),
	'panoramio_s_height'      => array('N'=>'1','Y'=>'0','Z'=>'1','value' => 'auto'),
	'panoramio_s_orientation' => array('N'=>'1','Y'=>'0','Z'=>'0','value' => 'horizontal'),
	'panoramio_s_list_size'   => array('N'=>'1','Y'=>'0','Z'=>'1','value' => '6'),
	'panoramio_s_position'    => array('N'=>'1','Y'=>'0','Z'=>'0','value' => 'bottom'),
	'panoramio_s_paragraph'   => array('N'=>'0','Y'=>'1','Z'=>'0','value' => '1'),
	'panoramio_s_delay'       => array('N'=>'1','Y'=>'0','Z'=>'0','value' => '2'),
	'panoramio_s_set'         => array('N'=>'1','Y'=>'0','Z'=>'0','value' => 'public'),
	'panoramio_s_columns'     => array('N'=>'1','Y'=>'0','Z'=>'0','value' => '4'),
	'panoramio_s_rows'        => array('N'=>'1','Y'=>'0','Z'=>'0','value' => '1'),
	'panoramio_w_template'    => array('N'=>'1','Y'=>'0','Z'=>'0','value' => 'photo'),
	'panoramio_w_width'       => array('N'=>'1','Y'=>'0','Z'=>'1','value' => 'auto'),
	'panoramio_w_height'      => array('N'=>'1','Y'=>'0','Z'=>'1','value' => 'auto'),
	'panoramio_w_orientation' => array('N'=>'1','Y'=>'0','Z'=>'0','value' => 'horizontal'),
	'panoramio_w_list_size'   => array('N'=>'1','Y'=>'0','Z'=>'1','value' => '6'),
	'panoramio_w_position'    => array('N'=>'1','Y'=>'0','Z'=>'0','value' => 'bottom'),
	'panoramio_w_paragraph'   => array('N'=>'0','Y'=>'1','Z'=>'0','value' => '0'),
	'panoramio_w_delay'       => array('N'=>'1','Y'=>'0','Z'=>'0','value' => '2'),
	'panoramio_w_set'         => array('N'=>'1','Y'=>'0','Z'=>'0','value' => 'public'),
	'panoramio_w_columns'     => array('N'=>'1','Y'=>'0','Z'=>'0','value' => '4'),
	'panoramio_w_rows'        => array('N'=>'1','Y'=>'0','Z'=>'0','value' => '1'),
);