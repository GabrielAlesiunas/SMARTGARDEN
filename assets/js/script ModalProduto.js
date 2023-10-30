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
}

function openModal2(titulo, descricao, imagens, preco) {
    var currentImage = 0; // Inicializa a variável local para esta função

    var modal = document.getElementById("myModal");
    modal.style.display = "block";

    modal.querySelector(".modalTitulo").textContent = titulo;
    modal.querySelector(".modalDescricao").textContent = descricao;
    modal.querySelector("#modalImage").src = imagens[0];
    modal.querySelector(".modalPreco").textContent = preco;

    modal.querySelector("#prevButton").addEventListener("click", prevSlide);
    modal.querySelector("#nextButton").addEventListener("click", nextSlide);
    modal.querySelector(".modal-overlay").addEventListener("click", closeModal);

    function prevSlide() {
        if (currentImage > 0) {
            currentImage--;
            updateSlide();
        } else {
            currentImage = imagens.length - 1;
            updateSlide();
        }
    }

    function nextSlide() {
        if (currentImage < imagens.length - 1) {
            currentImage++;
            updateSlide();
        }
    }

    function updateSlide() {
        modal.querySelector("#modalImage").src = imagens[currentImage];
    }
}

function openModal3(titulo, descricao, imagens, preco) {
    var currentImage = 0; // Inicializa a variável local para esta função

    var modal = document.getElementById("myModal");
    modal.style.display = "block";

    modal.querySelector(".modalTitulo").textContent = titulo;
    modal.querySelector(".modalDescricao").textContent = descricao;
    modal.querySelector("#modalImage").src = imagens[0];
    modal.querySelector(".modalPreco").textContent = preco;

    modal.querySelector("#prevButton").addEventListener("click", prevSlide);
    modal.querySelector("#nextButton").addEventListener("click", nextSlide);
    modal.querySelector(".modal-overlay").addEventListener("click", closeModal);

    function prevSlide() {
        if (currentImage > 0) {
            currentImage--;
            updateSlide();
        } else {
            currentImage = imagens.length - 1;
            updateSlide();
        }
    }

    function nextSlide() {
        if (currentImage < imagens.length - 1) {
            currentImage++;
            updateSlide();
        }
    }

    function updateSlide() {
        modal.querySelector("#modalImage").src = imagens[currentImage];
    }
}

function closeModal() {
  var modal = document.getElementById("myModal");
  modal.style.display = "none";
}

var productData1 = {
  titulo: "Irrigador automático",
  descricao: "Não damos garantia...",
  imagens: [
    "/assets/img/produto1.png",
    "/assets/img/product2.png",
    "/assets/img/product3.png",
  ],
  preco: "R$ 119,90",
};
var productData2 = {
  titulo: "Kit Mini Suculentas com 20 unidades",
  descricao: "Kit com 20 mudas...",
  imagens: [
    "/assets/img/produto2.png",
    "/assets/img/product2.png",
    "/assets/img/product3.png",
  ],
  preco: "R$ 46,00",
};
var productData3 = {
    titulo: "Kit Mini Suculentas com 20 unidades",
    descricao: "Kit com 20 mudas...",
    imagens: [
      "/assets/img/produto3.png",
      "/assets/img/product2.png",
      "/assets/img/product3.png",
    ],
    preco: "R$ 46,00",
};