<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='createCompo.css'>

    <title>Coaching</title>
</head>
<body>
    <div class="leftBox">
    <h1 style="text-align:center">Create your own compo</h1>
        <canvas id="idMyCanvas" width="550" height="750" style="border-radius: 5%;"></canvas>
        <div id="id1">
            <button type="button" id="idBtn1" class="widget" style="position: absolute; top: 720px; left: 240px;"> </button>
            <p id="idName1" style="position: absolute; top: 750px; left: 240px;">1. Neuer</p>
        </div>
        <div id="id2">
            <button type="button" id="idBtn2" class="widget" style="position: absolute; top: 550px; left: 70px;"></button>
            <p id="idName2" style="position: absolute; top: 580px; left: 70px;">2. Neuer</p>
        </div>
        <div id="id3">
            <button type="button" id="idBtn3" class="widget" style="position: absolute; top: 600px; left: 180px;"></button>
            <p id="idName3" style="position: absolute; top: 630px; left: 180px;">3. Neuer</p>
        </div>
        <div id="id4">
            <button type="button" id="idBtn" class="widget" style="position: absolute; top: 600px; left: 300px;"></button>
        </div>
        <div id="id5">
            <button type="button" id="idBtn" class="widget" style="position: absolute; top: 550px; left: 410px;"></button>
        </div>
        <div id="id6">
            <button type="button" id="idBtn" class="widget" style="position: absolute; top: 450px; left: 180px;"></button>
        </div>
        <div id="id7">
            <button type="button" id="idBtn" class="widget" style="position: absolute; top: 450px; left: 300px;"></button>
        </div>
        <div id="id8">
            <button type="button" id="idBtn" class="widget" style="position: absolute; top: 340px; left: 240px;"></button>
        </div>
        <div id="id9">
            <button type="button" id="idBtn" class="widget" style="position: absolute; top: 250px; left: 70px;"></button>
        </div>
        <div id="id10">
            <button type="button" id="idBtn" class="widget" style="position: absolute; top: 250px; left: 410px;"></button>
        </div>
        <div id="id11">
            <button type="button" id="idBtn" class="widget" style="position: absolute; top: 200px; left: 240px;"></button>
        </div>

    </div>
    <div class="rightBox">
        <h2>Titulaires</h2>
        <div id="idName1">
            <p>1. </p>
        </div>
        <div id="idName2">
            <p>2. </p>
        </div>
        <div id="idName3">
            <p>3. </p>
        </div>
        <div id="idName4">
            <p>4. </p>
        </div>
        <div id="idName5">
            <p>5. </p>
        </div>
        <div id="idName6">
            <p>6. </p>
        </div>
        <div id="idName7">
            <p>7. </p>
        </div>
        <div id="idName8">
            <p>8. </p>
        </div>
        <div id="idName9">
            <p>9. </p>
        </div>
        <div id="idName10">
            <p>10. </p>
        </div>
        <div id="idName11">
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
    const canevas = document.getElementById("idMyCanvas");
    const context = canevas.getContext("2d");

    const image = new Image();
    image.src = "terrain.jpg";

    image.onload = function() {
        context.drawImage(image, 0, 0, canevas.width, canevas.height);
        // Vous pouvez ajuster les coordonnées (0, 0) et les dimensions (canevas.width, canevas.height) selon vos besoins.
    };

    /*
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
            
            if (x >= 47 && x <= canevas.width-90) {
                currentWidget.style.left = x + "px";
            }
            if (y >= 120 && y <= canevas.height-10) {
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
    */
        class WidgetPair {
            constructor(widget, follower) {
                this.widget = widget;
                this.follower = follower;
                widget.addEventListener("mousedown", this.startDragging.bind(this));
            }

            startDragging(e) {
                this.currentWidget = this.widget; // Définir le widget actuellement en cours de déplacement
                this.initialX = e.clientX;
                this.initialY = e.clientY;

                document.addEventListener("mousemove", this.drag.bind(this));
                document.addEventListener("mouseup", this.stopDragging.bind(this));
            }

            drag(e) {
                if (this.currentWidget) {

                const deltaX = e.clientX - this.initialX;
                const deltaY = e.clientY - this.initialY;

                if (e.clientX >= 90   && e.clientX <= 510) {
                    this.widget.style.left = this.widget.offsetLeft + deltaX + "px";
                    this.follower.style.left = this.widget.offsetLeft + deltaX + "px";
                }

                if (e.clientY >= 120   && e.clientY <= 780) {
                    this.widget.style.top = this.widget.offsetTop + deltaY + "px";
                    this.follower.style.top = this.widget.offsetTop + deltaY + 30 + "px";
                }
                this.initialX = e.clientX;
                this.initialY = e.clientY;
                }
            }

            stopDragging() {
                this.currentWidget = null; // Réinitialiser le widget actuellement en cours de déplacement
                document.removeEventListener("mousemove", this.drag);
                document.removeEventListener("mouseup", this.stopDragging);
            }
        }

        const widgetPairs = [];
        widgetPairs.push(new WidgetPair(document.getElementById("idBtn1"), document.getElementById("idName1")));
        widgetPairs.push(new WidgetPair(document.getElementById("idBtn2"), document.getElementById("idName2")));
        widgetPairs.push(new WidgetPair(document.getElementById("idBtn3"), document.getElementById("idName3")));
   
    </script>

</body>
</html>