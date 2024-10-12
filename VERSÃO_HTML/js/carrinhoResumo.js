let botaoResumo = document.getElementById('botao-resumo');
let resumo = document.getElementById('resumo');
let aberto = false;

botaoResumo.addEventListener('click', () => {
    if (!aberto) {
        resumo.classList.add('exibido');
        aberto = true;
    } else {
        resumo.classList.remove('exibido');
        aberto = false;
    }
});