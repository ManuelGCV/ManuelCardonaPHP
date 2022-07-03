<?php

namespace ManuelCardona\Talent\Controller;

use ManuelCardona\Talent\Core\Controller;
//this require... was unable to just skip it, if we can talk about it I would be glad to
require_once 'src/Model/user.php';
use ManuelCardona\Talent\Model\UserModel;

/**
 * This controller will be the one managing every user action
 */
class Auth extends Controller
{
	//construct self and parent
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->render("login");
		
	}

	public function save()
	{
		$username = $this->post("username");
		$email = $this->post("email");
		$phoneNumber = $this->post("phoneNumber");
		$password = $this->post("password");
		$userModel = new UserModel($username, $password);
		//error validations, return message of each error if found or create user if validation pass
		$errors="";
		if (strlen($username) === 0) {
			$errors .= "Username must not be empty <br>";
		} elseif (!preg_match("/^[a-zA-Z]+$/",$username)) {
			$errors .= "Username must only contain letters <br>";
		} elseif ($userModel->exists($username)){
			$errors .= "Username already exists <br>";
		}
		if (strlen($email) === 0) {
			$errors .= "Email must not be empty <br>";
		//NOTE: even when test statest to use only regex to validate, yet it is not a recomended practice,
		//that is the reason filter_var is commented on this next line as recommended method
		//} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		} elseif (!preg_match("/^[a-zA-Z\d\._]+@[a-zA-Z\d\._]+\.[a-zA-Z\d\.]{2,}$/",$email)) {
			$errors .= "Email should be a valid email <br>";
		}
		if (strlen($phoneNumber) === 0) {
			$errors .= "Phone Number must not be empty <br>";
		} elseif (!preg_match("/^[+][\d]{9}$/",$phoneNumber)) {
			$errors .= "Phone number must start on + and have 9 digits after that<br>";
		}
		if (strlen($password) === 0) {
			$errors .= "Password must not be empty <br>";
		} elseif (!preg_match("/^(?=.*\.)|(?=.*\*)|(?=.*\-)(?=.*[A-Z]).{6,6}$/",$password)) {
			$errors .= "Password must contain . or * or - also, needs to contain a Capital letter, and also needs to be 6 characters long <br>";
		}
		if ($errors !== "") {
			$data["errors"] = $errors;
			$this->render("register", $data);
		} else {
			$userModel->save($username, $password, $email, $phoneNumber);
			header("location: login");
		}
		
	}

	public function login()
	{
		$this->render("login");
	}

	public function validate()
	{
		$username = $this->post("username");
		$password = $this->post("password");

		$errors="";
		if (strlen($username) === 0) {
			$errors .= "Username must not be empty <br>";
		}
		if (strlen($password) === 0) {
			$errors .= "Password must not be empty <br>";
		}
		if ($errors !== "") {
			$data["errors"] = $errors;
			$this->render("login", $data);
		}
		$userModel = new UserModel($username, $password);
		if (!$userModel->exists($username)){
			$errors .= "Incorrect Username or Password <br>";
			$data['errors'] = $errors;
			$this->render("login", $data);
		} else {
			//note, the error is the same as before, just as a regular security measure
			if (!$userModel->verifyPassword($username, $password)){
				$errors .= "Incorrect Username or Password <br>";
				$data['errors'] = $errors;
				$this->render("login", $data);
			} else {
				$_SESSION['username'] = $username;
				header("location: movies/find");
			}
		}

	}

	public function signIn()
	{
		$this->render("signIn");	
	}
}

