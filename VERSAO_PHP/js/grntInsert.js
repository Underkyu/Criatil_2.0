document.addEventListener("DOMContentLoaded", function() {
    const botaoAdicionar = document.getElementById('btnAdicionar');
    const containerFormulario = document.getElementById('form-container');

    botaoAdicionar.addEventListener('click', function() {
        containerFormulario.style.display = 'flex';
    });

    containerFormulario.addEventListener('click', function(e) {
        if (e.target === containerFormulario) {
            containerFormulario.style.display = 'none';
        }
    });
});