document.addEventListener("DOMContentLoaded", function() {
    
// pesquisa por nome e ID de brinquedo
const pesquisaInputBrinquedos = document.getElementById('txtPesquisa');
if (pesquisaInputBrinquedos) {
    const containerBrinquedos = document.getElementById('brinquedos-container');
    const brinquedos = Array.from(containerBrinquedos.getElementsByClassName('brinquedo')); // converte as divs com a classe brinquedo para array

     pesquisaInputBrinquedos.addEventListener('input', function() {
        const termoPesquisa = pesquisaInputBrinquedos.value.toLowerCase();
            
        brinquedos.forEach(brinquedo => {
            const nomeBrinquedo = brinquedo.querySelector('.informacao:nth-of-type(1)').textContent.toLowerCase(); // pega o primeiro elemento com a classe "informacao"
            const idBrinquedo = brinquedo.querySelector('.informacao:nth-of-type(2)').textContent.toLowerCase(); // pega o segundo elemento com a classe "informacao"
                
                // se o que o usuário digitar for equivalente ao nome ou id do brinquedo no array
                if (nomeBrinquedo.includes(termoPesquisa) || idBrinquedo.includes(termoPesquisa)) {
                    brinquedo.style.display = '';
                }else {
                    brinquedo.style.display = 'none';
                }
            });
        });
    }

// pesquisa por nome de user, título da avaliação ou comentário da avaliação
const pesquisaInputAvaliacoes = document.getElementById('txtPesquisa');
if (pesquisaInputAvaliacoes) {
    const containerAvaliacoes = document.getElementById('avaliacoes-container');
    const avaliacoes = Array.from(containerAvaliacoes.getElementsByClassName('avaliacao')); // converte as divs com a classe avaliacao pra vetor

        pesquisaInputAvaliacoes.addEventListener('input', function() {
        const termoPesquisa = pesquisaInputAvaliacoes.value.toLowerCase();
            
            avaliacoes.forEach(avaliacao => {
            const nomeUsuario = avaliacao.querySelector('.nome').textContent.toLowerCase(); // pega o nome do usuário
            const tituloAvaliacao = avaliacao.querySelector('.titulo_avaliacao').textContent.toLowerCase(); // pega o título da avaliação
            const comentarioAvaliacao = avaliacao.querySelector('.texto_avaliacao').textContent.toLowerCase(); // pega o comentario
                
                // se o que o usuário digitar for equivalente a um desses no vetor 
                if (nomeUsuario.includes(termoPesquisa) || tituloAvaliacao.includes(termoPesquisa) || comentarioAvaliacao.includes(termoPesquisa)) {
                    avaliacao.style.display = '';
                }else {
                    avaliacao.style.display = 'none';
                }
            });
        });
    };

// pesquisa por nome, ID ou tipo de usuário
const pesquisaInputClientes = document.getElementById('txtPesquisa');
if (pesquisaInputClientes) {
    const containerClientes = document.getElementById('brinquedos-container');
    const clientes = Array.from(containerClientes.getElementsByClassName('brinquedo'));

        pesquisaInputClientes.addEventListener('input', function() {
            const termoPesquisa = pesquisaInputClientes.value.toLowerCase();
            
            clientes.forEach(cliente => {
            const nomeCliente = cliente.querySelector('.informacao:nth-of-type(1)').textContent.toLowerCase(); // nome
            const idCliente = cliente.querySelector('.informacao:nth-of-type(2)').textContent.toLowerCase();  // id
             const tipoCliente = cliente.querySelector('.informacao:nth-of-type(3)').textContent.toLowerCase(); // tipo
                
            if (nomeCliente.includes(termoPesquisa) || 
                    idCliente.includes(termoPesquisa) || 
                    tipoCliente.includes(termoPesquisa)) {
                    cliente.style.display = '';
            }else {
                    cliente.style.display = 'none';
                }
            });
        });
    }
});