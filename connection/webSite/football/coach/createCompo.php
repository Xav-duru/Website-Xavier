<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='createCompo.css'>

    <title>Document</title>
</head>
<body>
    <div class="leftBox">
    <h1 style="text-align:center">Create your own compo</h1>
        <canvas id="monCanevas" width="600" height="800" style="border-radius: 5%;"></canvas>
        <div id="id1">
            <button type="button" name="player" id="idBtn" class="widget" draggable="true" ondragend=true style="position: absolute; top: 750px; left: 240px;"> </button>
        </div>
        <div id="id2">
            <button type="button" name="player" id="idBtn" class="widget" draggable="true" ondragend=true style="position: absolute; top: 550px; left: 70px;"></button>
        </div>
        <div id="id3">
            <button type="button" name="player" id="idBtn" class="widget" draggable="true" ondragend=true style="position: absolute; top: 600px; left: 180px;"></button>
        </div>
        <div id="id4">
            <button type="button" name="player" id="idBtn" class="widget" draggable="true" ondragend=true style="position: absolute; top: 600px; left: 300px;"></button>
        </div>
        <div id="id5">
            <button type="button" name="player" id="idBtn" class="widget" draggable="true" ondragend=true style="position: absolute; top: 550px; left: 410px;"></button>
        </div>
        <div id="id6">
            <button type="button" name="player" id="idBtn" class="widget" style="position: absolute; top: 450px; left: 180px;"></button>
        </div>
        <div id="id7">
            <button type="button" name="player" id="idBtn" class="widget" style="position: absolute; top: 450px; left: 300px;"></button>
        </div>
        <div id="id8">
            <button type="button" name="player" id="idBtn" class="widget" style="position: absolute; top: 340px; left: 240px;"></button>
        </div>
        <div id="id9">
            <button type="button" name="player" id="idBtn" class="widget" style="position: absolute; top: 250px; left: 70px;"></button>
        </div>
        <div id="id10">
            <button type="button" name="player" id="idBtn" class="widget" style="position: absolute; top: 250px; left: 410px;"></button>
        </div>
        <div id="id11">
            <button type="button" name="player" id="idBtn" class="widget" style="position: absolute; top: 200px; left: 240px;"></button>
        </div>

    </div>
    <div class="rightBox">
        <h2>Titulaires</h2>
        <div id="id1">
            <p>1. </p>
        </div>
        <div id="id2">
            <p>2. </p>
        </div>
        <div id="id3">
            <p>3. </p>
        </div>
        <div id="id4">
            <p>4. </p>
        </div>
        <div id="id5">
            <p>5. </p>
        </div>
        <div id="id6">
            <p>6. </p>
        </div>
        <div id="id7">
            <p>7. </p>
        </div>
        <div id="id8">
            <p>8. </p>
        </div>
        <div id="id9">
            <p>9. </p>
        </div>
        <div id="id10">
            <p>10. </p>
        </div>
        <div id="id11">
            <p>11. </p>
        </div>
        <br><br>

        <h2>Remplaçants</h2>
        <div id="id12">
            <p>12. </p>
        </div>
        <div id="id13">
            <p>13. </p>
        </div>
        <div id="id14">
            <p>14. </p>
        </div>
        <div id="id15">
            <p>15. </p>
        </div>
        <div id="id16">
            <p>16. </p>
        </div>
    </div>

    <script>
        const canevas = document.getElementById("monCanevas");
    const context = canevas.getContext("2d");

    const image = new Image();
    image.src = "terrain.jpg";

    image.onload = function() {
        context.drawImage(image, 0, 0, canevas.width, canevas.height);
        // Vous pouvez ajuster les coordonnées (0, 0) et les dimensions (canevas.width, canevas.height) selon vos besoins.
    };

    const widgets = document.querySelectorAll('.widget');
    const field = document.getElementById("idField");
    let isDragging = false;
    let currentWidget = null;
    let offsetX, offsetY;

    widgets.forEach(widget => {
        widget.addEventListener('mousedown', (e) => {
            isDragging = true;
            currentWidget = widget;
            offsetX = e.clientX - widget.getBoundingClientRect().left;
            offsetY = e.clientY - widget.getBoundingClientRect().top;
            widget.classList.add('dragging');
        });
    });

    document.addEventListener('mousemove', (e) => {
        if (isDragging) {
            const x = e.clientX - offsetX;
            const y = e.clientY - offsetY;
            // Limiter les déplacements du widget dans l'image de fond
            //const maxX = field.offsetWidth - currentWidget.offsetWidth;
            //const maxY = field.offsetHeight+50 - currentWidget.offsetHeight;
            
            if (x >= 0 && x <= 700) {
                currentWidget.style.left = x + "px";
            }
            if (y >= 75 && y <= 700) {
                currentWidget.style.top = y + "px";
            }
        }
    });

    document.addEventListener('mouseup', () => {
        if (isDragging) {
            currentWidget.classList.remove('dragging');
            isDragging = false;
        }
    });
    /*
    widget.addEventListener("mousedown", (e) => {
        isDragging = true;
        offsetX = e.clientX - widget.getBoundingClientRect().left;
        offsetY = e.clientY - widget.getBoundingClientRect().top;
    });

    document.addEventListener("mousemove", (e) => {
        if (isDragging) {
            const x = e.clientX - offsetX;
            const y = e.clientY - offsetY;
            // Limiter les déplacements du widget dans l'image de fond
            const maxX = field.offsetWidth - widget.offsetWidth;
            const maxY = field.offsetHeight+50 - widget.offsetHeight;

            if (x >= 0 && x <= maxX) {
            widget.style.left = x + "px";
            }
            if (y >= 75 && y <= maxY) {
            widget.style.top = y + "px";
            }
        }
    });

    document.addEventListener("mouseup", () => {
    isDragging = false;
    });
    */
    </script>

</body>
</html>