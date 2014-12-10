<?php
/* 
 * Helper text for Admin Pages
 *
 * Help the developer step by step
 *
 * -------------------------------------------------------------------------------------
 * @Author: Smartik
 * @Author URI: http://smartik.ws/
 * @Copyright: (c) 2014 Smartik. All rights reserved
 * -------------------------------------------------------------------------------------
 *
 */
if( !defined('ABSPATH') ) exit();
?>
<h3>Congrats! You've just created a new admin page.</h3> 
<p>This is the default page content. To change this content, you must create two methods one with the name 
<code>settings()</code> and another with the name <code>page()</code>, in the child class.</p>

<p><strong>Here is an example:</strong></p>
<p><em>(<code>public</code> keyword is optional)</em>. Here are just some of the options. Please refer to docs for all info.</p>
<pre>
public function settings(){
	return array(
		'parent_slug' => 'smk_toolkit',             // Default to <code>null</code>
		'menu_title'  => 'My page/menu title',      // Default to menu slug
		'page_title'  => 'A different page title.', // Replaces menu title.
		'capability'  => 'manage_options',          // Minimum user capability. Default <code>'manage_options'</code>
	);
}
public function page(){
	echo 'My new page content.'; // This is just and example.
}</pre>