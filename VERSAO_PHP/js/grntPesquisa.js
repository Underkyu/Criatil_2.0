// javascript das inputs de pesquisa do gerente; pesquisa por nome e por ID

document.addEventListener("DOMContentLoaded", function() {
    const pesquisaInput = document.getElementById('txtPesquisa');
    const containerBrinquedos = document.getElementById('brinquedos-container');
    const brinquedos = Array.from(containerBrinquedos.getElementsByClassName('brinquedo')); // converte as divs com a classe brinquedo pra vetor

    pesquisaInput.addEventListener('input', function() {
        const termoPesquisa = pesquisaInput.value.toLowerCase();

        // pra cada brinquedo (caixa brinquedo)
        brinquedos.forEach(brinquedo => { 
            const nomeBrinquedo = brinquedo.querySelector('.informacao:nth-of-type(1)').textContent.toLowerCase(); // pega o primeiro elemento com a classe "informacao"
            const idBrinquedo = brinquedo.querySelector('.informacao:nth-of-type(2)').textContent.toLowerCase(); // pega o segundo elemento com a classe "informacao"
            
            //  se oq o usuário digitar for equivalente ao nome ou id do brinquedo no vetor
            if (nomeBrinquedo.includes(termoPesquisa) || idBrinquedo.includes(termoPesquisa)) {
                brinquedo.style.display = '';
            } else {
                brinquedo.style.display = 'none';
            }  // esse if usa a propriedade display pra fzr ser exibido ou não. '' faz com q o display do que foi encontrado 
               // fique padrão (exibido), 'none' faz com q o resto fique oculto
        });
    });
});