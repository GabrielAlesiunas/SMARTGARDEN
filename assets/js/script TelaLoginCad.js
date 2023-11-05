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

function verificaForcaSenha() 
{
	var numeros = /([0-9])/;
	var alfabetoa = /([a-z])/;
	var alfabetoA = /([A-Z])/;
	var chEspeciais = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;


	if($('#cdtsenha').val().length<6) 
	{
		$('#password-status').html("<span style='color:red'>Fraco, insira no mínimo 6 caracteres</span>");
	} else {  	
		if ($('#cdtsenha').val().match(numeros) && $('#cdtsenha').val().match(alfabetoa) && $('#cdtsenha').val().match(alfabetoA) && $('#cdtsenha').val().match(chEspeciais))
		{            
			$('#password-status').html("<span style='color:green'><b>Forte</b></span>");
		} else {
			$('#password-status').html("<span style='color:orange'>Médio</span>");
		}
	}
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