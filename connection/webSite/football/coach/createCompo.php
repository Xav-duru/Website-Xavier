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
        <img id="idField" src="terrain.jpg">
        <div id="idPostGK">
            <button type="button" name="player" id="idGK" draggable="true" ondragend=true value="GK">GK</button>
        </div>
        <div id="idPostLB">
            <button type="button" name="player" id="idLB" value="LB">LB</button>
        </div>
        <div id="idPostLCB">
            <button type="button" name="player" id="idLCB" value="LCB">LCB</button>
        </div>
        <div id="idPostRCB">
            <button type="button" name="player" id="idRCB" value="RCB">RCB</button>
        </div>
        <div id="idPostRB">
            <button type="button" name="player" id="idRB" value="RB">RB</button>
        </div>
        <div id="idPostLDM">
            <button type="button" name="idLDM" id="idLDM" value="LDM">LDM</button>
        </div>
        <div id="idPostRDM">
            <button type="button" name="idRDM" id="idRDM" value="RDM">RDM</button>
        </div>
        <div id="idPostCOM">
            <button type="button" name="idCOM" id="idCOM" value="COM">COM</button>
        </div>
        <div id="idPostLW">
            <button type="button" name="idLW" id="idLW" value="LW">LW</button>
        </div>
        <div id="idPostRW">
            <button type="button" name="idRW" id="idRW" value="RW">RW</button>
        </div>
        <div id="idPostST">
            <button type="button" name="idST" id="idST" value="ST">ST</button>
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
    const widget = document.getElementById("idLB") || document.getElementById("idGK");
    const field = document.getElementById("idField");
    let isDragging = false;
    let offsetX, offsetY;

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
            const maxY = field.offsetHeight - widget.offsetHeight;

            if (x >= 0 && x <= maxX) {
            widget.style.left = x + "px";
            }
            if (y >= 0 && y <= maxY) {
            widget.style.top = y + "px";
            }
        }
    });

    document.addEventListener("mouseup", () => {
    isDragging = false;
    });
    </script>

</body>
</html>