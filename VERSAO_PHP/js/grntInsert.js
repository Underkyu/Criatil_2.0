// esse js serve pra fazer o formulário de inserção aparecer, é usado pela página brinquedosGrnt.php

document.addEventListener("DOMContentLoaded", function() {
    const botaoAdicionar = document.getElementById('btnAdicionar');
    const containerFormulario = document.getElementById('form-container1');

    // faz o form aparecer
    botaoAdicionar.addEventListener('click', function() {
        console.log('Botão clicado');
        containerFormulario.style.display = 'flex';
        
    });

    // fecha qnd clicar fora
    containerFormulario.addEventListener('click', function(e) {
        if (e.target === containerFormulario) {
            containerFormulario.style.display = 'none';
        }
    });
});