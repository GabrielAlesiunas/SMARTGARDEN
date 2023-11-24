function openModal(titulo, descricao, imagens, preco) {
    var currentImage = 0; 

    var modal = document.getElementById("myModal");
    modal.style.display = "block";

    modal.querySelector(".modalTitulo").textContent = titulo;
    modal.querySelector(".modalDescricao").textContent = descricao;
    modal.querySelector("#modalImage").src = imagens[0];
    modal.querySelector(".modalPreco").textContent = preco;

    modal.querySelector("#prevButton").addEventListener("click", prevSlide);
    modal.querySelector("#nextButton").addEventListener("click", nextSlide);
    modal.querySelector(".modal-overlay").addEventListener("click", closeModal);

    document.body.classList.add("modal-aberto");

    function prevSlide() {
        if (currentImage > 0) {
            currentImage--;
        } else {
            currentImage = imagens.length - 1;
        }
        updateSlide();
    }
    
    function nextSlide() {
        if (currentImage < imagens.length - 1) {
            currentImage++;
        } else {
            currentImage = 0;
        }
        updateSlide();
    }

    function updateSlide() {
        modal.querySelector("#modalImage").src = imagens[currentImage];
    }

    function closeModal() {
        var modal = document.getElementById("myModal");
        modal.style.display = "none";
    
        document.body.classList.remove("modal-aberto");
    }
}

function openModal2(titulo, descricao, imagens, preco) {
    var currentImage = 0; 

    var modal = document.getElementById("myModal");
    modal.style.display = "block";

    modal.querySelector(".modalTitulo").textContent = titulo;
    modal.querySelector(".modalDescricao").textContent = descricao;
    modal.querySelector("#modalImage").src = imagens[0];
    modal.querySelector(".modalPreco").textContent = preco;

    modal.querySelector("#prevButton").addEventListener("click", prevSlide);
    modal.querySelector("#nextButton").addEventListener("click", nextSlide);
    modal.querySelector(".modal-overlay").addEventListener("click", closeModal);

    document.body.classList.add("modal-aberto");

    function prevSlide() {
        if (currentImage > 0) {
            currentImage--;
        } else {
            currentImage = imagens.length - 1;
        }
        updateSlide();
    }
    
    function nextSlide() {
        if (currentImage < imagens.length - 1) {
            currentImage++;
        } else {
            currentImage = 0;
        }
        updateSlide();
    }

    function updateSlide() {
        modal.querySelector("#modalImage").src = imagens[currentImage];
    }

    function closeModal() {
        var modal = document.getElementById("myModal");
        modal.style.display = "none";
    
        document.body.classList.remove("modal-aberto");
    }
}

function openModal3(titulo, descricao, imagens, preco) {
    var currentImage = 0; 

    var modal = document.getElementById("myModal");
    modal.style.display = "block";

    modal.querySelector(".modalTitulo").textContent = titulo;
    modal.querySelector(".modalDescricao").textContent = descricao;
    modal.querySelector("#modalImage").src = imagens[0];
    modal.querySelector(".modalPreco").textContent = preco;

    modal.querySelector("#prevButton").addEventListener("click", prevSlide);
    modal.querySelector("#nextButton").addEventListener("click", nextSlide);
    modal.querySelector(".modal-overlay").addEventListener("click", closeModal);

    document.body.classList.add("modal-aberto");

    function prevSlide() {
        if (currentImage > 0) {
            currentImage--;
        } else {
            currentImage = imagens.length - 1;
        }
        updateSlide();
    }
    
    function nextSlide() {
        if (currentImage < imagens.length - 1) {
            currentImage++;
        } else {
            currentImage = 0;
        }
        updateSlide();
    }

    function updateSlide() {
        modal.querySelector("#modalImage").src = imagens[currentImage];
    }

    function closeModal() {
        var modal = document.getElementById("myModal");
        modal.style.display = "none";
    
        document.body.classList.remove("modal-aberto");
    }
}

function openModal4(titulo, descricao, imagens, preco) {
    var currentImage = 0; 

    var modal = document.getElementById("myModal");
    modal.style.display = "block";

    modal.querySelector(".modalTitulo").textContent = titulo;
    modal.querySelector(".modalDescricao").textContent = descricao;
    modal.querySelector("#modalImage").src = imagens[0];
    modal.querySelector(".modalPreco").textContent = preco;

    modal.querySelector("#prevButton").addEventListener("click", prevSlide);
    modal.querySelector("#nextButton").addEventListener("click", nextSlide);
    modal.querySelector(".modal-overlay").addEventListener("click", closeModal);

    document.body.classList.add("modal-aberto");

    function prevSlide() {
        if (currentImage > 0) {
            currentImage--;
        } else {
            currentImage = imagens.length - 1;
        }
        updateSlide();
    }
    
    function nextSlide() {
        if (currentImage < imagens.length - 1) {
            currentImage++;
        } else {
            currentImage = 0;
        }
        updateSlide();
    }

    function updateSlide() {
        modal.querySelector("#modalImage").src = imagens[currentImage];
    }

    function closeModal() {
        var modal = document.getElementById("myModal");
        modal.style.display = "none";
    
        document.body.classList.remove("modal-aberto");
    }
}

