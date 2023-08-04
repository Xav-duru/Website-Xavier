const inputPseudo = document.getElementById('idPseudoOublie');
const btnPseudo = document.getElementById('idValidePseudoOublie');
const inputSC = document.getElementById('idSC');
const btnSC = document.getElementById('idValideSC');


function loadDoc() {
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    if (document.getElementById("idValideSC").disabled){
      document.getElementById("idValideSC").disabled = false;
    }else{
      document.getElementById("idValideSC").disabled=true;
    }
  }
  xhttp.open("GET", "texte.txt");
  xhttp.send();
}