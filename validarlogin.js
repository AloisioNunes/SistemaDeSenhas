const inputEmail = document.querySelector("input[id=inputEmail]");
const inputSenha = document.querySelector("input[id=inputSenha]");
const buttonLogin = document.querySelector("button[id=buttonLogin]");

buttonLogin.onclick = function() {
    if (isEmpty(inputEmail.value)) {
        window.alert("Email não inserido!");
    }
    if (isEmpty(inputSenha.value)) {
        window.alert("Senha não inserida!");
    }
}

function isEmpty(string){
    return (!string || string.length === 0);
}
