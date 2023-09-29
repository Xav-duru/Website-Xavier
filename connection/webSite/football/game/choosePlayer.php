<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compose ton XI</title>
    <?php include ('../../../core.php'); ?>

</head> 
<body>

    <?php
        // Retourne l'ID du joueur parmis selon la ligue et le post
        function getRandomPlayer($post, $league, $mysqli){

            $sql_rand = "SELECT id
            FROM joueurs
            WHERE post = '".$post."'
            AND league = '".$league."'
            ORDER BY RAND()
            LIMIT 1";

            $result = $mysqli->query($sql_rand);

            //Récupère le nombre de ligne dont le résultat est vrai
            $nb = $result->num_rows;

            if (!$result) { 
                exit($mysqli->error);
            }
            else if($nb) { 
                //Créé un tableau avec les différentes valeurs
                $row = $result->fetch_assoc();

                //Récupère le numéro de l'id de l'utilisateur
                $num = $row['id'];
                //echo $num;?><br><?php
                return $num;

                $mysqli->close();
            }
        }

        // Retourne le nom du joueur grâce à l'id
        function getName($id, $mysqli) {
            $sql_getName = "SELECT name
            FROM joueurs
            WHERE id = '".$id."'";

            $result = $mysqli->query($sql_getName);
            $nb = $result->num_rows;

            if (!$result) { 
                exit($mysqli->error);
            }
            
            else if($nb) { 
                $row = $result->fetch_assoc();

                //Récupère le numéro de l'id de l'utilisateur
                $num = $row['name'];
                //echo $num;?><br><?php
                return $num;
            }
        }

        // Return player's photo
        function getPhoto($id, $mysqli) {
            $sql_getPhoto = "SELECT picture
            FROM joueurs
            WHERE id = '".$id."'";

            $result = $mysqli->query($sql_getPhoto);
            $nb = $result->num_rows;

            if (!$result) { 
                exit($mysqli->error);
            }
            
            else if($nb) { 
                $row = $result->fetch_assoc();

                //Récupère le numéro de l'id de l'utilisateur
                $num = $row['picture'];
                //echo $num;?><br><?php
                return $num;
            }
        }
        
        $post=$_GET['post'];
        $league=$_GET['league'];

        $player1 = getRandomPlayer($post, $league, $mysqli);
        $player1_name=getName($player1, $mysqli);
        $player1_photo="photo_Players/".str_replace(" ","",$player1_name).".png";
        echo $player1_photo;

        $player2 = $player1;
        while ($player2 == $player1){
            $player2 = getRandomPlayer($post, $league, $mysqli);
        }
        $player2_name=getName($player2, $mysqli);
        $player2_photo=getPhoto($player2, $mysqli);
        $player2_photo="photo_Players/".str_replace(" ","",$player2_name).".png";


        $player3 = $player2;
        while ($player3 == $player2 || $player3 == $player1){
            $player3 = getRandomPlayer($post, $league, $mysqli);
        }
        $player3_name=getName($player3, $mysqli);
        $player3_photo=getPhoto($player3, $mysqli);
        $player3_photo="photo_Players/".str_replace(" ","",$player3_name).".png";




        //echo nl2br ("player 1 : " .$player1. "\n");
        //echo nl2br ("player 2 : " .$player2. "\n");
        //echo nl2br ("player 3 : " .$player3. "\n");
        

        $sql = "SELECT id
        FROM joueurs
        WHERE post = '".$post."'
        AND league = '".$league."'";

    

    ?>

    <div class="blockThreePlayer">
        <h1>Choose your <?php echo $post ?> !</h1>
        <li>
        <img id="idPlayerPhoto" src=<?php echo $player1_photo ?>>
        <p> <?php echo $player1_name ?></p>
        <button type="button" name="validPlayer" id="idValidPlayer" onclick="validChoice(<?php $player1 ?>)">Select</button>
        </li>
    
        <li>
        <img id="idPlayerPhoto" src=<?php echo $player2_photo ?>>
        <p> <?php echo $player2_name ?></p>
        <button type="button" name="validPlayer" id="idValidPlayer" onclick="validChoice(<?php $player2 ?>)">Select</button>
        </li>

        <li>
        <img id="idPlayerPhoto" src=<?php echo $player3_photo ?>>
        <p> <?php echo $player3_name ?></p>
        <button type="button" name="validPlayer" id="idValidPlayer" onclick="validChoice(<?php $player3 ?>)">Select</button>
        </li>
    </div>
    </body>


    <script>
        function validChoice(player){
            console.log(player);
            var league = $_GET('league');
            console.log(league);
            const requestSC = new XMLHttpRequest();
            requestSC.onload = function() {
                document.getElementById("idWindowPlayer").innerHTML = this.responseText;
            }
            requestSC.open("GET", "choosePlayer.php?post="+player+"&league="+league);
            requestSC.send();
        }
</html>