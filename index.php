<?php
$sessionTimeout = 30 * 60;
session_set_cookie_params($sessionTimeout);
session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    $username = null;
}

if (isset($_SESSION['login_success']) && $_SESSION['login_success'] === true) {
    $username = $_SESSION['username'];
    $_SESSION['login_success'] = false;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--=============== FAVICON ===============-->
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
    <!--=============== REMIX ICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/styles TelaProdutos.css">
    <link rel="stylesheet" href="assets/css/style Dropdown.css">

    <title>SmartGarden</title>
</head>

<body>
    <!--==================== HEADER ====================-->
    <header class="header" id="header">
        <nav class="nav container">
            <a href="index.php" class="nav__logo">
                <i class="ri-leaf-line nav__logo-icon"></i> SmartGarden
            </a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="#home" class="nav__link active-link">Home</a>
                    </li>
                    <li class="nav__item">
                        <a href="#about" class="nav__link">Sobre</a>
                    </li>
                    <li class="nav__item">
                        <a href="#products" class="nav__link">Produtos</a>
                    </li>
                    <li class="nav__item">
                        <a href="#faqs" class="nav__link">FAQs</a>
                    </li>
                    <li class="nav__item">
                        <a href="#contact" class="nav__link">Contato</a>
                    </li>

                    <li class="nav__item<?php if (isset($_SESSION['username'])) echo ' Controle'; ?>">
                        <a href="/controle.php" class="nav__link">Controle</a>
                    </li>

                    <li class="nav__item">
                        <?php if (!isset($_SESSION['username'])) : ?>
                            <a href="telaLoginCad.php" class="nav__link">
                                <i class="fas fa-user"></i> Minha Conta
                            </a>
                        <?php endif; ?>
                    </li>
                    <li class="nav__item">
                        <?php if (isset($_SESSION['username'])) : ?>
                            <div class="dropdown">
                                <a class="nav__link" id="dropdownButton">
                                    <?php echo $username; ?> <i class="fas fa-caret-down"></i>
                                </a>
                                <div class="dropdown-content" id="dropdownContent">
                                    <a href="perfil.php" id="perfilLink">Perfil</a>
                                    <a href="logout.php" id="logoutLink">Logout</a>
                                </div>
                            </div>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>

            <div class="nav__btns">
                <i class="ri-moon-line change-theme" id="theme-button"></i>

                <div class="nav__toggle" id="nav-toggle">
                    <i class="ri-menu-line"></i>
                </div>
            </div>
        </nav>
    </header>

    <main class="main">
        <!--==================== HOME ====================-->
        <section class="home" id="home">
            <div class="home__container container grid">
                <img src="assets/img/home.png" alt="" class="home__img">

                <div class="home__data">
                    <h1 class="home__title">
                        As plantas farão <br> sua vida melhor
                    </h1>
                    <p class="home__description">
                        Bem-vindo ao nosso site, dedicado exclusivamente aos amantes de plantas! Aqui você
                        encontrará tudo o que precisa saber sobre irrigação automatizada e como eles podem ser uma
                        boa escolha para o cuidado e crescimento saudável de suas plantas.
                    </p>
                    <a href="#about" class="button button--flex">
                        Explore <i class="ri-arrow-right-down-line button__icon"></i>
                    </a>
                </div>

                <div class="home__social">
                    <span class="home__social-follow">Siga nos</span>

                    <div class="home__social-links">
                        <a href="https://www.facebook.com/" target="_blank" class="home__social-link">
                            <i class="ri-facebook-fill"></i>
                        </a>
                        <a href="https://www.instagram.com/" target="_blank" class="home__social-link">
                            <i class="ri-instagram-line"></i>
                        </a>
                        <a href="https://twitter.com/" target="_blank" class="home__social-link">
                            <i class="ri-twitter-fill"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!--==================== ABOUT ====================-->
        <section class="about section container" id="about">
            <div class="about__container grid">
                <img src="assets/img/about.png" alt="" class="about__img">

                <div class="about__data">
                    <h2 class="section__title about__title">
                        Quem somos & <br> por que nos escolher
                    </h2>

                    <p class="about__description">
                        Somos uma equipe de desenvolvedores de sistemas criando mais um projeto.
                        Que as plantas trazem um ar agradável para os ambientes, nós já sabemos.
                        Mas talvez não tenhamos dado conta do quão amplo é o benefício que elas proporcionam no nosso dia a dia.
                        E pensando nisso resolvemos criar um tipo de irrigação automatizada para facilitar e melhorar o crescimento e desenvolvimento de suas plantas.
                    </p>

                    <div class="about__details">
                        <p class="about__details-description">
                            <i class="ri-checkbox-fill about__details-icon"></i>
                            Damos informações para cuidar melhor de suas plantas;
                        </p>
                        <p class="about__details-description">
                            <i class="ri-checkbox-fill about__details-icon"></i>
                            Inovação continua;
                        </p>
                        <p class="about__details-description">
                            <i class="ri-checkbox-fill about__details-icon"></i>
                            Ótima qualidade;
                        </p>
                        <p class="about__details-description">
                            <i class="ri-checkbox-fill about__details-icon"></i>
                            Seu dinheiro de volta;
                        </p>
                        <p class="about__details-description">
                            <i class="ri-checkbox-fill about__details-icon"></i>
                            Fácil instalação.
                        </p>
                    </div>

                    <a href="#products" class="button--link button--flex">
                        Compre agora <i class="ri-arrow-right-down-line button__icon"></i>
                    </a>
                </div>
            </div>
        </section>

        <!--==================== PRODUCTS ====================-->
        <!--==================== MODAL ====================-->
        <div class="modalProduto" id="myModal" style="display: none;">
            <div class="modal-overlay" onclick="closeModal()"></div>
            <div class="modal-content">
                <span class="close-button-product" onclick="closeModal()">&times;</span>
                <h2 class="modalTitulo"></h2>
                <p class="modalDescricao"></p>
                <div class="buttons left">
                        <button class="arrow-icon" id="prevButton" ><i class="fas fa-chevron-left"></i></button>
                    </div>
                <div class="slider">
                    <img src="" alt="Imagem" class="slide" id="modalImage">
                    
                </div>
                <div class="buttons right">
                        <button class="arrow-icon" id="nextButton"><i class="fas fa-chevron-right"></i></button>
                    </div>
                <p class="modalPreco"></p>
                <a href='https://www.mercadolivre.com.br' target="_blank"><button class="btnAddCart">Comprar</button></a>
            </div>
        </div>

        <section class="product section container" id="products">
            <h2 class="section__title-center">
                Confira nossos <br> produtos
            </h2>

            <p class="product__description">
                Aqui estão algumas de nossas plantas e acessórios disponíveis para compra.
            </p>

            <div class="product__container grid">
                <!-- PRODUTO 1 -->
                <article class="product__card">
                    <img src="assets/img/produto1/arduino.png" alt="" class="product__img">
                    <h3 class="product__title">Irrigador automático</h3>
                    <span class="product__price">R$ 119,90</span>
                    <button class="btnVerMais" onclick="openModal('Irrigador Automático Inteligente com Arduino', 'Transforme o seu jardim em um oásis verdejante e vibrante com o nosso Irrigador Automático Inteligente baseado em Arduino. Este inovador sistema de irrigação é a solução perfeita para manter suas plantas, flores e hortas saudáveis e bem-hidratadas, sem o incômodo de regas manuais.', ['/assets/img/produto1/arduino.png', '/assets/img/produto1/cabos.png', '/assets/img/produto1/caixa.png'], 'R$ 119,90')">Ver Mais</button>
                </article>

                <!-- PRODUTO 2 -->
                <article class="product__card">
                    <img src="assets/img/produto2.png" alt="" class="product__img">
                    <h3 class="product__title">Produto 2</h3>
                    <span class="product__price">R$ 46,00</span>
                    <button class="btnVerMais" onclick="openModal2('Produto 2', 'Descrição 2', ['/assets/img/produto2.png', '/assets/img/product2.png', '/assets/img/product3.png'], 'R$ 46,00')">Ver Mais</button>
                </article>

                <!-- PRODUTO 3 -->
                <article class="product__card">
                    <img src="assets/img/produto3.png" alt="" class="product__img">
                    <h3 class="product__title">Produto 3 </h3>
                    <span class="product__price">R$ 39,99</span>
                    <button class="btnVerMais" onclick="openModal3('Produto 3', 'Descrição 3', ['/assets/img/produto3.png', '/assets/img/product2.png', '/assets/img/product3.png'], 'R$ 39,99')">Ver Mais</button>
                </article>

                <!-- PRODUTO 5 -->
                <article class="product__card">
                    <img src="assets/img/produto5/hortela.png" alt="" class="product__img">
                    <h3 class="product__title">Hortelã</h3>
                    <span class="product__price">R$ 19,90</span>
                    <button class="btnVerMais" onclick="openModal5('Hortelã', 'Desperte seu jardineiro interior com o nosso elegante Vaso de Hortelã Fresca. Este pequeno jardim em casa é a maneira perfeita de cultivar hortelã orgânica e fresca em sua cozinha, varanda ou jardim. A hortelã é uma erva aromática versátil que adiciona um toque de frescor a uma variedade de pratos, desde saladas até coquetéis.', ['/assets/img/produto5/hortela.png', '/assets/img/produto5/hortela2.png', '/assets/img/produto5/info hortela.jpg'], 'R$ 19,90')">Ver Mais</button>
                </article>

                <!-- PRODUTO 4 -->
                <article class="product__card">
                    <img src="assets/img/produto4/frente.png" alt="" class="product__img">
                    <h3 class="product__title">Bertalha Roxa</h3>
                    <span class="product__price">R$ 13,50</span>
                    <button class="btnVerMais" onclick="openModal4('Bertalha Roxa', 'Bem-vindo ao mundo da Bertalha Roxa, uma planta fascinante que combina beleza e sabor em uma única experiência de cultivo. Esta variedade de bertalha não apenas encanta com suas folhas roxas vibrantes, mas também oferece um sabor suave e terroso que adiciona um toque especial às suas refeições.', ['/assets/img/produto4/frente.png', '/assets/img/produto4/cima.png', '/assets/img/produto4/info bertalha.jpg'], 'R$ 13,50')">Ver Mais</button>
                </article>

                <!-- PRODUTO 6 -->
                <article class="product__card">
                    <img src="assets/img/produto6/menta1.png" alt="" class="product__img">
                    <h3 class="product__title">Menta</h3>
                    <span class="product__price">R$ 29,90</span>
                    <button class="btnVerMais" onclick="openModal6('Menta', 'Bem-vindo à nossa seleção de Menta Fresca, um ingrediente versátil que pode transformar suas receitas e momentos de relaxamento. A menta é conhecida por seu sabor refrescante e aroma revigorante, tornando-a um complemento perfeito para sua cozinha, chás, coquetéis e cuidados pessoais.', ['/assets/img/produto6/menta1.png', ' assets/img/produto6/menta2.png', 'assets/img/produto6/info menta.jpg'], 'R$ 29,90')">Ver Mais</button>
                </article>

            </div>
        </section>

        <!--==================== QUESTIONS ====================-->
        <section class="questions section" id="faqs">
            <h2 class="section__title-center questions__title container">
                Temos as respostas para suas perguntas!
            </h2>

            <div class="questions__container container grid">
                <div class="questions__group">
                    <div class="questions__item">
                        <header class="questions__header">
                            <i class="ri-add-line questions__icon"></i>
                            <h3 class="questions__item-title">
                                Como funciona um irrigador controlado por uma placa ESP32?
                            </h3>
                        </header>

                        <div class="questions__content">
                            <p class="questions__description">
                                Um irrigador controlado por uma placa ESP32 é um dispositivo que utiliza um microcontrolador para automatizar o processo de irrigação, permitindo que você programe horários e durações de irrigação de acordo com as necessidades das plantas.
                            </p>
                        </div>
                    </div>

                    <div class="questions__item">
                        <header class="questions__header">
                            <i class="ri-add-line questions__icon"></i>
                            <h3 class="questions__item-title">
                                Quais são os benefícios de usar um irrigador controlado por uma placa ESP32?
                            </h3>
                        </header>

                        <div class="questions__content">
                            <p class="questions__description">
                                Os benefícios incluem economia de água, maior eficiência na irrigação, automação e controle remoto das operações de irrigação, e a capacidade de ajustar as configurações com base em dados climáticos em tempo real.
                            </p>
                        </div>
                    </div>

                    <div class="questions__item">
                        <header class="questions__header">
                            <i class="ri-add-line questions__icon"></i>
                            <h3 class="questions__item-title">
                                Posso controlar o irrigador usando meu smartphone?
                            </h3>
                        </header>

                        <div class="questions__content">
                            <p class="questions__description">
                                Sim, nossos irrigadores controlados por uma ESP32 têm a capacidade de serem controlados remotamente por meio do aplicativo para smartphone.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="questions__group">
                    <div class="questions__item">
                        <header class="questions__header">
                            <i class="ri-add-line questions__icon"></i>
                            <h3 class="questions__item-title">
                                É difícil configurar um irrigador controlado por uma ESP32?
                            </h3>
                        </header>

                        <div class="questions__content">
                            <p class="questions__description">
                                Não, nossos irrigadores controlados pela placa ESP32 já vem com uma pré configuração para cada tipo de planta.
                            </p>
                        </div>
                    </div>

                    <div class="questions__item">
                        <header class="questions__header">
                            <i class="ri-add-line questions__icon"></i>
                            <h3 class="questions__item-title">
                                Posso programar múltiplos horários de irrigação com um único irrigador controlado por uma placa ESP32?
                            </h3>
                        </header>

                        <div class="questions__content">
                            <p class="questions__description">
                                Sim, nossos irrigadores controlados por placa ESP32 permite que você programe múltiplos horários de irrigação para atender às necessidades específicas das suas plantas.
                            </p>
                        </div>
                    </div>

                    <div class="questions__item">
                        <header class="questions__header">
                            <i class="ri-add-line questions__icon"></i>
                            <h3 class="questions__item-title">
                                O que devo fazer se tiver problemas com o meu irrigador automatizado?
                            </h3>
                        </header>

                        <div class="questions__content">
                            <p class="questions__description">
                                Entre em contato com nosso suporte ao cliente para obter assistência. Eles estarão prontos para ajudá-lo a solucionar quaisquer problemas ou dúvidas que você possa ter.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--==================== CONTACT ====================-->
        <section class="contact section container" id="contact">
            <div class="contact__container grid">
                <div class="contact__box">
                    <h2 class="section__title">
                        Entre em contato conosco <br> através de qualquer um <br> dos meios de comunicação
                    </h2>

                    <div class="contact__data">
                        <div class="contact__information">
                            <h3 class="contact__subtitle">Ligue para nós para suporte instantâneo</h3>
                            <span class="contact__description">
                                <i class="ri-phone-line contact__icon"></i>
                                15997671792
                            </span>
                        </div>

                        <div class="contact__information">
                            <h3 class="contact__subtitle">Escreva-nos por email</h3>
                            <span class="contact__description">
                                <i class="ri-mail-line contact__icon"></i>
                                gabriel.raimundo3@etec.sp.gopv.br
                            </span>
                        </div>
                    </div>
                </div>

                <form action="" class="contact__form">
                    <div class="contact__inputs">
                        <div class="contact__content">
                            <input type="email" placeholder=" " class="contact__input">
                            <label for="" class="contact__label">Email</label>
                        </div>

                        <div class="contact__content">
                            <input type="text" placeholder=" " class="contact__input">
                            <label for="" class="contact__label">Assunto</label>
                        </div>

                        <div class="contact__content contact__area">
                            <textarea name="message" placeholder=" " class="contact__input"></textarea>
                            <label for="" class="contact__label">Mensagem</label>
                        </div>
                    </div>
                    <button class="button button--flex" id="mostrarMensagem">
                        Enviar Mensagem
                        <i class="ri-arrow-right-up-line button__icon"></i>
                    </button>
                </form>
            </div>
        </section>
    </main>

    <!--==================== FOOTER ====================-->
    <footer class="footer section">
        <div class="footer__container container grid">
            <div class="footer__content">
                <a href="#" class="footer__logo">
                    <i class="ri-leaf-line footer__logo-icon"></i> SmartGarden
                </a>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Nosso Endereço</h3>

                <ul class="footer__data">
                    <li class="footer__information">Manira Jacob, 45 - Tietê</li>
                    <li class="footer__information">18530-000</li>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Contate-nos</h3>

                <ul class="footer__data">
                    <li class="footer__information">15997671792</li>

                    <div class="footer__social">
                        <a href="https://www.facebook.com/" class="footer__social-link">
                            <i class="ri-facebook-fill"></i>
                        </a>
                        <a href="https://www.instagram.com/" class="footer__social-link">
                            <i class="ri-instagram-line"></i>
                        </a>
                        <a href="https://twitter.com/" class="footer__social-link">
                            <i class="ri-twitter-fill"></i>
                        </a>
                    </div>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">
                    Nós aceitamos todos os cartões de crédito e débito
                </h3>

                <div class="footer__cards">
                    <img src="assets/img/visa.png" alt="" class="footer__card">
                    <img src="assets/img/mastercard.png" alt="" class="footer__card">
                    <img src="assets/img/paypal.png" alt="" class="footer__card">
                    <img src="assets/img/pix.png" alt="" class="footer__card">
                </div>
            </div>
        </div>

        <p class="footer__copy">&#169; SmartGarden. Todos os direitos reservados</p>
    </footer>

    <!--=============== SCROLL UP ===============-->
    <a href="#" class="scrollup" id="scroll-up">
        <i class="ri-arrow-up-fill scrollup__icon"></i>
    </a>

    <!--=============== SCROLL REVEAL ===============-->
    <script src="assets/js/scrollreveal.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>

    <script>
        const botaoAlerta = document.getElementById("mostrarMensagem");

        botaoAlerta.addEventListener("click", function() {
            window.alert("Email enviado com sucesso.");
        });
    </script>
</body>
<script src="assets/js/script Dropdown.js"></script>
<script src="assets/js/script ModalProduto.js"></script>

</html>