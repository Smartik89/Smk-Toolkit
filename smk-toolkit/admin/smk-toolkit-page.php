<?php
/* 
 * Smk Toolkit Main page
 *
 * The main page of Smk Toolkit Plugin.
 *
 * -------------------------------------------------------------------------------------
 * @Author: Smartik
 * @Author URI: http://smartik.ws/
 * @Copyright: (c) 2014 Smartik. All rights reserved
 * -------------------------------------------------------------------------------------
 *
 * @Date:   2014-06-26 21:51:11
 * @Last Modified by:   Smartik
 * @Last Modified time: 2014-07-05 07:07:38
 *
 */
if( ! class_exists('Smk_AdminPage_Toolkit') ){
	class Smk_AdminPage_Toolkit extends Smk_AdminPage{
		public function settings(){
			return array(
				'menu_type'     => 'menu',
				'menu_title'    => 'Smk Toolkit',
			);
		}

		public function page(){
			echo 'Smk Toolkit Admin Page';
		}
	}
}
$smk_toolkit_page = new Smk_AdminPage_Toolkit('smk_toolkit');
$smk_toolkit_page->init();