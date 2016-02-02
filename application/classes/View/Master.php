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
	* Styles
	*
	* @return	array
	**/
	public function styles()
	{
		return array(
			array(
				'src'	=> $this->base_url() . 'assets/css/main.css',
			)
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

	/**
	* Set HTML metas list
	*
	* Try to grab metas from Flatfile, even load metas from configuration file
	*
	* @return	array
	**/
	public function metas()
	{
		// Load metas from config file, remplaced by values set in Flatfile
		$model_name = $this->model_name;
		$default_metas = Kohana::$config->load('tanuki.metas');
		$metas = array();

		if ($default_metas)
		{
			foreach ($default_metas as $name => $content)
			{
				$metas[] = array(
					'name' => $name,
					'content' => $this->$model_name->$name ? $this->$model_name->$name : $content,
				);
			}			
		}

		return $metas;
	}
}