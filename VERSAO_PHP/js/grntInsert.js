document.addEventListener("DOMContentLoaded", function() {
    const botaoAdicionar = document.getElementById('btnAdicionar');
    const containerFormulario = document.getElementById('form-container1');

    // faz o form de brinquedos aparecer
    if(botaoAdicionar){
    botaoAdicionar.addEventListener('click', function() {
        console.log('botão de insert clicado');
        containerFormulario.style.display = 'flex';
    });

    // fecha qnd clicar fora do formulário
    containerFormulario.addEventListener('click', function(e) {
        if (e.target === containerFormulario) {
            containerFormulario.style.display = 'none';
        }
    });
}

    // faz o form de categorias aparecer
    const botaoAdicionarCategoria = document.getElementById('btnAdicionarCategoria');
    const containerFormularioCategoria = document.getElementById('form-container2');

    if (botaoAdicionarCategoria) {
        botaoAdicionarCategoria.addEventListener('click', function() {
            console.log('botão de adicionar categoria clicado');
            containerFormularioCategoria.style.display = 'flex';
        });

        // fecha qnd clicar fora do formulário
        containerFormularioCategoria.addEventListener('click', function(e) {
            if (e.target === containerFormularioCategoria) {
                containerFormularioCategoria.style.display = 'none';
            }
        });
    }

    // faz o form de selos aparecer
    const botaoAdicionarSelo = document.getElementById('btnAdicionarSelo');
    const containerFormularioSelo = document.getElementById('form-container3');

    if (botaoAdicionarSelo) {
        botaoAdicionarSelo.addEventListener('click', function() {
            console.log('botão de adicionar selo clicado');
            containerFormularioSelo.style.display = 'flex';
        });

        // fecha qnd clicar fora do formulário
        containerFormularioSelo.addEventListener('click', function(e) {
            if (e.target === containerFormularioSelo) {
                containerFormularioSelo.style.display = 'none';
            }
        });
    }
});