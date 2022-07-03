<?php

namespace ManuelCardona\Talent\Core;

class View
{
	/**
	 * this method will be the one called to render views
	 * will use name to find view file, and will use data to show
	 * any information received
	 * 
	 * @param string $name
	 * @param array $data
	 * 
	 * Result: render a view called
	 */
	public function render(string $name, array $data = [])
	{
		$this->data = $data;
		require 'src/View/' . $name . '.php';
	}
}
