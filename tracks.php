<?php
	$pdo = new PDO('sqlite:chinook.db');
	$sql = '
		select tracks.Name as trackName, albums.Title as albumTitle, artists.Name as artistName, tracks.UnitPrice as trackPrice
		from tracks
		inner join albums
		on tracks.AlbumId = albums.AlbumId
		inner join artists
		on albums.ArtistId = artists.ArtistId
		where GenreId = ?
	';

	$statement = $pdo->prepare($sql);
	$statement->bindParam(1, $_GET['genre']);
	$statement->execute();
	$tracksInfo = $statement->fetchAll(PDO::FETCH_OBJ);
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Invoice Details</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
	</head>

	<body>
		<table class="table">
			<tr>
				<th>Track</th>
				<th>Album</th>
				<th>Artist</th>
				<th>Price</th>
			</tr>
			<?php foreach($tracksInfo as $trackInfo) : ?>
			<tr>
				<td><?php echo $trackInfo->trackName ?></td>
				<td><?php echo $trackInfo->albumTitle ?></td>
				<td><?php echo $trackInfo->artistName ?></td>
				<td><?php echo $trackInfo->trackPrice ?></td>
			</tr>
			<?php endforeach ?>
		</table>
	</body>