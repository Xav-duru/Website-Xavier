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
        <div id="messageCorentin" style="display: none;">
            <p>Mon secret est Ferlaux</p>
        </div>
        <div id="imageCorentin">
            <img src="photos_centrees/Corentin.jpeg" name="Coco"><br>
        <div>
        <div  id="bouttonCorentin" display: none>
            <button style="display: none;">Insta</button>
        </div>

        <label for="Coco">Corentin - Alias "<span>Coco</span>"</label>
    </div>

    <div id="Eugenie">
        <img src="photos_centrees/Eugenie.jpeg" id="eugenie" name="Eugenie"><br>
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
        const messageCorentin = document.getElementById('messageCorentin');
        const bouttonCorentin = document.getElementById('bouttonCorentin');

        let isHovered = false;

        imageCorentin.addEventListener('mouseenter', () => {
            if (!isHovered) {
                isHovered = true;
                imageCorentin.style.transition = 'filter 0.3s ease-in-out';
                imageCorentin.style.filter = 'blur(5px)';
                console.log("rentré");
                setTimeout(() => {
                                   

                }, 300);
             }
             messageCorentin.style.display = 'block';
        });

        imageCorentin.addEventListener('mouseleave', () => {
            if (isHovered) {
                isHovered = false;
                console.log("sorti");
                imageCorentin.style.transition = 'filter 0.3s ease-in-out';
                imageCorentin.style.filter = 'none';
                messageCorentin.style.transition = 'opacity 0.3s ease-in-out';
                messageCorentin.style.opacity = '0';
                bouttonCorentin.style.display = 'none';
            }
        });

    </script>


</body>
</html> 