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

                    <a href="#" class="button--link button--flex">
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
                <div class="slider">
                    <div class="buttons left">
                        <button class="arrow-icon" id="prevButton" ><i class="fas fa-chevron-left"></i></button>
                    </div>
                    <img src="" alt="Imagem" class="slide" id="modalImage">
                    <div class="buttons right">
                        <button class="arrow-icon" id="nextButton"><i class="fas fa-chevron-right"></i></button>
                    </div>
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
                <article class="product__card">
                    <img src="assets/img/produto1.png" alt="" class="product__img">

                    <h3 class="product__title">Irrigador automático</h3>
                    <span class="product__price">R$ 119,90</span>
                    <button class="btnVerMais" onclick="openModal('Irrigador automático', 'Não damos garantia...', ['/assets/img/produto1.png', '/assets/img/product2.png', '/assets/img/product3.png'], 'R$ 119,90')">Ver Mais</button>
                </article>

                <article class="product__card">
                    <img src="assets/img/produto2.png" alt="" class="product__img">

                    <h3 class="product__title">Kit Mini Suculentas com 20 unidades</h3>
                    <span class="product__price">R$ 46,00</span>
                    <button class="btnVerMais" onclick="openModal2('Kit Mini Suculentas com 20 unidades', 'Kit com 20 mudas...', ['/assets/img/produto2.png'], 'R$ 46,00')">Ver Mais</button>
                </article>

                <article class="product__card">
                    <img src="assets/img/produto3.png" alt="" class="product__img">

                    <h3 class="product__title">Orquídea Amarela </h3>
                    <span class="product__price">R$ 39,99</span>
                    <button class="btnVerMais" onclick="openModal2('Kit Mini Suculentas com 20 unidades', 'Kit com 20 mudas...', ['/assets/img/suculenta.png'], 'R$ 46,00')">Ver Mais</button>
                </article>

                <article class="product__card">
                    <img src="assets/img/produto4.png" alt="" class="product__img">

                    <h3 class="product__title">Terra Vegetal Adubada 2,4kg Composto Orgânico</h3>
                    <span class="product__price">R$ 13,50</span>
                    <button class="btnVerMais" onclick="openModal4('Terra Vegetal Adubada 2,4kg Composto Orgânico', 13.50, 'assets/img/terra vegetal.png')">Ver Mais</button>
                </article>

                <article class="product__card">
                    <img src="assets/img/fertilizante.png" alt="" class="product__img">

                    <h3 class="product__title">Fertilizante Grow Bokashi 3 Kg</h3>
                    <span class="product__price">R$ 41,67</span>
                    <button class="btnVerMais" onclick="openModal5('Fertilizante Grow Bokashi 3 Kg', 41.67, 'assets/img/fertilizante.png')">Ver Mais</button>
                </article>

                <article class="product__card">
                    <img src="assets/img/arandelas.png" alt="" class="product__img">

                    <h3 class="product__title">Kit 10 Arandelas Vasos De Plástico Suporte Parede Plantas</h3>
                    <span class="product__price">R$ 24,49</span>
                    <button class="btnVerMais" onclick="openModal6('Kit 10 Arandelas Vasos De Plástico Suporte Parede Plantas', 24.49, 'assets/img/arandelas.png')">Ver Mais</button>
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
                                Como escolher a planta ideal para mim?
                            </h3>
                        </header>

                        <div class="questions__content">
                            <p class="questions__description">
                                A planta certa para você pode variar de acordo com o local que você deseja coloca-la.
                                Lugares com menos claridade precisa de um tipo determinado de planta, para lugares com mais claridade serão necessárias outras plantas. Entre outros fatores
                            </p>
                        </div>
                    </div>

                    <div class="questions__item">
                        <header class="questions__header">
                            <i class="ri-add-line questions__icon"></i>
                            <h3 class="questions__item-title">
                                Quantas vezes por dia devo regar minhas plantas?
                            </h3>
                        </header>

                        <div class="questions__content">
                            <p class="questions__description">
                                Cada planta exige quantidades específicas, mas uma regra que não costuma falhar é evitar encharcar a terra (sempre existem exceções).
                                O excesso de água “afoga” as raízes, que carecem de ar e aumenta o surgimento de doenças e de fungos.
                            </p>
                        </div>
                    </div>

                    <div class="questions__item">
                        <header class="questions__header">
                            <i class="ri-add-line questions__icon"></i>
                            <h3 class="questions__item-title">
                                Como combater as “pragas”?
                            </h3>
                        </header>

                        <div class="questions__content">
                            <p class="questions__description">
                                Em um ambiente equilibrado não existem “pragas”. Para isso é importante manter uma certa diversidade de plantas, inclusive as invasoras, ou seja, aquelas que não foram cultivadas por você, mas apareceram na sua horta.
                                Retire apenas as que estão ameaçando o desenvolvimento do cultivo. Quanto mais cheio de diversidade for o seu solo, maiores as chances da sua horta abrigar alguns inimigos naturais das “pragas”.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="questions__group">
                    <div class="questions__item">
                        <header class="questions__header">
                            <i class="ri-add-line questions__icon"></i>
                            <h3 class="questions__item-title">
                                Por que devo usar irrigador automatizado?
                            </h3>
                        </header>

                        <div class="questions__content">
                            <p class="questions__description">
                                Para garantir um jardim saudável é necessário fazer uso da irrigação. A
                                irrigação automatizada é o uso da tecnologia para fornecer água na medida certa, evitando que as plantas fiquem reféns da água da chuva ou dependam dos cuidados humanos.
                            </p>
                        </div>
                    </div>

                    <div class="questions__item">
                        <header class="questions__header">
                            <i class="ri-add-line questions__icon"></i>
                            <h3 class="questions__item-title">
                                Existe alguma planta que é mais segura para quem tem bicho de estimação?
                            </h3>
                        </header>

                        <div class="questions__content">
                            <p class="questions__description">
                                Plantas sem espinhos, com folhas curtas e de preferência pequenas
                            </p>
                        </div>
                    </div>

                    <div class="questions__item">
                        <header class="questions__header">
                            <i class="ri-add-line questions__icon"></i>
                            <h3 class="questions__item-title">
                                Quais as vantagens de utilizar irrigador automático?
                            </h3>
                        </header>

                        <div class="questions__content">
                            <p class="questions__description">
                                Ele irá gerar uma economia para seu bolso e garantir que você tenha seus jardins verdes e bonitos em qualquer estação do ano.
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