const inputPseudo = document.getElementById('idPseudoOublie');
const btnPseudo = document.getElementById('idValidePseudoOublie');
const inputSC = document.getElementById('idSC');
const btnSC = document.getElementById('idValideSC');

function pushButton(){
    btnPseudo.addEventListener("click", desactivate)
}

function desactivate(){
    console.log("fonction desactivate");
    document.getElementById('btnSC').disabled=false;
}
 
window.addEventListener("load", pushButton)


/*
console.log("essai1");
function getpseudo() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200){
            document.getElementById("idPseudoOublie").innerHTML = this.responseText;
        }
    }
    xhttp.open("POST", "motDePasseOublie.php", true);

    // Préparer les données à envoyer avec la requête
    //var idEtudiant = 4; // Remplacez par l'ID de l'élève approprié
    //var data = "idEtudiant=" + encodeURIComponent(idEtudiant);

    xhttp.send();
}
getpseudo();
setInterval(function() {getpseudo();} , 10000);
*/  