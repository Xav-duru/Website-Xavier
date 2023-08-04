function isValidInput(value) {
    // Vous pouvez personnaliser ici votre condition de validation
    return value === "xav";
  }
  
  document.getElementById("submitBtn").addEventListener("click", function() {
    // Récupération de la valeur saisie
    const inputValue = document.getElementById("inputText").value;
    
    // Vérification de la validité de la valeur saisie
    if (isValidInput(inputValue)) {
      document.getElementById("activateBtn").removeAttribute("disabled");
    }
  });