<?php

namespace ManuelCardona\Talent\Controller;

require_once 'src/Model/movie.php';

use ManuelCardona\Talent\Core\Controller;
use ManuelCardona\Talent\Model\MovieModel;

class Movie extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * main access when user logs in
	 * will read movies on database and render view
	 */
	public function index()
	{
		$this->db = new MovieModel();
		$data['movies'] = $this->db->read();
		$this->render("movies", $data);
	}

	/**
	 * receives a string to update database
	 * @param $_POST (custom) 
	 * will update database with results
	 * otherwise, will keep the database the same
	 * in case no 
	 */
	public function update()
	{
		$update = $this->post("custom");
		if ($update === '') {
			header("location: movies/");
		}
		$this->db = new MovieModel();
		$data['movies'] = $this->db->update($update);
		$this->render("movies", $data);
	}

	/**
	 * receives
	 * @param $_POST (filter, title, order start, ends) 
	 * based on filter will filter and sort database
	 * by like title and ordered asc or desc
	 * or by start and end year and also asc, or desc
	 * 
	 */
	public function search()
	{
		$this->db = new MovieModel();
		$filter = $this->post("filter");
		
		if ($filter === 'title') {
			$title = $this->post("title");
			$order = $this->post("order");
			$data['movies'] = $this->db->filterByMovie($title, $order);
		
		} else {
			$start = $this->post("start");
			$ends = $this->post("ends");
			$order = $this->post("order");
			$data['movies'] = $this->db->filterByYear($start, $ends, $order);
		}
		
		$this->render("movies", $data);
	}
}
