let cartItems = [];

function openModalCart() {
    const modalCart = document.getElementById("myModalCart");
    modalCart.style.display = "block";
    document.addEventListener("keydown", handleKeyPressModalCart);
}

function closeModalCart() {
    const modalCart = document.getElementById("myModalCart");
    modalCart.style.display = "none";
    document.removeEventListener("keydown", handleKeyPressModalCart);
    document.removeEventListener("click", handleOutsideClickModalCart);
}

function handleKeyPressModalCart(event) {
    if (event.key === "Escape") {
        closeModalCart();
    }
}

function handleOutsideClickModalCart(event) {
    const modalCart = document.getElementById("myModalCart");
    const modalContent = document.querySelector(".cart-panel");
    if (modalCart.style.display === "block" && !modalContent.contains(event.target)) {
        closeModalCart();
    }
}

function esvaziarCarrinho() {
    const cartItemsList = document.querySelector('.cart-items-list');
    cartItemsList.innerHTML = '';

    cart.length = 0;
    const cartTotalElement = document.querySelector('.cart-total');
    cartTotalElement.textContent = 'Total: R$ 0.00';

    localStorage.removeItem('cart');
}

function updateTotal() {
    const cartTotalElement = document.querySelector('.cart-total');
    let totalPrice = 0;

    for (const item of cart) {
        totalPrice += parseFloat(item.price);
    }

    cartTotalElement.textContent = `Total: R$ ${totalPrice.toFixed(2)}`;
}

function comprar() {
    limparCarrinho();
    alert("Obrigado por realizar sua compra !!!");
}

function limparCarrinho() {
    cart.length = 0;
    updateCartUI();

    const cartTotalElement = document.querySelector('.cart-total');
    cartTotalElement.textContent = 'Total: R$ 0.00';
    localStorage.removeItem('cart');
}

const cart = [];

function addToCart(name, price, image) {
    cart.push({ name, price, image });
    updateCartUI();
    openModalCart();

    localStorage.setItem('cart', JSON.stringify(cart));
}

function removeFromCart(index) {
    cart.splice(index, 1);
    updateCartUI();
    updateTotal();

    localStorage.setItem('cart', JSON.stringify(cart));
}

function updateCartUI() {
    const cartItemsList = document.querySelector('.cart-items-list');
    cartItemsList.innerHTML = '';

    let totalPrice = 0;

    cart.forEach(item => {
        const cartItem = document.createElement('li');
        cartItem.classList.add('cart-item');
        cartItem.innerHTML = `
            <div class="cart-item__image">
                <img src="${item.image}" alt="Product Image">
            </div>
            <div class="cart-item__details">
                <span class="cart-item__name">${item.name}</span>
                <span class="cart-item__price">R$ ${item.price.toFixed(2)}</span>
                <button class="btnRemove" onclick="removeFromCart('${item.name}')">Remover</button>
                <i class="fa-solid fa-minus diminuir-quantidade"></i>
                <input type="text" value="1" class="cart-item-quantidade"               >
                <i class="fa-solid fa-plus somar-quantidade"></i>
            </div>
        `;
        cartItemsList.appendChild(cartItem);
        totalPrice += item.price;
    });

    const cartTotal = document.querySelector('.cart-total');
    cartTotal.textContent = `Total: R$ ${totalPrice.toFixed(2)}`;
}

function removeFromCart(productName) {
    // Encontre o índice do item no carrinho com base no nome do produto
    const index = cart.findIndex(item => item.name === productName);

    // Se o item foi encontrado no carrinho, remova-o
    if (index !== -1) {
        cart.splice(index, 1); // Remove o item do array cart
        updateCartUI(); // Atualize a interface do carrinho
        localStorage.setItem('cart', JSON.stringify(cart)); // Atualize o armazenamento local
    }
}

function somarQuantidade() {
    const inputElement = document.querySelector('.carrito-item-cantidad');
    let valorAtual = parseInt(inputElement.value);
    valorAtual += 1;
    inputElement.value = valorAtual;
  }

  // Função para diminuir a quantidade
  function diminuirQuantidade() {
    const inputElement = document.querySelector('.carrito-item-cantidad');
    let valorAtual = parseInt(inputElement.value);
    
    // Verifique se o valor atual é maior que 1 antes de diminuir
    if (valorAtual > 1) {
      valorAtual -= 1;
      inputElement.value = valorAtual;
    }
  }

  // Adicionar eventos de clique aos ícones
  const somarButton = document.querySelector('.somar-quantidade');
  const diminuirButton = document.querySelector('.diminuir-quantidade');

  somarButton.addEventListener('click', somarQuantidade);
  diminuirButton.addEventListener('click', diminuirQuantidade);