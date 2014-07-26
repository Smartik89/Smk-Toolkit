<?php
/* 
 * Global data
 *
 * Access to global data such as, admin pages, metboxes, widgets created by Smk Toolkit
 * and other global hooks(actions and filters).
 *
 * -------------------------------------------------------------------------------------
 * @Author: Smartik
 * @Author URI: http://smartik.ws/
 * @Copyright: (c) 2014 Smartik. All rights reserved
 * -------------------------------------------------------------------------------------
 *
 * @Date:   2014-07-05 01:21:38
 * @Last Modified by:   Smartik
 * @Last Modified time: 2014-07-24 13:57:52
 *
 */
function smk_register_toolkit_actions(){
	do_action('smk_register'); //Register actions
	do_action('smk_display');  //Display actions
}
add_action('init', 'smk_register_toolkit_actions');

//Combine field ajax
//A very important action. This create a new section for combine field
add_action( 'wp_ajax_smk_combine_single_li_ajax', "Smk_Field::combine_single_li_ajax" );

//------------------------------------//--------------------------------------//

/**
 * Get all registered fields.
 *
 * Get all registered fields.
 *
 * @return array 
 */
function smk_all_fields(){
	return apply_filters('smk_all_fields', array());
}
add_action('init', 'smk_all_fields');

//------------------------------------//--------------------------------------//

/**
 * Get all panels(options pages).
 *
 * Get all registered admin panels(options pages).
 *
 * @return array 
 */
function smk_mod_all_panels(){
	return apply_filters('smk_mod_all_panels', array());
}

//------------------------------------//--------------------------------------//

/**
 * Get all metaboxes.
 *
 * Get all registered metaboxes.
 *
 * @return array 
 */
function smk_mod_all_metaboxes(){
	return apply_filters('smk_mod_all_metaboxes', array());
}