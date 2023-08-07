const inputPseudo = document.getElementById('idPseudoOublie');
const btnPseudo = document.getElementById('idValidePseudoOublie');
const inputSC = document.getElementById('idSC');
const btnSC = document.getElementById('idValideSC');


function loadDoc() {
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    if (btnSC.disabled){
      console.log("essai");
      btnSC.disabled = false;
    }else{
      btnSC.disabled=true;
    }
  }
  xhttp.open("GET", "texte.txt");
  xhttp.send();
}