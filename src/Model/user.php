<?php

namespace ManuelCardona\Talent\Model;

use ManuelCardona\Talent\Core\Database;
use ManuelCardona\Talent\Core\Model;

class UserModel extends Model
{
	private Database $db;
	//access database and get this info
	public string $phoneNumber;
	public string $email;
		
	public function __construct(
		public string $username,
		private string $password
	)
	{
		$this->db = new Database('users');
		$this->phoneNumber = '';
		$this->email = '';
	}

	public function read()
	{
		$data = json_decode(file_get_contents(filename:dirname(__DIR__, 1).'/Database/'.'users'.'.json'), true);
		return $data['Users'];
	}

	public function exists(string $username)
	{
		$data = $this->read();
		foreach ($data as $user) {
			if ($user['Username'] == $username) {
				return true;
			}
		}
		return null;
		
	}

	public function verifyPassword(string $username, string $password)
	{
		$data = $this->read();
		foreach ($data as $user) {
			if ($user['Username'] == $username && $user['Password'] == $password) {
				return true;
			}
		}
		return null;
	}

	public function findUser(string $username)
	{
		$data = $this->read();
		foreach ($data as $user) {
			if ($user['Username'] == $username) {
				return $user;
			}
		}
		return null;
	}

	public function save(string $username, string $password, string $email, string $phoneNumber)
	{
		if ($this->exists($username)){
			return null;
		}
		
		$data = $this->read();
		$user["Username"] = $username;
		$user["Email"] = $email;
		$user["Phone number"] = $phoneNumber;
		$user["Password"] = $password;
		array_push($data,$user);
		$newData['Users'] = $data;
		file_put_contents(dirname(__DIR__, 1).'/Database/'.'users'.'.json', json_encode($newData));
	}



}
