<?php
/* 
 * Plugin Name: SMK Toolkit 1
 * Plugin URI:  http://smk-toolkit.com/
 * Description: A powerful plugin that will help you to develop themes and plugins in a fast and easy way without too much stress. 
 * Author:      Smartik
 * Author URI:  http://smartik.ws/
 * Version:     1.0 beta
 * Copyright:   (c) 2014 Andrei Surdu. All rights reserved
 *
 * -------------------------------------------------------------------------------------
 * @Author: Smartik
 * @Author URI: http://smartik.ws/
 * @Copyright: (c) 2014 Smartik. All rights reserved
 * -------------------------------------------------------------------------------------
 *
 * @Date:   2014-07-12 19:37:07
 * @Last Modified by:   Smartik
 * @Last Modified time: 2014-07-24 14:02:35
 *
 */
//Do not allow direct access to this file.
if( ! function_exists('add_action') ) 
	die();

/*
--------------------------------------------------------------------------------
Constants
--------------------------------------------------------------------------------
*/
//General
if( ! defined('SMK_TOOLKIT_PATH') )   define( 'SMK_TOOLKIT_PATH', plugin_dir_path(__FILE__) );
if( ! defined('SMK_TOOLKIT_URI') )    define( 'SMK_TOOLKIT_URI', plugin_dir_url(__FILE__) );

//This class is for future use, and shouldn't be escaped with class_exists.
//class Smk_Toolkit{}

/**
 * Plugin version
 *
 * Get the current plugin version.
 * 
 * @return string 
 */
function smk_toolkit_version(){
	if( is_admin() ){
		$data = get_file_data( __FILE__, array( 'Version' ) );
		return empty( $data ) ? '' : $data[0];
	}
	else{
		return false;
	}
}

/*
--------------------------------------------------------------------------------
Plugin's specific
--------------------------------------------------------------------------------
*/
// add_action( 'plugins_loaded', 'smk_tookit_load_translations' );
// function smk_tookit_load_translations() {
// 	load_plugin_textdomain( 
// 		'smk_toolkit', 
// 		false, 
// 		dirname( plugin_basename( __FILE__ ) ) . '/languages/' 
// 	); 
// }

/*
-------------------------------------------------------------------------------
Access to plugin directory
-------------------------------------------------------------------------------
*/
require_once SMK_TOOLKIT_PATH .'admin/access.php';

/*
--------------------------------------------------------------------------------
Global data
--------------------------------------------------------------------------------
*/
smk_toolkit_require( 'admin', array(
	'global.php',
));

/*
--------------------------------------------------------------------------------
Helpers
--------------------------------------------------------------------------------
*/
smk_toolkit_require( 'functions', array(
	'data.php',
	'debug.php',
	'aq_resizer.php',
));

/*
--------------------------------------------------------------------------------
Fields
--------------------------------------------------------------------------------
*/
smk_toolkit_require( 'fields', array(
	'options.php',
	'fields.php',
));
smk_toolkit_require( 'fields', array(
	'input/field.php',
));

/*
--------------------------------------------------------------------------------
Mods
--------------------------------------------------------------------------------
*/
smk_toolkit_require( 'mod', array(
	'admin-page/admin-page.php',
));

/*
--------------------------------------------------------------------------------
Enqueue scripts and styles
--------------------------------------------------------------------------------
*/
smk_toolkit_require( 'base', array(
	'enqueue.php',
));


/*
--------------------------------------------------------------------------------
Create Smk Toolkit Admin page
--------------------------------------------------------------------------------
*/
smk_toolkit_require( 'admin', array(
	'smk-toolkit-page.php',
));