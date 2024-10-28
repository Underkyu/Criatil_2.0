document.addEventListener("DOMContentLoaded", function() {
    const containerFormulario = document.getElementById('form-container');

    document.querySelectorAll('.detalhes').forEach(botao => {
        botao.addEventListener('click', function() {
            // pega os dados do usuário usando o data-
            const codigoUsuario = this.getAttribute('data-codigo');
            const nomeUsuario = this.getAttribute('data-nome');
            const nascimentoUsuario = this.getAttribute('data-nascimento');
            const celularUsuario = this.getAttribute('data-celular');
            const emailUsuario = this.getAttribute('data-email');
            const tipoUsuario = this.getAttribute('data-tipo');

            // preenche os campos do form com os dados
            document.getElementById('codigo').value = codigoUsuario;
            document.getElementById('nome').value = nomeUsuario;
            document.getElementById('nascimento').value = nascimentoUsuario;
            document.getElementById('celular').value = celularUsuario;
            document.getElementById('email').value = emailUsuario;
            document.getElementById('tipo').value = tipoUsuario;

            // faz o form aparecer
            if (containerFormulario) {
                containerFormulario.style.display = 'flex';
            }
        });
    });

            // fecha qnd clicar fora
    if (containerFormulario) {
        containerFormulario.addEventListener('click', function(e) {
            if (e.target === containerFormulario) {
                containerFormulario.style.display = 'none';
            }
        });
    }
});