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


document.addEventListener('DOMContentLoaded', function () {
  var formAtualizar = document.getElementById('formAtualizar');

  var btnConfigPD = document.querySelector('.btnConfigPD');
  var btnPersonalizar = document.querySelector('.btnPersonalizar');

  btnConfigPD.addEventListener('click', function () {
      formAtualizar.style.display = 'none';
  });
 
  btnPersonalizar.addEventListener('click', function () {
      formAtualizar.style.display = 'block';
  });
});

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


function exibirLuminosidade(valor) {
  document.getElementById('spanLuminosidade').textContent = valor + '%';
}

function exibirUmidade(valor) {
  document.getElementById('spanUmidade').textContent = valor + '%';
}

function exibirTemperatura(valor) {
  document.getElementById('spanTemperatura').textContent = valor + '°C';
}

function enviarParaBanco() {
  var luminosidade = document.getElementById('volLuminosidade').value;
  var temperatura = document.getElementById('volTemperatura').value;
  var umidade = document.getElementById('volUmidade').value;

  var formData = new FormData();
  formData.append('luminosidade', luminosidade);
  formData.append('temperatura', temperatura);
  formData.append('umidade', umidade);

  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'atualizarInfoPlantas.php', true);
  xhr.onload = function () {
      if (xhr.status === 200) {
          console.log(xhr.responseText);
      } else {
          console.error('Erro ao enviar para o servidor. Status: ' + xhr.status);
      }
  };
  xhr.send(formData);
}

document.addEventListener('DOMContentLoaded', function () {
  // Verifica se há preferência de tema no armazenamento local
  const isDarkMode = localStorage.getItem('darkMode') === 'enabled';

  // Aplica o tema escuro se a preferência estiver ativada
  if (isDarkMode) {
      document.body.classList.add('dark-theme');
  }

  // Adiciona um ouvinte de evento ao botão de mudança de tema
  const themeButton = document.getElementById('theme-button');
  if (themeButton) {
      themeButton.addEventListener('click', function () {
          // Inverte o tema ao clicar no botão
          document.body.classList.toggle('dark-theme');

          // Salva a preferência de tema no armazenamento local
          if (document.body.classList.contains('dark-theme')) {
              localStorage.setItem('darkMode', 'enabled');
          } else {
              localStorage.setItem('darkMode', 'disabled');
          }
      });
  }
});
