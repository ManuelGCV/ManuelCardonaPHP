<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Movies Load</title>
</head>
<style>
	td {
		width: 16%;
	}

	table {
		width: 100%;
	}

	th {
		border: 2px solid black;
	}
	
</style>

<body>
	<h2 style="text-align: center;">Movies</h2>
	<br>
	<br>
	<?php if (isset($data['errors'])) : ?>
		<div style="color: red;">
			<?= $data['errors']; ?>
		</div>

	<?php endif ?>
	<br>

	<table>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<form action="update" method="post">
			<td><input type="text" name="custom" value="avengers"></td>
			<td>
					<input type="submit" value="Update Movie List">
				</form>
			</td>
		</tr>
		<form action="search" method="post">
		<tr>
			<td colspan="2">Search by title</td>
			<td>Date range</td>
			<td></td>
			<td>Sort by</td>
			<td></td>
		</tr>
		<tr>
			<td colspan="2"><input type="search" name="title" placeholder="Movie title"></td>
			<td><input type="number" name="start" value="2020"></td>
			<td><input type="number" name="ends" value="2022"></td>
			<td>
				<select name="order">
					<option value="asc" selected>Asc</option>
					<option value="desc">Desc</option>
				</select>
			</td>
			<td></td>
		</tr>
		<tr>
			<td><input type="submit" value="Submit"></td>
			<td colspan="3"></td>
			<td>
				<select name="filter">
					<option value="title" selected>Title</option>
					<option value="date">Date</option>
				</select>
			</td>
			<td></td>
		</tr>
		</form>
	</table>
	<table>
		<thead>
			<th>Title</th>
			<th>Year</th>
			<th>imdbID</th>
			<th>Type</th>
			<th>Poster</th>	
		</thead>
		<tbody>
			<?php if (isset($data['movies'])){
				foreach ($data['movies'] as $key => $movie) {
					echo("<tr>");
					foreach ($movie as $key => $value) {
						echo('<td>');
						echo($value);
						echo('</td>');
					}
					echo("</tr>");
				}
				
				
			}


			?>
		</tbody>
	</table>

</body>

</html>