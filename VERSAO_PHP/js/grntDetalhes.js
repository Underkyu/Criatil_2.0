// esse js é de uso comum das páginas de gerente e serve pra exibir informação de acordo com o card em q o botão foi clicado

document.addEventListener("DOMContentLoaded", function() {
    const containerFormulario = document.getElementById('form-container');

    document.querySelectorAll('.detalhes').forEach(botao => {
        botao.addEventListener('click', function() {
            console.log('botão click');
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
                const nomeBrinq = this.getAttribute('data-nomebrinq');
                const precoBrinq = this.getAttribute('data-preco');
                const notaBrinq = this.getAttribute('data-nota');
                const fabriBrinq = this.getAttribute('data-fabri');
                const descBrinq = this.getAttribute('data-desc');
                const faixaBrinq = this.getAttribute('data-faixa');
                const imagem1Brinq = this.getAttribute('data-imagem1');
                const imagem2Brinq = this.getAttribute('data-imagem2');
                const imagem3Brinq = this.getAttribute('data-imagem3');
                const numImagem1Brinq = this.getAttribute('data-numimagem1');
                const numImagem2Brinq = this.getAttribute('data-numimagem2');
                const numImagem3Brinq = this.getAttribute('data-numimagem3');

                // preenche os campos do form usando a const de acordo com a id da input
                document.getElementById('codigoSelo').value = codigoSelo;
                document.getElementById('codigoCate').value = codigoCate;
                document.getElementById('nomeBrinq').value = nomeBrinq;
                document.getElementById('precoBrinq').value = precoBrinq;
                document.getElementById('notaBrinq').value = notaBrinq;
                document.getElementById('fabriBrinq').value = fabriBrinq;
                document.getElementById('descBrinq').value = descBrinq;
                document.getElementById('faixaBrinq').value = faixaBrinq;
                document.getElementById('imagem1').value = imagem1Brinq;
                document.getElementById('imagem2').value = imagem2Brinq;
                document.getElementById('imagem3').value = imagem3Brinq;
                document.getElementById('numImagem1').value = numImagem1Brinq;
                document.getElementById('numImagem2').value = numImagem2Brinq;
                document.getElementById('numImagem3').value = numImagem3Brinq;

                if (typeof updatePreviews === 'function') {
                    updatePreviews();
                    // integração com grntImgPreview.js pra atualizar a img assim que o form abrir
                }
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