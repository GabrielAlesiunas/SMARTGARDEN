const navToggle = document.getElementById("nav-toggle");
const navMenu = document.getElementById("nav-menu");

/*===== MENU SHOW =====*/

if (navToggle && navMenu) {
  navToggle.addEventListener("click", () => {
    navMenu.classList.add("show-menu");
  });
}

/*===== MENU HIDDEN =====*/
/* Validate if constant exists */
const navClose = document.getElementById("nav-close");
if (navClose) {
  navClose.addEventListener("click", () => {
    navMenu.classList.remove("show-menu");
  });
}

/*=============== REMOVE MENU MOBILE ===============*/
const navLink = document.querySelectorAll(".nav__link");

function linkAction() {
  const navMenu = document.getElementById("nav-menu");
  // When we click on each nav__link, we remove the show-menu class
  navMenu.classList.remove("show-menu");
}
navLink.forEach((n) => n.addEventListener("click", linkAction));











document.addEventListener("DOMContentLoaded", function () {
  const selectPlant = document.getElementById("selectPlant");
  const plantInfo = document.getElementById("plantInfo");

  selectPlant.addEventListener("change", function () {
    const selectedPlantName = selectPlant.value; // Obter o valor selecionado

    console.log("Planta selecionada: " + selectedPlantName); // Adicione esta linha

    // Enviar uma solicitação AJAX para buscar as informações da planta
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "buscar_planta.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        console.log("Resposta do servidor: " + xhr.responseText); // Adicione esta linha

        const response = JSON.parse(xhr.responseText);

        if (response.error) {
          plantInfo.innerHTML = "Erro ao buscar a planta.";
        } else {
          plantInfo.innerHTML = `
                              <h2>Informações da Planta</h2>
                              <p>ID: ${response.id}</p>
                              <p>Nome: ${response.nome}</p>
                              <p>Temperatura Ideal: ${response.tempideal}</p>
                              <p>Umidade Ideal: ${response.umideal}</p>
                              <p>Luminosidade Ideal: ${response.lumideal}</p>
                          `;
        }
      }
    };

    xhr.send("nomePlanta=" + selectedPlantName); // Enviar o valor selecionado
  });
});
