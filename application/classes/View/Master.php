<?php
/**
* # Master view model
*
* Please copy this file on your project and add your custom View Model POO properties and method.
*
* @package		Tanuki
* @category		View Model
* @author		Ziopod <ziopod@gmail.com>
* @copyright	(c) 2013-2014 Ziopod
* @license		http://opensource.org/licenses/MIT
**/

class View_Master extends View_Tanuki {

	/**
	* Somes defaults globales data for all views
	*
	* @return	array	Global informations
	**/
	public function tanuki()
	{
		return array(
			'title' 		=> "Michel la revue",
			'description'	=> "Art, culture &amp; société en Normandie",
			'author'		=> array(
				'name'		=> "Michel",
				'email'		=> "hello@michel-larevue.fr",
				'url'		=> "http://michel-larevue.fr",
			),
			'license'		=> array(
				'name'		=> 'MIT',
				'url'		=> 'http://opensource.org/licenses/mit-license.php',
			),
		);
	}

	/**
	* Define main navigation
	*
	* @return 	array
	**/
	public function navigation()
	{
		return array(
			array(
				'url'		=> $this->base_url() . 'editorial',
				'name'		=> __('Éditorial'),
				'title'		=> __('À propos de Michel la revue'),
				'current'	=> Request::initial()->controller() === 'App' AND Request::initial()->param('slug') === 'editorial',
			),
		);
	}
}