<?php
	$pdo = new PDO('sqlite:chinook.db');
	$sql = '
		select *
		from genres
	';

	$statement = $pdo->prepare($sql);
	$statement->execute();
	$genres = $statement->fetchAll(PDO::FETCH_OBJ);
	// var_dump($invoices);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
		<title> Genres </title>

		<style>
			.table td {
				text-align: center;
			}

			.table th {
				text-align: center;
			}
		</style>
	</head>
	<body>
		<table class="table">
			<tr>
				<th>Name</th>
			</tr>
			<?php foreach($genres as $genre) : ?>
			<tr>
				<!-- <td><?php echo $genre->Name ?></td> -->
				<td>
					<a href="tracks.php?genre=<?php echo $genre->GenreId ?>">
					<?php echo $genre->Name ?>
				</td>
			</tr>
			<?php endforeach ?>
		</table>
	</body>