<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='play.css'>
    <title>Compose ton XI</title>
    <?php include ('../../../core.php'); ?>
    <?php include ('getPlayer.php'); ?>

</head>
<body>
    <?php
    $sold=$_GET['sold'];
    $league=$_GET['league'];

    $team1=array();

    ?>

    <div class="leftBox">
        <img id="field" src="terrain.jpg">
        <div id="idPostGK">
            <button type="button" name="idGK" id="idGK" onclick="choosePlayer(value)" value="GK">GK</button>
        </div>
        <div id="idPostLB">
            <button type="button" name="idLB" id="idLB" onclick="choosePlayer(value)" value="LB">LB</button>
        </div>
        <div id="idPostLCB">
            <button type="button" name="idLCB" id="idLCB" onclick="choosePlayer(value)" value="LCB">LCB</button>
        </div>
        <div id="idPostRCB">
            <button type="button" name="idRCB" id="idRCB" onclick="choosePlayer(value)" value="RCB">RCB</button>
        </div>
        <div id="idPostRB">
            <button type="button" name="idRB" id="idRB" onclick="choosePlayer(value)" value="RB">RB</button>
        </div>
        <div id="idPostLDM">
            <button type="button" name="idLDM" id="idLDM" onclick="choosePlayer(value)" value="LDM">LDM</button>
        </div>
        <div id="idPostRDM">
            <button type="button" name="idRDM" id="idRDM" onclick="choosePlayer(value)" value="RDM">RDM</button>
        </div>
        <div id="idPostCOM">
            <button type="button" name="idCOM" id="idCOM" onclick="choosePlayer(value)" value="COM">COM</button>
        </div>
        <div id="idPostLW">
            <button type="button" name="idLW" id="idLW" onclick="choosePlayer(value)" value="LW">LW</button>
        </div>
        <div id="idPostRW">
            <button type="button" name="idRW" id="idRW" onclick="choosePlayer(value)" value="RW">RW</button>
        </div>
        <div id="idPostST">
            <button type="button" name="idST" id="idST" onclick="choosePlayer(value)" value="ST">ST</button>
        </div>
        

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
    function choosePlayer(post){
        console.log(post);
        var league = $_GET('league');
        console.log(league);
        const request = new XMLHttpRequest();
        request.onload = function() {
            document.getElementById("idWindowPlayer").innerHTML = this.responseText;
        }
        request.open("GET", "choosePlayer.php?post="+post+"&league="+league);
        request.send();
    }

    function showTeam(nb){
        // Get Player Name
        var idPlayer="idPlayer"+nb+"_name";
        console.log(idPlayer);
        var player_name=document.getElementById(idPlayer).textContent;
        console.log(player_name);

        // Get idPost
        var post=document.getElementById('idCurrentPost').textContent;
        var idPost="idPost"+post;

        // Change post with photo
        const request = new XMLHttpRequest();
        request.onload = function() {
            document.getElementById(idPost).innerHTML = this.responseText;
        }
        request.open("GET", "showTeam.php?player="+player_name+"&post="+post);
        request.send();

        console.log('fini');
        const request2 = new XMLHttpRequest();
        request2.onload = function() {
            document.getElementById('idWindowPlayer').innerHTML = this.responseText;
        }
        request2.open("GET", "showField.php");
        request2.send();

    }

    
    </script>
</body>
</html>


