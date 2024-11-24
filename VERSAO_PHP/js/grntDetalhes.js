// esse js é de uso comum das páginas de gerente e serve pra exibir informação de acordo com o card em q o botão foi clicado

document.addEventListener("DOMContentLoaded", function() {
    const containerFormulario = document.getElementById('form-container');

    document.querySelectorAll('.detalhes').forEach(botao => {
        botao.addEventListener('click', function() {
            console.log('botão de editar clicado');
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

                const tipoSelect = document.getElementById('tipo');
                tipoSelect.value = tipoUsuario;

            //se data-tipo="brinquedo"
            } else if (tipo === 'brinquedo') { 
                // pega os dados do brinquedo
                const codigoSelo = this.getAttribute('data-codigoselo');
                const codigoCate = this.getAttribute('data-codigocate');
                const codigoBrinq = this.getAttribute('data-codigobrinq');
                const nomeBrinq = this.getAttribute('data-nomebrinq');
                const precoBrinq = this.getAttribute('data-preco');
                const notaBrinq = this.getAttribute('data-nota');
                const fabriBrinq = this.getAttribute('data-fabri');
                const descBrinq = this.getAttribute('data-desc');
                const faixaBrinq = this.getAttribute('data-faixa');
                const statusBrinq = this.getAttribute('data-status');
                const imagem1 = this.getAttribute('data-nimagem1');
                const imagem2 = this.getAttribute('data-nimagem2');
                const imagem3 = this.getAttribute('data-nimagem3');
                const codigoImagem1 = this.getAttribute('data-codigoimagem1');
                const codigoImagem2 = this.getAttribute('data-codigoimagem2');
                const codigoImagem3 = this.getAttribute('data-codigoimagem3');

                // preenche os campos do form usando a const de acordo com a id da input
                document.getElementById('codigoSelo').value = codigoSelo;
                document.getElementById('codigoCate').value = codigoCate;
                document.getElementById('codigoBrinq').value = codigoBrinq;
                document.getElementById('nomeBrinq').value = nomeBrinq;
                document.getElementById('precoBrinq').value = precoBrinq;
                validarNumero(document.getElementById('precoBrinq'));
                document.getElementById('notaBrinq').value = notaBrinq;
                validarNumero(document.getElementById('notaBrinq'));
                document.getElementById('fabriBrinq').value = fabriBrinq;
                document.getElementById('descBrinq').value = descBrinq;
                document.getElementById('faixaBrinq').value = faixaBrinq;
                const statusCheckbox = document.getElementById('Status');
                if (parseInt(statusBrinq) === 1) {
                    statusCheckbox.checked = true;
                } else {
                    statusCheckbox.checked = false;
                }           

                // define o src das imagens de pré-visualização
                if (imagem1) {
                    document.getElementById('Imagem1E').src = "../imagens/Produtos/" + imagem1 + ".jpeg";
                    document.getElementById('Imagem1E').style.display = 'flex';
                }
                
                if (imagem2) {
                    document.getElementById('Imagem2E').src = "../imagens/Produtos/" + imagem2 + ".jpeg";
                    document.getElementById('Imagem2E').style.display = 'flex';
                } else {
                    document.getElementById('Imagem2E').style.display = 'none';
                }
                
                if (imagem3) {
                    document.getElementById('Imagem3E').src = "../imagens/Produtos/" + imagem3 + ".jpeg";
                    document.getElementById('Imagem3E').style.display = 'flex';
                } else {
                    document.getElementById('Imagem3E').style.display = 'none';
                }
                
                document.getElementById('codigoImagem1').value = codigoImagem1;
                document.getElementById('codigoImagem2').value = codigoImagem2;
                document.getElementById('codigoImagem3').value = codigoImagem3;

            //se data-tipo="avaliacao"
            }else if (tipo === 'avaliacao') { 
                const codigoAva = this.getAttribute('data-codigo');
                
                if (confirm('Tem certeza que deseja deletar esta avaliação?')) {
                    fetch('../controller/deletarAvaliacao.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: 'codigo=' + codigoAva
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            this.closest('.avaliacao').remove();
                        } else {
                            alert('Erro ao deletar avaliação: ' + data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Erro:', error);
                        alert('Ocorreu um erro ao deletar a avaliação.');
                    });
                }
                return; // Evita que o formulário seja exibido para avaliações
            }


            // faz o form aparecer (brinquedos)
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