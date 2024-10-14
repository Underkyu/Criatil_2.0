function validarSenhas() {
    const senha = document.getElementById('senha').value;
    const cofSenha = document.getElementById('cof_senha').value;

    if (senha !== cofSenha) {
        alert('As senhas não coincidem. Por favor, tente novamente.');
        return false;
    }
    return true;
}

// função simples p verificar se senha == confirmar senha