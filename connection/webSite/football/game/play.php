<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='play.css'>
    <title>Compose ton XI</title>
</head>
<body>
    <?php






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
        <h2>Your money</h2>
    </div>
    
    <script>
        function choosePlayer(player){
        console.log(player);
        const requestSC = new XMLHttpRequest();
        requestSC.onload = function() {
            document.getElementById("idWindowPlayer").innerHTML = this.responseText;
        }
        requestSC.open("GET", "choosePlayer.php?post="+player);
        requestSC.send();
    }
    </script>
</body>
</html>


