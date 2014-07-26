<?php
/* 
 * Access to Smk Toolkit
 *
 * Functions that provide access to Smk Toolkit root
 *
 * -------------------------------------------------------------------------------------
 * @Author: Smartik
 * @Author URI: http://smartik.ws/
 * @Copyright: (c) 2014 Smartik. All rights reserved
 * -------------------------------------------------------------------------------------
 *
 * @Date:   2014-07-05 01:18:17
 * @Last Modified by:   Smartik
 * @Last Modified time: 2014-07-14 17:13:03
 *
 */
/**
 * Smk toolkit path
 *
 * Main function to get the path to a directory from plugin root
 *
 * @param string $name Directory name ex: 'mod' 
 * @param bool $return Return or echo(boolean). Default return.
 * @param bool $return_uri Return the uri(not path) if is `true`.
 *
 * @return string The path or URI
 */
if( ! function_exists('smk_toolkit_path') ){
	function smk_toolkit_path($name = false, $return = true, $return_uri = false){
		//Return the path or uri.
		$dir = ( $return_uri ) ? SMK_TOOLKIT_URI : SMK_TOOLKIT_PATH;
		//If the folder name is set
		$path = ( $name && !empty($name) ) ? $dir . $name . "/" : $dir;
		//Return or echo the result
		if( $return ) {
			return $path;
		}
		else{
			echo $path;
		}
	}
}

//------------------------------------//--------------------------------------//

/**
 * Smk toolkit uri
 *
 * Main function to get the uri to a directory from plugin root
 *
 * @param string $name Directory name ex: 'mod' 
 * @param bool $return Return or echo(boolean). Default return.
 *
 * @return string The URI
 */
if( ! function_exists('smk_toolkit_uri') ){
	function smk_toolkit_uri($name = false, $return = true){
		return smk_toolkit_path($name, $return, true);
	}
}

//------------------------------------//--------------------------------------//

/**
 * File require(_once)
 *
 * This function is designed to require files, such as helpers, custom functions, etc.
 *
 * @param array|string $files Files to require. Relative path to plugin directory.
 * @param string 'require_once' or 'require'
 */
if( !function_exists('smk_toolkit_require') ){
	function smk_toolkit_require($common_path = false, $files = '', $require = 'require_once'){

		$inclusion   = ( $require && in_array($require, array('require', 'require_once')) ) ? $require : 'require_once';
		$global_path = ( $common_path && !empty($common_path) ) ? trailingslashit( $common_path ) : '';
		$the_path    =  smk_toolkit_path() . $global_path;

		if( is_array($files) ){
			foreach ($files as $file) {
				if( $inclusion == 'require' ){
					require( $the_path . $file );
				}
				else{
					require_once( $the_path . $file );
				}
			}
		}
		elseif( is_string($files) ){
			if( $inclusion == 'require' ){
				require( $the_path . $files );
			}
			else{
				require_once( $the_path . $files );
			}
		}
	}
}

//------------------------------------//--------------------------------------//

/**
 * File include(_once)
 *
 * This function is designed to include files, such as helpers, custom functions, etc.
 *
 * @param array|string $files Files to include. Absolute path.
 * @param string 'include_once' or 'include'
 */
if( !function_exists('smk_toolkit_include') ){
	function smk_toolkit_include( $common_path = false, $files = '', $include = 'include'){

		$inclusion   = ( $include && in_array($include, array('include', 'include_once')) ) ? $include : 'include';
		$global_path = ( $common_path && !empty($common_path) ) ? trailingslashit( $common_path ) : '';
		$the_path    =  smk_toolkit_path() . $global_path;

		if( is_array($files) ){
			foreach ($files as $file) {
				if( $inclusion == 'include' ){
					include( $the_path . $file );
				}
				else{
					include_once( $the_path . $file );
				}
			}
		}
		elseif( !empty($files) ){
			if( $inclusion == 'include' ){
				include( $the_path . $files );
			}
			else{
				include_once( $the_path . $files );
			}
		}
	}
}