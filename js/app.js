/**antigo javascript**/
function showMe(){
    var nome = document.getElementById("nome").value;
    var email = document.getElementById("email").value;
    var senha = document.getElementById("senha").value;
    var cpf = document.getElementById("cpf").value;
    var rg = document.getElementById("rg").value;
    
    /*coloca uma borda vermelha nos campos de texto vazios*/
    
    if (nome === "") {
        document.getElementById("nome").style.border = "1px solid red";
    }
    if (email === "") {
        document.getElementById("email").style.border = "1px solid red";
    }
    if (senha === "") {
        document.getElementById("senha").style.border = "1px solid red";
    }
    if (cpf === "") {
        document.getElementById("cpf").style.border = "1px solid red";
    }
    if (rg === "") {
        document.getElementById("rg").style.border = "1px solid red";
    }
    
    /*retira a borda*/
    
    if (nome != "") {
        document.getElementById("nome").style.border = "none";
    }
    if (email != "") {
        document.getElementById("email").style.border = "none";
    }
    if (senha != "") {
        document.getElementById("senha").style.border = "none";
    }
    if (cpf != "") {
        document.getElementById("cpf").style.border = "none";
    }
    if (rg != "") {
        document.getElementById("rg").style.border = "none";
    }
    
    /* para escrever dentro do "if" "ou"=|| e "e"=&& */
    
    if (nome != "" && email != "" && senha != "" && cpf != "" && rg != "") {
        var tudo = "Nome: "+nome+"</br>"+"E-mail: "+email+"</br>"+"Senha: "+senha+"</br>"+"CPF: "+cpf+"</br>"+"RG: "+rg;
        alert("Você Foi Cadastrado Com Sucesso!");
        document.getElementById("chamado").innerHTML = tudo;
        document.getElementById("botao").style.display = "none";
    }else{
        alert("Houve um erro no seu cadastro!!!");
    }
}
