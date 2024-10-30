document.addEventListener("DOMContentLoaded", function() {
    const containerFormulario = document.getElementById('form-container');

    document.querySelectorAll('.detalhes').forEach(botao => {
        botao.addEventListener('click', function() {
            const tipo = this.getAttribute('data-tipo');

            //se data-tipo="usuario"
            if (tipo === 'usuario') { 
                // pega os dados do usuário
                const codigoUsuario = this.getAttribute('data-codigoUsu');
                const nomeUsuario = this.getAttribute('data-nomeUsu');
                const nascimentoUsuario = this.getAttribute('data-nascimentoUsu');
                const celularUsuario = this.getAttribute('data-celularUsu');
                const emailUsuario = this.getAttribute('data-emailUsu');
                const tipoUsuario = this.getAttribute('data-tipoUsu');

                // preenche os campos do form usando a const de acordo com a id da input
                document.getElementById('codigo').value = codigoUsuario;
                document.getElementById('nome').value = nomeUsuario;
                document.getElementById('nascimento').value = nascimentoUsuario;
                document.getElementById('celular').value = celularUsuario;
                document.getElementById('email').value = emailUsuario;
                document.getElementById('tipo').value = tipoUsuario;

            //se data-tipo="brinquedo"
            } else if (tipo === 'brinquedo') { 
                // pega os dados do brinquedo
                const codigoSelo = this.getAttribute('data-codigoselo');
                const codigoCate = this.getAttribute('data-codigocate');
                const nomeBrinquedo = this.getAttribute('data-nomebrinq');
                const precoBrinq = this.getAttribute('data-preco');
                const notaBrinq = this.getAttribute('data-nota');
                const fabriBrinq = this.getAttribute('data-fabri');
                const descBrinq = this.getAttribute('data-desc');
                const faixaBrinq = this.getAttribute('data-faixa');

                // preenche os campos do form usando a const de acordo com a id da input
                document.getElementById('codigoSelo').value = codigoSelo;
                document.getElementById('codigoCate').value = codigoCate;
                document.getElementById('nomeBrinq').value = nomeBrinquedo;
                document.getElementById('precoBrinq').value = precoBrinq;
                document.getElementById('notaBrinq').value = notaBrinq;
                document.getElementById('fabriBrinq').value = fabriBrinq;
                document.getElementById('descBrinq').value = descBrinq;
                document.getElementById('faixaBrinq').value = faixaBrinq;
            }

            // faz o form aparecer
            if (containerFormulario) {
                containerFormulario.style.display = 'flex';
            }
        });
    });

    // fecha quando clicar fora
    if (containerFormulario) {
        containerFormulario.addEventListener('click', function(e) {
            if (e.target === containerFormulario) {
                containerFormulario.style.display = 'none';
            }
        });
    }
});