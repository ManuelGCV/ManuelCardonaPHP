<?php

namespace ManuelCardona\Talent\Model;

use ManuelCardona\Talent\Controller\Movie;
use ManuelCardona\Talent\Core\Database;


/**
 * base model for Movies, as entity movie was never used
 */
class MovieModel
{
	private Database $db;

	public string $title = '';
	public string $year = '';
	public string $imdbId = '';
	public string $type = '';
	public string $poster = '';
	//access database and get this info

	public function __construct()
	{
		$this->db = new Database('movie');
	}

	/**
	 * Curl call that will read movie list from 
	 * https://www.omdbapi.com/
	 * @param string $update
	 * after reading it, will update database movies.json
	 */
	private function retrieve(string $update)
	{
		$data = json_decode(file_get_contents(filename:dirname(__DIR__, 1).'/Database/'.'movies'.'.json'), true);
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://www.omdbapi.com/?s={$update}&apiKey=fc59da33",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		));

		$response = curl_exec($curl);
		curl_close($curl);
		$data = json_decode($response, true);
		file_put_contents(dirname(__DIR__, 1).'/Database/'.'movies'.'.json', json_encode($data));
		return $data['Search'];
	}

	public function read()
	{
		$data = json_decode(file_get_contents(filename:dirname(__DIR__, 1).'/Database/'.'movies'.'.json'), true);
		return $data['Search'];
	}

	public function update(string $update)
	{
		$data = $this->retrieve($update);
		return $data;
	}


	public function filterByMovie(string $title, string $order)
	{
		$data = json_decode(file_get_contents(filename:dirname(__DIR__, 1).'/Database/'.'movies'.'.json'), true);
		$newData = [];
		if ($title === '') {
			$newData = $data['Search'];
		} else {
			foreach ($data['Search'] as $movie) {
			
				if (str_contains(strtolower($movie['Title']), strtolower($title))){
					array_push($newData, $movie);
				}
			}
		}
		if ($order === 'asc') {
			usort($newData, function($first, $second){
				return strtolower($first['Title']) <=> strtolower($second['Title']);
			});
			
			
		} else {
			usort($newData, function($first, $second){
				return strtolower($second['Title']) <=> strtolower($first['Title']);
			});
			
		}
		return $newData;
	}

	public function filterByYear(string $start, string $ends, string $order)
	{
		$data = json_decode(file_get_contents(filename:dirname(__DIR__, 1).'/Database/'.'movies'.'.json'), true);
		$newData = [];
		if ($start === '' || $ends === '') {
			$newData = $data;
		} else {
			foreach ($data['Search'] as $movie) {
				if ($start <= $movie['Year'] && $movie['Year'] <= $ends){
					array_push($newData, $movie);
				}
			}
		}
		
		if ($order === 'asc') {
			usort($newData, function ($first, $second) {
				return $first['Year'] <=> $second['Year'];
			});
			
			
		} else {
			usort($newData, function ($first, $second) {
				return $second['Year'] <=> $first['Year'];
			});
			
		}
		return $newData;
	}

	
}
