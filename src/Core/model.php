<?php

namespace ManuelCardona\Talent\Core;

class Model
{
	private Database $db;

	public function __construct($dbName)
	{
		$this->db = new Database($dbName);
	}

}
