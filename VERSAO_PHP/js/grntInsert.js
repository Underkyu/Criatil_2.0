document.addEventListener("DOMContentLoaded", function() {
    const botaoAdicionar = document.getElementById('btnAdicionar');
    const containerFormulario = document.getElementById('form-container');

    // faz o form aparecer
    botaoAdicionar.addEventListener('click', function() {
        containerFormulario.style.display = 'flex';
    });

    // fecha qnd clicar fora
    containerFormulario.addEventListener('click', function(e) {
        if (e.target === containerFormulario) {
            containerFormulario.style.display = 'none';
        }
    });
});