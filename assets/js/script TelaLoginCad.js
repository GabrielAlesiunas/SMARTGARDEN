var btnSignin = document.querySelector("#signin");
var btnSignup = document.querySelector("#signup");

var body = document.querySelector("body");


btnSignin.addEventListener("click", function () {
   body.className = "sign-in-js"; 
});

btnSignup.addEventListener("click", function () {
    body.className = "sign-up-js";
})

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


function nomeValidate() {
    const nomeInput = document.getElementById("cdtnome");
    const nomeValue = nomeInput.value;
    if (nomeValue.length < 4) {
        nomeInput.setCustomValidity("O nome deve ter pelo menos 4 caracteres.");
    } else {
        nomeInput.setCustomValidity("");
    }
}

function emailValidate() {
    const emailInput = document.getElementById("cdtemail");
    const emailValue = emailInput.value;
    const emailRegex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
    if (!emailRegex.test(emailValue)) {
        emailInput.setCustomValidity("Por favor, insira um endereço de email válido.");
    } else {
        emailInput.setCustomValidity("");
    }
}

function senhaValidate() {
    const senhaInput = document.getElementById("cdtsenha");
    const indicator = document.querySelector('.password-strength-indicator .indicator');
    const fraco = document.querySelector('.password-strength-indicator .fraco');
    const medio = document.querySelector('.password-strength-indicator .medio');
    const forte = document.querySelector('.password-strength-indicator .forte');
    const text = document.querySelector('.password-strength-indicator .text');

    const senha = senhaInput.value;

    let regExpFraco = /[a-z]/;
    let regExpMedio = /\d+/;
    let regExpForte = /.[!,@,#,$,%,^,&,*,?,_,~,-,()]/;

    let no = 0;

    if (senha.length === 0) {
        indicator.style.display = "none";
        text.style.display = "none";
        return;
    }

    if (senha.length <= 3 && (senha.match(regExpFraco) || senha.match(regExpMedio) || senha.match(regExpForte))) {
        no = 1;
    } else if (senha.length >= 6 && ((senha.match(regExpFraco) && senha.match(regExpMedio)) || (senha.match(regExpMedio) && senha.match(regExpForte)) || (senha.match(regExpFraco) && senha.match(regExpForte)))) {
        no = 2;
    } else if (senha.length >= 6 && senha.match(regExpFraco) && senha.match(regExpMedio) && senha.match(regExpForte)) {
        no = 3;
    }

    // Defina as cores das barras de força com base na força da senha
    fraco.style.backgroundColor = no >= 1 ? "#ff4757" : "#000";
    medio.style.backgroundColor = no >= 2 ? "orange" : "#000";
    forte.style.backgroundColor = no === 3 ? "#23ad5c" : "#000";

    text.style.display = "block";
    text.textContent = no === 1 ? "Senha fraca" : (no === 2 ? "Senha média" : "Senha forte");
    text.className = no === 1 ? "text fraco" : (no === 2 ? "text medio" : "text forte");
}

function validateCadastro() {
    const nomeInput = document.getElementById("cdtnome");
    const emailInput = document.getElementById("cdtemail");
    const senhaInput = document.getElementById("cdtsenha");

    nomeValidate();
    emailValidate();
    senhaValidate();

    if (nomeInput.checkValidity() && emailInput.checkValidity() && senhaInput.checkValidity()) {
        return true;
    } else {
        return false;
    }
}