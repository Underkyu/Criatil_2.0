function validarSenhas() {
    var senha = document.getElementById('senha').value;
    var cofSenha = document.getElementById('cof_senha').value;

    if (senha !== cofSenha) {
        alert('As senhas não coincidem. Por favor, tente novamente.');
        return false;
    }
    return true;
}

function mostrarSenha(idInput, idBotao) {
    const input = document.getElementById(idInput);
    const botao = document.getElementById(idBotao);

    if (input.type === 'password') {
        input.setAttribute('type', 'text');
        botao.classList.replace('bi-eye', 'bi-eye-slash');
    } else {
        input.setAttribute('type', 'password');
        botao.classList.replace('bi-eye-slash', 'bi-eye');
    }
}
// função simples p verificar se senha == confirmar senha