function openModal5(titulo, descricao, imagens, preco) {
    var currentImage = 0; 

    var modal = document.getElementById("myModal");
    modal.style.display = "block";

    modal.querySelector(".modalTitulo").textContent = titulo;
    modal.querySelector(".modalDescricao").textContent = descricao;
    modal.querySelector("#modalImage").src = imagens[0];
    modal.querySelector(".modalPreco").textContent = preco;

    modal.querySelector("#prevButton").addEventListener("click", prevSlide);
    modal.querySelector("#nextButton").addEventListener("click", nextSlide);
    modal.querySelector(".modal-overlay").addEventListener("click", closeModal);

    document.body.classList.add("modal-aberto");

    function prevSlide() {
        if (currentImage > 0) {
            currentImage--;
        } else {
            currentImage = imagens.length - 1;
        }
        updateSlide();
    }
    
    function nextSlide() {
        if (currentImage < imagens.length - 1) {
            currentImage++;
        } else {
            currentImage = 0;
        }
        updateSlide();
    }

    function updateSlide() {
        modal.querySelector("#modalImage").src = imagens[currentImage];
    }

    function closeModal() {
        var modal = document.getElementById("myModal");
        modal.style.display = "none";
    
        document.body.classList.remove("modal-aberto");
    }
}

function openModal6(titulo, descricao, imagens, preco) {
    var currentImage = 0; 

    var modal = document.getElementById("myModal");
    modal.style.display = "block";

    modal.querySelector(".modalTitulo").textContent = titulo;
    modal.querySelector(".modalDescricao").textContent = descricao;
    modal.querySelector("#modalImage").src = imagens[0];
    modal.querySelector(".modalPreco").textContent = preco;

    modal.querySelector("#prevButton").addEventListener("click", prevSlide);
    modal.querySelector("#nextButton").addEventListener("click", nextSlide);
    modal.querySelector(".modal-overlay").addEventListener("click", closeModal);

    document.body.classList.add("modal-aberto");
    
    function prevSlide() {
        if (currentImage > 0) {
            currentImage--;
        } else {
            currentImage = imagens.length - 1;
        }
        updateSlide();
    }
    
    function nextSlide() {
        if (currentImage < imagens.length - 1) {
            currentImage++;
        } else {
            currentImage = 0;
        }
        updateSlide();
    }

    function updateSlide() {
        modal.querySelector("#modalImage").src = imagens[currentImage];
    }

    function closeModal() {
        var modal = document.getElementById("myModal");
        modal.style.display = "none";
    
        document.body.classList.remove("modal-aberto");
    }
}

function closeModal() {
  var modal = document.getElementById("myModal");
  modal.style.display = "none";
}

var productData1 = {
  titulo: "Irrigador Automático Inteligente com Arduino",
  descricao: "Transforme o seu jardim em um oásis verdejante e vibrante com o nosso Irrigador Automático Inteligente baseado em Arduino. Este inovador sistema de irrigação é a solução perfeita para manter suas plantas, flores e hortas saudáveis e bem-hidratadas, sem o incômodo de regas manuais.",
  imagens: [
    "/assets/img/produto1/arduino.png",
    "/assets/img/produto1/cabos.png",
    "/assets/img/produto1/caixa.png",
  ],
  preco: "R$ 119,90",
};

var productData2 = {
  titulo: "Placa ESP32",
  descricao: "Desvende o mundo da inovação com a nossa Placa ESP32, uma solução versátil e potente para os entusiastas da eletrônica e desenvolvedores ávidos. Projetada para oferecer desempenho excepcional e conectividade avançada, a ESP32 é a escolha ideal para projetos personalizados e inovadores.",
  imagens: [
    "/assets/img/produto2/esp321.png",
    "/assets/img/produto2/esp322.png",
    "/assets/img/produto2/esp323.png",
  ],
  preco: "R$  49,90",
};

var productData3 = {
    titulo: "Kit de Sensores",
    descricao: "Explore a personalização e a inteligência em seus projetos com nossos Sensores de Umidade, Luminosidade e Temperatura. Desenvolvidos para proporcionar medições precisas em tempo real, esses sensores são ideais para aprimorar a automação em uma variedade de aplicações.",
    imagens: [
      "/assets/img/produto3/luminosidade.png",
      "/assets/img/produto3/temperatura.png",
      "/assets/img/produto3/umidade.png",
    ],
    preco: "R$ 39,90",
};

var productData4 = {
    titulo: "Bertalha Roxa",
    descricao: "Bem-vindo ao mundo da Bertalha Roxa, uma planta fascinante que combina beleza e sabor em uma única experiência de cultivo. Esta variedade de bertalha não apenas encanta com suas folhas roxas vibrantes, mas também oferece um sabor suave e terroso que adiciona um toque especial às suas refeições.",
    imagens: [
      "/assets/img/produto4/frente.png",
      "/assets/img/produto4/cima.png",
      "/assets/img/produto4/info bertalha.jpg",
    ],
    preco: "R$ 13,50",
};

var productData5 = {
    titulo: "Hortelã",
    descricao: "Desperte seu jardineiro interior com o nosso elegante Vaso de Hortelã Fresca. Este pequeno jardim em casa é a maneira perfeita de cultivar hortelã orgânica e fresca em sua cozinha, varanda ou jardim. A hortelã é uma erva aromática versátil que adiciona um toque de frescor a uma variedade de pratos, desde saladas até coquetéis.",
    imagens: [
      "/assets/img/produto5/hortela.png",
      "/assets/img/produto5/hortela2.png",
      "/assets/img/produto5/info hortela.jpg",
    ],
    preco: "R$ 19,90",
};

var productData6 = {
    titulo: "Menta",
    descricao: "Bem-vindo à nossa seleção de Menta Fresca, um ingrediente versátil que pode transformar suas receitas e momentos de relaxamento. A menta é conhecida por seu sabor refrescante e aroma revigorante, tornando-a um complemento perfeito para sua cozinha, chás, coquetéis e cuidados pessoais.",
    imagens: [
      "/assets/img/produto6/menta1.png",
      "/assets/img/produto6/menta2.png",
      "/assets/img/produto6/info menta.jpg",
    ],
    preco: "R$ 29,90",
};