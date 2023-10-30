<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="/assets/css/style TelaLoginCad.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

</head>

<body>


            <!-- ---------------CADASTRO---------------  -->
    <div class="container">
        <div class="content first-content">
            <div class="first-column">
                <h2 class="title title-primary">Bem vindo de volta!</h2>
                <p class="description description-primary">Para se manter conectado conosco</p>
                <p class="description description-primary">por favor faça login com suas informações pessoais</p>
                <button id="signin" class="btn btn-primary">Entrar</button>
            </div>
            <div class="second-column">
                <h2 class="title title-second">Criar uma conta</h2>
                <p class="description description-second">Use seu e-mail para inscrição:</p>
                <form action="cadastro.php" method="post" class="form" id="cadastroForm">
                    <label class="label-input" for="">
                        <i class="far fa-user icon-modify"></i>
                        <input type="text" name="nome" id="cdtnome" placeholder="Nome" autofocus required oninput="nameValidate()">
                        <!-- <span class="span-required" style="display: none">Nome deve ter no mínimo 3 caracteres</span> -->
                    </label>

                    <label class="label-input" for="">
                        <i class="far fa-envelope icon-modify"></i>
                        <input type="email" name="email" id="cdtemail" placeholder="Email" autofocus required oninput="emailValidate()">
                        <!-- <span class="span-required-email">Digite um email válido</span> -->
                    </label>

                    <label class="label-input" for="">
                        <i class="fas fa-lock icon-modify"></i>
                        <input type="password" name="senha" id="cdtsenha" placeholder="Senha" required oninput="senhaValidate()">
                        <!-- <span class="span-required-senha"> dsadasdasd</span> -->
                    </label>

                    <button class="btn btn-second" type="submit" name="submit">Inscrever-se</button>
                </form>
            </div><!-- second column -->
        </div><!-- first content -->

            <!-- ---------------LOGIN---------------  -->        
        <div class="content second-content">
            <div class="first-column">
                <h2 class="title title-primary">olá amigo!</h2>
                <p class="description description-primary">Insira seus dados pessoais</p>
                <p class="description description-primary">e comece a jornada conosco</p>
                <button id="signup" class="btn btn-primary">inscrever-se</button>
            </div>
            <div class="second-column">
                <h2 class="title title-second">faça login no site</h2>
                <p class="description description-second">Use sua conta de e-mail:</p>
                <form action="login.php" method="post" class="form" id="loginForm">

                    <label class="label-input" for="">
                        <i class="far fa-user icon-modify"></i>
                        <input type="text" name="nome" id="lgnome" placeholder="Nome"required>
                    </label>

                    <label class="label-input" for="">
                        <i class="far fa-envelope icon-modify"></i>
                        <input type="email" name="email" id="lgemail" placeholder="Email" required>
                    </label>

                    <label class="label-input" for="">
                        <i class="fas fa-lock icon-modify"></i>
                        <input type="password" name="senha" id="lgsenha" placeholder="Password" required>
                    </label>
                    <button class="btn btn-second" onclick="realizarLogin()">entrar</button>
                </form>
            </div><!-- second column -->
        </div><!-- second-content -->
    </div>
    <script src="/assets/js/script TelaLoginCad.js"></script>
</body>

</html>