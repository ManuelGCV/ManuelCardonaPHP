<?php

namespace ManuelCardona\Talent\Core;

/**
 * This class will be in charge of comunication between
 * JSON databases.
 * As each database is managed differently, this class was not extended
 */
class Database
{
	
	public function __construct(public string $db)
	{

	}

	public function read()
	{
		$data = json_decode(file_get_contents(filename:dirname(__DIR__, 1).'/Database/'.$this->db.'.json'));
	}
	
}
