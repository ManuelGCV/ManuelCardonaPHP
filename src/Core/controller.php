<?php

namespace ManuelCardona\Talent\Core;

/**
 * 
 */
class Controller
{
	//initialize view as we may call it later
	private View $view;

	protected function __construct()
	{
		$this->view = new View();
		$url = explode('/', $_SERVER['REQUEST_URI']);	
		
		$this->base_url = $url[1];
	
	}

	protected function render(string $name, array $data = [])
	{
		$data['BASE_URL'] = $this->base_url;
		$this->view->render($name, $data);
	}

	protected function post(string $param)
	{
		if (!isset($_POST[$param])) return null;
		return $_POST[$param];
	}

	protected function get(string $param)
	{
		if (!isset($_GET[$param])) return null;
		return $_GET[$param];
	}


}
