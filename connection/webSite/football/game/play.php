<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='play.css'>
    <title>Compose ton XI</title>
    <?php include ('../../../core.php'); ?>

</head>
<body>
    <?php
    $sold=$_GET['sold'];
    $league=$_GET['league'];

    $team1=array();
    function addPlayerInTeam($player){

    // Return player's price
    function getPrice($id, $mysqli) {
        $sql_getPrice = "SELECT price
        FROM joueurs
        WHERE id = '".$id."'";

        $result = $mysqli->query($sql_getPrice);
        $nb = $result->num_rows;

        if (!$result) { 
            exit($mysqli->error);
        }
        
        else if($nb) { 
            $row = $result->fetch_assoc();

            //Récupère le numéro de l'id de l'utilisateur
            $num = $row['price'];
            //echo $num;?><br><?php
            return $num;
        }
    }

    }

    ?>

    <div class="leftBox">
        <img id="field" src="terrain.jpg">
        <button type="button" name="striker" id="idStriker" onclick="choosePlayer(value)" value="BU">
    </div>
    

    <div class="rightBox">
        <h1>Créer ton onze pour 300 Millions d'euros !</h1>
        <div id="idWindowPlayer">
            date_sunset
        <div>
    </div>

    <script>
    
    // Convert variable from PHP to JavaScript
    function $_GET(param) {
        var vars = {};
        window.location.href.replace( location.hash, '' ).replace(/[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
            function( m, key, value ) { // callback
                vars[key] = value !== undefined ? value : '';
            }
        );

        if ( param ) {
            return vars[param] ? vars[param] : null;	
        }
        return vars;
    }

    // Function after a click to a post
    function choosePlayer(player){
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

    function validChoice(player){
        console.log(player);
        var sold = $_GET($sold)
        const requestSC = new XMLHttpRequest();
        requestSC.onload = function() {
            document.getElementById("idWindowPlayer").innerHTML = this.responseText;
        }
        requestSC.open("GET", "choosePlayer.php?post="+player+"&league="+league);
        requestSC.send();
    }
    
    </script>
</body>
</html>


