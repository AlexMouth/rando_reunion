<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Randonnées</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
<h1>Liste des randonnées</h1>
<table>
    <?php
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
    $liste = 'SELECT * FROM `hiking` WHERE 1';
    $resultat = $con->query($liste);

    while ($ligne = $resultat->fetch_assoc()) {
        echo '<tr>' . '<td>' . $ligne['name'] . '<th>' . '</td>' . '<br>';
        echo '<tr>' . '<td>' . $ligne['difficulty'] . '<th>' . '</td>' . '<br>';
        echo '<tr>' . '<td>' . $ligne['distance'] . '<th>' . '</td>' . '<br>';
        echo '<tr>' . '<td>' . $ligne['duration'] . '<th>' . '</td>' . '<br>';
        echo '<tr>' . '<td>' . $ligne['height_difference'] . '<th>' . '</td>' . '<br>';
        echo "<br>";

    }

    ?>
</table>
</body>
</html>
