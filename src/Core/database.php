<?php

namespace ManuelCardona\Talent\Core;

/**
 * This class will be in charge of comunication between
 * JSON databases, also may be in charge of storing information
 */
class Database
{
	
	public function __construct(public string $db)
	{

	}

	public function create()
	{
		# code...
	}


	public function read()
	{
		$data = json_decode(file_get_contents(filename:dirname(__DIR__, 1).'/Database/'.$this->db.'.json'));
	}

	public function update()
	{
		# code...
	}

	
}
