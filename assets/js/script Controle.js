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
  var formAtualizar = document.getElementById("formAtualizar");

  var btnConfigPD = document.querySelector(".btnConfigPD");
  var btnPersonalizar = document.querySelector(".btnPersonalizar");

  btnConfigPD.addEventListener("click", function () {
    formAtualizar.style.display = "none";
  });

  btnPersonalizar.addEventListener("click", function () {
    formAtualizar.style.display = "block";
  });
});

document.addEventListener("DOMContentLoaded", function () {
  console.log("DOM carregado");

  const selectPlant = document.getElementById("selectPlant");
  const plantInfo = document.getElementById("plantInfo");

  selectPlant.addEventListener("change", function () {
    console.log("Seleção de planta alterada");

    const selectedPlantName = selectPlant.value;

    const xhr = new XMLHttpRequest();
    xhr.open("GET", "buscar_planta.php?nomePlanta=" + selectedPlantName, true);

    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        const response = JSON.parse(xhr.responseText);

        if (response.error) {
          plantInfo.innerHTML = "Erro ao buscar a planta.";
        } else {
          plantInfo.innerHTML = `
            <h2>Informações da Planta ${selectedPlantName}</h2>
            <p>Nome: ${response.nome}</p>
            <p>Temperatura Ideal: ${response.tempideal}ºC</p>
            <p>Umidade Ideal: ${response.umideal}g/m³</p>
            <p>Luminosidade Ideal: ${response.lumideal}cd</p>

            <form id="placaForm" method="post">
              <input type="hidden" name="temperatura" value="${response.tempideal}" />
              <input type="hidden" name="umidade" value="${response.umideal}" />
              <input type="hidden" name="luminosidade" value="${response.lumideal}" />
            </form>

            <input type="button" class="enviar" value="Enviar" id="enviarButton">
          `;

          const enviarButton = document.getElementById("enviarButton");

          if (enviarButton) {
            console.log("Botão encontrado");

            enviarButton.addEventListener("click", function () {
              console.log("Botão clicado");

              const formData = new FormData(document.getElementById("placaForm"));

              const xhrPlaca = new XMLHttpRequest();
              xhrPlaca.open("POST", "enviar_dados_placa.php", true);

              xhrPlaca.onreadystatechange = function () {
                if (xhrPlaca.readyState === 4 && xhrPlaca.status === 200) {
                  console.log(xhrPlaca.responseText);
                }
              };

              xhrPlaca.send(formData);
            });
          } else {
            console.log("Botão não encontrado");
          }
        }
      }
    };

    xhr.send();
  });
});

document.getElementById("selectPlant").addEventListener("change", function () {
  const selectedPlant = this.value;
  if (selectedPlant) {
    const plantInfoDiv = document.getElementById("plantInfo");

    const xhr = new XMLHttpRequest();
    xhr.open("GET", "buscar_planta.php?nomePlanta=" + selectedPlant, true);

    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        plantInfoDiv.innerHTML = xhr.responseText;
      }
    };

    xhr.send();
  }
});

function exibirLuminosidade(valor) {
  document.getElementById("spanLuminosidade").textContent = valor + "%";
}

function exibirUmidade(valor) {
  document.getElementById("spanUmidade").textContent = valor + "%";
}

function exibirTemperatura(valor) {
  document.getElementById("spanTemperatura").textContent = valor + "°C";
}

function enviarParaBanco() {
  var luminosidade = document.getElementById("volLuminosidade").value;
  var temperatura = document.getElementById("volTemperatura").value;
  var umidade = document.getElementById("volUmidade").value;

  var formData = new FormData();
  formData.append("luminosidade", luminosidade);
  formData.append("temperatura", temperatura);
  formData.append("umidade", umidade);

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "atualizarInfoPlantas.php", true);
  xhr.onload = function () {
    if (xhr.status === 200) {
      console.log(xhr.responseText);
    } else {
      console.error("Erro ao enviar para o servidor. Status: " + xhr.status);
    }
  };
  xhr.send(formData);
}

document.addEventListener("DOMContentLoaded", function () {
  buscarDados();
  const isDarkMode = localStorage.getItem("darkMode") === "enabled";

  if (isDarkMode) {
    document.body.classList.add("dark-theme");
  }

  const themeButton = document.getElementById("theme-button");
  if (themeButton) {
    themeButton.className = isDarkMode
      ? "ri-sun-line change-theme"
      : "ri-moon-line change-theme";

    themeButton.addEventListener("click", function () {
      document.body.classList.toggle("dark-theme");

      themeButton.className = document.body.classList.contains("dark-theme")
        ? "ri-sun-line change-theme"
        : "ri-moon-line change-theme";

      localStorage.setItem(
        "darkMode",
        document.body.classList.contains("dark-theme") ? "enabled" : "disabled"
      );
    });
  }
});
