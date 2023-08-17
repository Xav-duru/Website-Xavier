<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='style_suede_crew.css'>
    <title>Crew Suède</title>
</head>
<body>

    <div id="Corentin">
        <div class="containerCorentin">
            <img src="photos_centrees/Corentin.jpeg" id="imageCorentin" name="Coco"><br>
            <div id="insta" name="instaCorentin" style="display: none; left:60px;">insta: _cgrst</div>
        </div>
        <label for="Coco">Corentin - Alias "<span>Coco</span>"</label>
    </div>

    <div id="Eugenie">
        <div class="containerEugenie">
            <img src="photos_centrees/Eugenie.jpeg" id="imageEugenie" name="Eugenie"><br>
            <div id="insta" name="instaEugenie" style="display: none; left:10px;">insta: eugenie.rocheron</div>
        </div>
        <label for="Eugenie">Eugénie - Alias "<span>Mamie</span>"</label>
    </div>


    <div id="Jeremy">
        <img src="photos_centrees/Jeremy.jpeg" id="images" name="Jeremy"><br>
        <label for="Jeremy">Jérémy - Alias "<span>Jeje</span>"</label>
    </div>


    <div id="Julien">
        <img src="photos_centrees/Julien (2).jpeg" id="images" name="Julien"><br>
        <label for="Julien">Julien - Alias "<span>Sire</span>"</label>
    </div>


    <div id="Paul">
        <img src="photos_centrees/Paul.jpeg" id="images" name="Paul"><br>
        <label for="Paul">Paul - Alias "<span>Perrinho</span>"</label>
    </div>


    <div id="Yasmine">
        <img src="photos_centrees/Yasmine.jpeg" id="images" name="Yasmine"><br>
        <label for="Yasmine">Yasmine - Alias "<span>Yaya</span>"</label>
    </div>


    <div id="Mael">
        <img src="photos_centrees/Mael.jpeg" id="images" name="Mael"><br>
        <label for="Mael">Maël - Alias "<span>Ferlaux</span>"</label>
    </div>


    <div id="Salome">
        <img src="photos_centrees/Salome.jpeg" id="images" name="Salome"><br>
        <label for="Salome">Salomé - Alias "<span>Sasa</span>"</label>
    </div>

    <div id="center">
        <h1 id="title">Les français en Suède</h1>
        <a href="photos_groupe.html" target="_blank">
            Photos groupes
        </a>
    </div>


    <script>

        const imageCorentin = document.getElementById('imageCorentin');
        const instaCorentin = document.getElementsByName('instaCorentin');

        let stateCorentin = false;

        imageCorentin.addEventListener('mouseenter', () => {
            if (!stateCorentin) {
                stateCorentin = true;
                imageCorentin.style.transition = 'filter 0.3s ease-in-out';
                imageCorentin.style.filter = 'blur(5px)';
                instaCorentin.style.display = 'block';
             }
        });

        imageCorentin.addEventListener('mouseleave', () => {
            if (stateCorentin) {
                stateCorentin = false;
                console.log("sorti");
                imageCorentin.style.filter = 'none';
                instaCorentin.style.display = 'none';
            }
        });

        instaCorentin.addEventListener('mouseenter', () => {
            if (!stateCorentin) {
                stateCorentin = true;
                imageCorentin.style.filter = 'blur(5px)';
                instaCorentin.style.display = 'block';
             }
        });

        instaCorentin.addEventListener('mouseleave', () => {
            if (stateCorentin) {
                stateCorentin = false;
                console.log("sorti");
                imageCorentin.style.filter = 'none';
                instaCorentin.style.display = 'none';
            }
        }); 
        
        /*
        const imageEugenie = document.getElementById('imageEugenie');
        const instaEugenie = document.getElementsByName('instaEugenie');

        let stateEugenie = false;

        imageEugenie.addEventListener('mouseenter', () => {
            if (!stateEugenie) {
                stateEugenie = true;
                imageEugenie.style.transition = 'filter 0.3s ease-in-out';
                imageEugenie.style.filter = 'blur(5px)';
                instaEugenie.style.display = 'block';
             }
        });

        imageEugenie.addEventListener('mouseleave', () => {
            if (stateEugenie) {
                stateEugenie = false;
                console.log("sorti");
                imageEugenie.style.filter = 'none';
                instaEugenie.style.display = 'none';
            }
        });

        instaEugenie.addEventListener('mouseenter', () => {
            if (!stateEugenie) {
                stateEugenie = true;
                imageEugenie.style.filter = 'blur(5px)';
                instaEugenie.style.display = 'block';
             }
        });

        instaEugenie.addEventListener('mouseleave', () => {
            if (stateEugenie) {
                stateEugenie = false;
                console.log("sorti");
                imageEugenie.style.filter = 'none';
                instaEugenie.style.display = 'none';
            }
        }); 
        */
    </script>


</body>
</html> 