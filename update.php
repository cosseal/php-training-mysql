<?php
include "connBD.php";
echo $conn->error;

$index = $_GET["index"];

$select= "SELECT * FROM hiking WHERE 1";
$result = $conn->query($select);
while($tab=$result->fetch_assoc()) {
    $duration = date_create($tab["duration"]);


    //refaire une requête pour remplir les champs prévus en fonction de l'id
    //et refaire une requête d'update quand on soumet le formulaire
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<a href="read.php">Liste des données</a>
	<h1>Ajouter</h1>
	<form action="" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="très facile">Très facile</option>
				<option value="facile">Facile</option>
				<option value="moyen">Moyen</option>
				<option value="difficile">Difficile</option>
				<option value="très difficile">Très difficile</option>
			</select>
		</div>
		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" <?php echo'value="'.$tab[$index]['distance'].'"'; ?>">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="duration" name="duration" value="">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="">
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>
</body>
</html>














