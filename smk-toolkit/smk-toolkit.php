<?php
/*
Plugin Name: SMK Toolkit
Plugin URI: http://smk-toolkit.com/
Description: The lost piece from WordPress.
Author: Smartik
Author URI: http://smartik.ws/
Version: 1.0 beta
Copyright: (c) 2014 Andrei Surdu. All rights reserved
*/

// Do not allow direct access to this file.
if( ! function_exists('add_action') ) 
	die();

// This class is for future use, and shouldn't be escaped with class_exists.
class Smk_Toolkit{}

//------------------------------------//--------------------------------------//

/**
 * Load traslations
 *
 * @return void
 */
add_action( 'plugins_loaded', 'smk_tookit_load_translations' );
function smk_tookit_load_translations() {
	load_plugin_textdomain( 
		'smk_toolkit', 
		false, 
		dirname( plugin_basename( __FILE__ ) ) . '/languages/' 
	); 
}

//------------------------------------//--------------------------------------//

/**
 * Smk Toolkit Path
 *
 * The path to Smk Toolkit
 *
 * @param string $dir Optional. Point to a directory from the root of Smk Toolkit
 * @return string The path
 */
if( ! function_exists( 'stk_path' ) ){
	function stk_path( $dir = '' ){
		$path = trailingslashit( dirname( __FILE__ ) );
		if( !empty($dir) ){
			return $path . trailingslashit( $dir );
		}
		else{
			return $path;
		}
	}
}

//------------------------------------//--------------------------------------//

/**
 * Smk Toolkit Uri
 *
 * The Uri to Smk Toolkit
 *
 * @param string $dir Optional. Point to a directory from the root of Smk Toolkit
 * @return string The uri
 */
if( ! function_exists( 'stk_uri' ) ){
	function stk_uri( $dir = '' ){
		$uri = plugin_dir_url( __FILE__ );
		if( !empty($dir) ){
			return $uri . trailingslashit( $dir );
		}
		else{
			return $uri;
		}
	}
}

//------------------------------------//--------------------------------------//

/**
 * Include or require a file
 *
 * @param string $file_path The file path that needs to be included 
 * @param string $inc_function Function used to include the file
 * @return void
 */
if( ! function_exists( 'stk_to_include_or_require_file' ) ){
	function stk_to_include_or_require_file( $file_path, $inc_function = 'require_once' ){
		if( $inc_function == 'require_once' ){
			require_once( $file_path );
		}
		elseif( $inc_function == 'require' ){
			require( $file_path );
		}
		elseif( $inc_function == 'include_once' ){
			include_once( $file_path );
		}
		elseif( $inc_function == 'include' ){
			include( $file_path );
		}
		else{
			$inc_function( $file_path );
		}
	}
}

//------------------------------------//--------------------------------------//

/**
 * Add file
 *
 * Require/include files from the root of Smk Toolkit.
 *
 * @param bool|string $common_path The main path. Set to false to use the plugin path.
 * @param array|string $files Files to include.
 * @param string $inc_function Function used to include the file
 * @param string 'require_once', 'require', 'include_once' or 'include'
 *
 * @return void
 */
if( !function_exists('stk_add_file') ){
	function stk_add_file($common_path = false, $files = '', $inc_function = 'require_once'){

		$types       = array('require', 'require_once', 'include', 'include_once'); 
		$inclusion   = function_exists( $require ) ? $require : 'require_once';
		$global_path = ( !empty($common_path) ) ? trailingslashit( $common_path ) : '';
		$the_path    =  stk_path() . $global_path;

		if( is_array($files) ){
			foreach ($files as $file) {
				stk_to_include_or_require_file( $the_path . $file, $inc_function );
			}
		}
		else{
			stk_to_include_or_require_file( $the_path . $files, $inc_function );
		}
	}
}

//------------------------------------//--------------------------------------//

/**
 * Get all regitered mods
 *
 * Get all regitered mods. Every mod is in this function.
 *
 * @return array
 */
if( ! function_exists('stk_get_registered_mods') ){
	function stk_get_registered_mods(){
		return apply_filters( 'stk_register_mod', array() );
	}
}

//------------------------------------//--------------------------------------//

/**
 * Get all regitered mods settings
 *
 * Get all settings for all regitered mods.
 *
 * @return array
 */
if( ! function_exists('stk_get_registered_mods_settings') ){
	function stk_get_registered_mods_settings(){
		return apply_filters( 'stk_register_mod_settings', array() );
	}
}

/*
--------------------------------------------------------------------------------
Mods
--------------------------------------------------------------------------------
*/
stk_add_file( 'mod', array(
	'admin-page/admin-page.php',
	'metabox/metabox.php',
));

if( ! function_exists('stk_print') ){
	function stk_print( $var, $title = false ){
		if( $title ) echo '<h3>'. $title .'</h3>';
		echo '<pre>';
		print_r( $var );
		echo '</pre>';
	}
}

// stk_print( stk_get_registered_mods_settings(), 'Registered mods settings' );