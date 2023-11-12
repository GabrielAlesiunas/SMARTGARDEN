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
            `;
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

// function programar() {
//   var horario = document.getElementById("horario").value;

//   // Certifique-se de ajustar a URL para a rota correta em sua ESP32
//   var url = "http://endereco-da-sua-esp32/rota-para-programar";

//   // Dados a serem enviados no corpo da requisição
//   var dados = {
//     horario: horario,
//     // Adicione outros dados, se necessário
//   };

//   fetch(url, {
//     method: "POST",
//     headers: {
//       "Content-Type": "application/json",
//       // Adicione outros cabeçalhos, se necessário
//     },
//     body: JSON.stringify(dados),
//   })
//     .then((response) => response.json())
//     .then((data) => {
//       // Manipule a resposta da ESP32 aqui
//       console.log("Resposta da ESP32:", data);

//       // Atualize o status da planta com a resposta da ESP32
//       atualizarStatusPlanta(data.status);
//     })
//     .catch((error) => {
//       console.error("Erro ao enviar requisição para a ESP32:", error);
//     });
// }

// function atualizarStatusPlanta(status) {
//   // Atualize o elemento HTML com o status da planta
//   var statusElement = document.getElementById("status");
//   statusElement.textContent = "Status da Planta: " + status;
// }

function exibirLuminosidade(valor) {
  document.getElementById('valorLuminosidade').textContent = valor + '%';
}

function exibirUmidade(valor) {
  document.getElementById('valorUmidade').textContent = valor + '%';
}

function exibirTemperatura(valor) {
  document.getElementById('valorTemperatura').textContent = valor + '%';
}