var btnSignin = document.querySelector("#signin");
var btnSignup = document.querySelector("#signup");

var body = document.querySelector("body");


btnSignin.addEventListener("click", function () {
   body.className = "sign-in-js"; 
});

btnSignup.addEventListener("click", function () {
    body.className = "sign-up-js";
})

function realizarCadastro() {
    var cdtnome = document.getElementById("cdtnome").value.trim();
    var cdtemail = document.getElementById("cdtemail").value.trim();
    var cdtsenha = document.getElementById("cdtsenha").value.trim();

    if (cdtnome === "") {
        alert("Por favor, preencha o campo Nome.");
        return false;
    }
    else if (cdtemail === "") {
        alert("Por favor, preencha o campo email.");
        return false;
    }
    else if (cdtsenha === "") {
        alert("Por favor, preencha o campo senha.");
        return false;
    }
}

function realizarLogin() {
    var lgnome = document.getElementById("lgnome").value.trim();
    var lgemail = document.getElementById("lgemail").value.trim();
    var lgsenha = document.getElementById("lgsenha").value.trim();

    if (lgnome === "") {
        alert("Por favor, preencha o campo Nome.");
        return false;
    }
    else if (lgemail === "") {
        alert("Por favor, preencha o campo Nome.");
        return false;
    }
    else if(lgsenha === "") {
        alert("Por favor, preencha o campo senha.");
        return false;
    }

    if (!verificarCredenciaisCorretas(lgnome, lgemail, lgsenha)) {
        alert("Nome de usuário ou senha incorretos. Por favor, tente novamente.");
        return false;
    }
    
    document.getElementById("loginForm").submit();
    var modalBoasVindas = document.getElementById("myModalBV");
    modalBoasVindas.style.display = "block";
    document.body.classList.add("modal-open");
}

function nameValidate() {
    var nomeInput = document.getElementById("cdtnome");
    var nomeSpan = document.querySelector(".span-required");

    if (nomeInput.value.length < 3) {
        nomeInput.classList.add("input-error");
        nomeSpan.style.display = "inline";
    } else {
        nomeInput.classList.remove("input-error");
        nomeSpan.style.display = "none";
    }
}

function emailValidate() {
    var emailInput = document.getElementById("cdtemail");
    var emailSpan = document.querySelector(".span-required-email");
    var emailRegex = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/;

    if (!emailRegex.test(emailInput.value)) {
        emailInput.classList.add("input-error");
        emailSpan.style.display = "inline";
    } else {
        emailInput.classList.remove("input-error");
        emailSpan.style.display = "none";
    }
}

function senhaValidate() {
    var senhaInput = document.getElementById("cdtsenha");
    var senhaSpan = document.querySelector(".span-required-senha");
    var senha = senhaInput.value;

    var hasUpperCase = /[A-Z]/.test(senha);
    var hasLowerCase = /[a-z]/.test(senha);
    var hasNumbers = /\d/.test(senha);
    var hasSpecialChars = /[!@#$%^&*()_+]/.test(senha);

    if (senha.length < 8 || !hasUpperCase || !hasLowerCase || !hasNumbers || !hasSpecialChars) {
        senhaInput.classList.add("input-error");
        senhaSpan.style.display = "inline";
    } else {
        senhaInput.classList.remove("input-error");
        senhaSpan.style.display = "none";
    }
}