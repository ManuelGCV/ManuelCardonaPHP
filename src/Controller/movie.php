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

	public function index()
	{
		$this->db = new MovieModel();
		$data['movies'] = $this->db->read();
		$this->render("movies", $data);
		//$this->db = new MovieModel();
		//var_dump($this->db->read());
	}

	public function update()
	{
		$update = $_POST['custom'];
		$this->db = new MovieModel();
		$data['movies'] = $this->db->update($update);
		$this->render("movies", $data);
	}

	public function search()
	{
		$this->db = new MovieModel();
		$filter = $_POST['filter'];
		
		if ($filter === 'title') {
			$title = $_POST['title'];
			$order = $_POST['order'];
			$data['movies'] = $this->db->filterByMovie($title, $order);
		
		} else {
			$start = $_POST['start'];
			$ends = $_POST['ends'];
			$order = $_POST['order'];
			$data['movies'] = $this->db->filterByYear($start, $ends, $order);
		}
		
		$this->render("movies", $data);
		//$this->db = new MovieModel();
		//var_dump($this->db->read());
	}
}
