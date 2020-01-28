<?php
include "connBD.php";
echo $conn->error;
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<a href="/read.php">Liste des données</a>
	<h1>Ajouter</h1>
	<form action="" method="post">
		<div>
			<label for="name">Nom</label>
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
			<input type="text" name="distance" value="">
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




<?php
if (isset ($_POST["name"]) && isset ($_POST["difficulty"]) && isset ($_POST["distance"])
    && isset ($_POST["duration"]) && isset ($_POST["height_difference"]))
    {
        $name= $_POST["name"];
        $difficulty = $_POST["difficulty"];
        $distance= $_POST["distance"];
        $duration= $_POST["duration"];
        $height_diff= $_POST["height_difference"];

        $stmt = $conn->prepare("INSERT INTO hiking(name, difficulty, distance, duration, height_difference)
                VALUES (?,?,?,?,?)");
        $stmt->bind_param("ssiii", $name,$difficulty, $distance, $duration, $height_diff);


        if ($stmt->execute())
        {
            echo "<br><span> Votre randonnée a bien été ajoutée </span>";
        }
        echo $conn->error;
        $stmt->close();


  }
else {
   echo "<br>Remplissez tous les champs, s'il-vous-plait<br>";
}




?>
