<?php
/*
Plugin Name: SMK Toolkit Test
Version: 1.0 beta
*/

add_action( 'plugins_loaded', 'stk_test_init' );
function stk_test_init(){
	if( class_exists('Smk_Toolkit') ){
		$firstMeta = new Smk_Metabox( 'first_meta', array(
			'title' => 'First meta',
			'page'  => array( 'post', 'custom_cpt' ),
			'context' => 'normal',
			'priority' => 'default'
		) );
		$secondMeta = new Smk_Metabox( 'second_meta', array(
			'title' => 'Second meta',
			'page'  => array( 'post' ),
			'context' => 'normal',
			'priority' => 'default'
		) );


		$firstMeta->addField( 'field_id_1' );
		$firstMeta->addField( 'field_id_2' );
		$secondMeta->addField( 'field_id_3' );

		// stk_print( stk_get_registered_mods_settings(), 'Registered mods settings' );
	}
}