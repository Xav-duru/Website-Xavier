<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compose ton XI</title>
</head>
<body>

    <?php
        $post=$_GET['post'];
        $league=$_GET['league'];

    
        $sql = "SELECT id
        FROM joueurs
        WHERE post = '".$post."'
        AND password = '".$league."'";

        $result = $mysqli->query($sql);

        //Récupère le nombre de ligne dont le résultat est vrai
        $nb = $result->num_rows;

        if (!$result) { 
            exit($mysqli->error);
        }
        else if($nb) { 
            //Créé un tableau avec les différentes valeurs
            $row = $result->fetch_assoc();

            //Récupère la session de l'id de l'utilisateur
            $_SESSION['compte'] = $row['idUsers'];

            //Récupère le numéro de l'id de l'utilisateur
            $num = $row['idUsers'];
            echo $num;?><br><?php

            $mysqli->close();



    ?>

    <div class="blockThreePlayer">
        <li>
        <h2>Player name</h2>
        <h3>BU</h3>
        </li>
    
        <li>
        <h2>Player name</h2>
        <h3>BU</h3>
        </li>

        <li>
        <h2>Player name</h2>
        <h3>BU</h3>
        </li>
    </div>
    </body>
</html>