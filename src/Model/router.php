<?php

namespace ManuelCardona\Talent\Model;

class Router
{
	public string $controller = '';
	public string $method = '';
	public array $parameters = [];

	public function __construct()
	{
		if (isset($_GET['url'])) {
			$url = $_GET['url'];
			$url = rtrim($url, '/');
			$params = explode('/', $url);
			switch (count($params)) {
				case 0:
					$this->controller = 'login';
					$this->method = 'index';
					break;
				case 1:
					$this->controller = $params[0];
					$this->method = 'index';
					break;
				case 2:
					$this->controller = $params[0];
					$this->method = $params[1];
					break;
						
				default:
					$this->controller = $params[0];
					$this->method = $params[1];
					array_shift($params);
					array_shift($params);
					$this->parameters = $params;
					break;
			}
			
		} else {

		} 
		
	}
}
