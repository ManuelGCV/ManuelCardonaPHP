<?php

namespace ManuelCardona\Talent\Core;

use Bramus\Router\Router;
use ManuelCardona\Talent\Controller\Auth;
use ManuelCardona\Talent\Controller\Movie;

//load Router Library
$router = new Router();
//use session to log user
session_start();

/**
 * List of routes used
 * @param $_GET['url'];
 * 
 * Will run controller requested
 */

 //use to protect routes not expected to be accessed without logged status
function authGuard(){ 
	if (!isset($_SESSION['username'])){
	header("location: login");
	}
}


$router->post('/movies/update', function(){
	authGuard();
	$controller = new Movie;
	$controller->update();
	
});

$router->get('/movies', function(){
	authGuard();
	$controller = new Movie;
	$controller->index();
	
});

$router->post('/movies/search', function(){
	authGuard();
	$controller = new Movie;
	$controller->search();
});

$router->get('/', function(){
	header("location: login");
});

$router->get('/login', function(){
	$controller = new Auth;
	$controller->index();
});

$router->post('/login', function(){
	$controller = new Auth;
	$controller->validate();
});

$router->get('/signin', function(){
	$controller = new Auth;
	$controller->signIn();
});

$router->post('/signin', function(){
	$controller = new Auth;
	$controller->save();
});

$router->get('/logout', function(){
	session_destroy();
	header("location: login");
});



$router->run();

