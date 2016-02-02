<?php defined('SYSPATH') OR die ('No direct script access');
/**
*
* API Controller
*
* @package		AMAP Rouen
* @category		API
* @author		Ziopod <ziopod@gmail.com>
* @copyright	(c) 2013-2014 Ziopod
* @license		http://opensource.org/licenses/MIT
**/

Class Controller_Api extends Controller {

	/**
	* Before hook
	*
	* Grant access to actions
	**/
	public function before()
	{
		// Check secret key
		if ( ! Request::current()->query('secret') OR (Request::current()->query('secret') !== Kohana::$config->load('tanuki.secret')))
		{
			throw HTTP_Exception::factory(403, "acces denied");		  
		}
	}

	/**
	* Synch local content with distant repo
	**/
	public function action_synch()
	{
		$response = $this->publish_content(Kohana::$config->load('tanuki.repo'));
		$this->response->body($response);
	}

	/**
	* Publish content
	*
	* Exec Git pull action
	*
	* @param 	array	Git config 
	* @return 	string	Result 
	**/
	public function publish_content($config)
	{
		// Synch content with Git
		$path = $config['local_path'];
		$remote = $config['remote'];
		$branch = $config['branch'];
		$output = shell_exec("cd $path; git pull $remote $branch;");
		$result = "Publish from $remote $branch \r $output";
		Log::instance()->add(Log::INFO, $result);
		return $result;
	}
}