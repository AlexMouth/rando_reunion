<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ajouter une randonnée</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
<a href="/php-pdo/read.php">Liste des données</a>
<h1>Ajouter</h1>
<form action="#" method="post">
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
/*
if (isset($_POST['button'])) {
    $newname = $_POST['name'];
    $newdificulty = $_POST['difficulty'];
    $newdistance = $_POST['distance'];
    $newduration = $_POST['duration'];
    $newheight_difference = $_POST['height_difference'];


$username = "root";
$password = "";
$servername = "localhost";
$dbname = "reunion_island";
try {
    $con = new mysqli($servername, $username, $password);
    $con->select_db($dbname);

} catch (Exception $e) {
    die('erreur:' . $e->getMessage());
    echo "connexion ok";
    echo "<br><br>";
}

$insert = 'INSERT INTO hiking VALUES("","'.$newname.'","'.$newdificulty.'","'.$newdistance.'","'.$newduration.'","'.$newheight_difference.'")';

mysqli_query($insert) or die('Erreur inconnue!!'.mysqli_error());
}
*/

$username = "root";
$password = "";
$servername = "localhost";
$dbname = "reunion_island";


$con = new mysqli($servername, $username, $password);
$con->select_db($dbname);


$stmt = mysqli_prepare($con, "INSERT INTO hiking (name, difficulty, distance, duration, height_difference) VALUES (?,?,?,?,?)");
mysqli_stmt_bind_param($stmt, 'ssiii', $_POST['name'], $_POST['difficulty'], $_POST['distance'], $_POST['duration'], $_POST['height_difference']);


mysqli_stmt_execute($stmt);
