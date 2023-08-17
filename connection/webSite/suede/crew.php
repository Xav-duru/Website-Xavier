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
            <div class="insta" id="instaCorentin" style="display: none; left:60px;">insta: _cgrst</div>
        </div>
        <label for="Coco" style="margin-left: 20px;">Corentin - Alias "<span>Coco</span>"</label>
    </div>

    <div id="Eugenie">
        <div class="containerEugenie">
            <img src="photos_centrees/Eugenie.jpeg" id="imageEugenie" name="Eugenie"><br>
            <div class="insta" id="instaEugenie" style="display: none; left:20px;">insta: eugenie.rocheron</div>
        </div>
        <label for="Eugenie" style="margin-left: 20px;">Eugénie - Alias "<span>Mamie</span>"</label>
    </div>


    <div id="Jeremy">
        <div class="containerJeremy">
            <img src="photos_centrees/Jeremy.jpeg" id="imageJeremy" name="Jeremy"><br>
            <div class="insta" id="instaJeremy" style="display: none; left:20px;">insta: jeremy_ferreira05</div>
        </div>
        <label for="Jeremy" style="margin-left: 30px;">Jérémy - Alias "<span>Jeje</span>"</label>
    </div>


    <div id="Julien">
        <div class="containerJulien">
            <img src="photos_centrees/Julien.jpeg" id="imageJulien" name="Julien"><br>
            <div class="insta" id="instaJulien" style="display: none; left:60px;">insta: ju.5665</div>
        </div>
        <label for="Julien" style="margin-left: 35px;">Julien - Alias "<span>Sire</span>"</label>
    </div>


    <div id="Paul">
        <div class="containerPaul">
            <img src="photos_centrees/Paul.jpeg" id="imagePaul" name="Paul"><br>
            <div class="insta" id="instaPaul" style="display: none; left:35px;">insta: perrinpaul37</div>
        </div>
        <label for="Paul" style="margin-left: 25px;">Paul - Alias "<span>Perrinho</span>"</label>
    </div>


    <div id="Yasmine">
        <div class="containerYasmine">
            <img src="photos_centrees/Yasmine.jpeg" id="imageYasmine" name="Yasmine"><br>
            <div class="insta" id="instaYasmine" style="display: none; left:35px;">insta: yasmiine_zrrl</div>
        </div>        
        <label for="Yasmine" style="margin-left: 20px;">Yasmine - Alias "<span>Yaya</span>"</label>
    </div>


    <div id="Mael">
        <div class="containerMael">
            <img src="photos_centrees/Mael.jpeg" id="imageMael" name="Mael"><br>
            <div class="insta" id="instaMael" style="display: none; left:40px;">insta: maelferlaux</div>
        </div>          
        <label for="Mael" style="margin-left: 30px;">Maël - Alias "<span>Ferlaux</span>"</label>
    </div>


    <div id="Salome">
        <div class="containerSalome">
            <img src="photos_centrees/Salome.jpeg" id="imageSalome" name="Salome"><br>
            <div class="insta" id="instaSalome" style="display: none; left:40px;">insta: salome_hsd</div>
        </div>         
        <label for="Salome" style="margin-left: 30px;">Salomé - Alias "<span>Sasa</span>"</label>
    </div>

    <div id="center">
        <h1 id="title">Les français en Suède</h1>
        <a href="photos_groupe.html" target="_blank">
            Photos groupes
        </a>
    </div>


    <script>

        const imageCorentin = document.getElementById('imageCorentin');
        const instaCorentin = document.getElementById('instaCorentin');

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
        
        
        const imageEugenie = document.getElementById('imageEugenie');
        const instaEugenie = document.getElementById('instaEugenie');

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

        const imageJeremy = document.getElementById('imageJeremy');
        const instaJeremy = document.getElementById('instaJeremy');

        let stateJeremy = false;

        imageJeremy.addEventListener('mouseenter', () => {
            if (!stateJeremy) {
                stateJeremy = true;
                imageJeremy.style.transition = 'filter 0.3s ease-in-out';
                imageJeremy.style.filter = 'blur(5px)';
                instaJeremy.style.display = 'block';
             }
        });

        imageJeremy.addEventListener('mouseleave', () => {
            if (stateJeremy) {
                stateJeremy = false;
                console.log("sorti");
                imageJeremy.style.filter = 'none';
                instaJeremy.style.display = 'none';
            }
        });

        instaJeremy.addEventListener('mouseenter', () => {
            if (!stateJeremy) {
                stateJeremy = true;
                imageJeremy.style.filter = 'blur(5px)';
                instaJeremy.style.display = 'block';
             }
        });

        instaJeremy.addEventListener('mouseleave', () => {
            if (stateJeremy) {
                stateJeremy = false;
                console.log("sorti");
                imageJeremy.style.filter = 'none';
                instaJeremy.style.display = 'none';
            }
        }); 

        const imageJulien = document.getElementById('imageJulien');
        const instaJulien = document.getElementById('instaJulien');

        let stateJulien = false;

        imageJulien.addEventListener('mouseenter', () => {
            if (!stateJulien) {
                stateJulien = true;
                imageJulien.style.transition = 'filter 0.3s ease-in-out';
                imageJulien.style.filter = 'blur(5px)';
                instaJulien.style.display = 'block';
             }
        });

        imageJulien.addEventListener('mouseleave', () => {
            if (stateJulien) {
                stateJulien = false;
                console.log("sorti");
                imageJulien.style.filter = 'none';
                instaJulien.style.display = 'none';
            }
        });

        instaJulien.addEventListener('mouseenter', () => {
            if (!stateJulien) {
                stateJulien = true;
                imageJulien.style.filter = 'blur(5px)';
                instaJulien.style.display = 'block';
             }
        });

        instaJulien.addEventListener('mouseleave', () => {
            if (stateJulien) {
                stateJulien = false;
                console.log("sorti");
                imageJulien.style.filter = 'none';
                instaJulien.style.display = 'none';
            }
        }); 

        const imageYasmine = document.getElementById('imageYasmine');
        const instaYasmine = document.getElementById('instaYasmine');

        let stateYasmine = false;

        imageYasmine.addEventListener('mouseenter', () => {
            if (!stateYasmine) {
                stateYasmine = true;
                imageYasmine.style.transition = 'filter 0.3s ease-in-out';
                imageYasmine.style.filter = 'blur(5px)';
                instaYasmine.style.display = 'block';
             }
        });

        imageYasmine.addEventListener('mouseleave', () => {
            if (stateYasmine) {
                stateYasmine = false;
                console.log("sorti");
                imageYasmine.style.filter = 'none';
                instaYasmine.style.display = 'none';
            }
        });

        instaYasmine.addEventListener('mouseenter', () => {
            if (!stateYasmine) {
                stateYasmine = true;
                imageYasmine.style.filter = 'blur(5px)';
                instaYasmine.style.display = 'block';
             }
        });

        instaYasmine.addEventListener('mouseleave', () => {
            if (stateYasmine) {
                stateYasmine = false;
                console.log("sorti");
                imageYasmine.style.filter = 'none';
                instaYasmine.style.display = 'none';
            }
        }); 

        const imagePaul = document.getElementById('imagePaul');
        const instaPaul = document.getElementById('instaPaul');

        let statePaul = false;

        imagePaul.addEventListener('mouseenter', () => {
            if (!statePaul) {
                statePaul = true;
                imagePaul.style.transition = 'filter 0.3s ease-in-out';
                imagePaul.style.filter = 'blur(5px)';
                instaPaul.style.display = 'block';
             }
        });

        imagePaul.addEventListener('mouseleave', () => {
            if (statePaul) {
                statePaul = false;
                console.log("sorti");
                imagePaul.style.filter = 'none';
                instaPaul.style.display = 'none';
            }
        });

        instaPaul.addEventListener('mouseenter', () => {
            if (!statePaul) {
                statePaul = true;
                imagePaul.style.filter = 'blur(5px)';
                instaPaul.style.display = 'block';
             }
        });

        instaPaul.addEventListener('mouseleave', () => {
            if (statePaul) {
                statePaul = false;
                console.log("sorti");
                imagePaul.style.filter = 'none';
                instaPaul.style.display = 'none';
            }
        }); 

        const imageMael = document.getElementById('imageMael');
        const instaMael = document.getElementById('instaMael');

        let stateMael = false;

        imageMael.addEventListener('mouseenter', () => {
            if (!stateMael) {
                stateMael = true;
                imageMael.style.transition = 'filter 0.3s ease-in-out';
                imageMael.style.filter = 'blur(5px)';
                instaMael.style.display = 'block';
             }
        });

        imageMael.addEventListener('mouseleave', () => {
            if (stateMael) {
                stateMael = false;
                console.log("sorti");
                imageMael.style.filter = 'none';
                instaMael.style.display = 'none';
            }
        });

        instaMael.addEventListener('mouseenter', () => {
            if (!stateMael) {
                stateMael = true;
                imageMael.style.filter = 'blur(5px)';
                instaMael.style.display = 'block';
             }
        });

        instaMael.addEventListener('mouseleave', () => {
            if (stateMael) {
                stateMael = false;
                console.log("sorti");
                imageMael.style.filter = 'none';
                instaMael.style.display = 'none';
            }
        }); 

        const imageSalome = document.getElementById('imageSalome');
        const instaSalome = document.getElementById('instaSalome');

        let stateSalome = false;

        imageSalome.addEventListener('mouseenter', () => {
            if (!stateSalome) {
                stateSalome = true;
                imageSalome.style.transition = 'filter 0.3s ease-in-out';
                imageSalome.style.filter = 'blur(5px)';
                instaSalome.style.display = 'block';
             }
        });

        imageSalome.addEventListener('mouseleave', () => {
            if (stateSalome) {
                stateSalome = false;
                console.log("sorti");
                imageSalome.style.filter = 'none';
                instaSalome.style.display = 'none';
            }
        });

        instaSalome.addEventListener('mouseenter', () => {
            if (!stateSalome) {
                stateSalome = true;
                imageSalome.style.filter = 'blur(5px)';
                instaSalome.style.display = 'block';
             }
        });

        instaSalome.addEventListener('mouseleave', () => {
            if (stateSalome) {
                stateSalome = false;
                console.log("sorti");
                imageSalome.style.filter = 'none';
                instaSalome.style.display = 'none';
            }
        }); 
        
    </script>


</body>
</html> 