function alterarQntd(elemento, valor) {
    const qntdSpan = elemento.parentElement.querySelector('.quantidade-numero');
    let qntdNovo = parseInt(qntdSpan.textContent);
    
    qntdNovo += valor;

    if (qntdNovo < 1) {
        qntdNovo = 0;
    }

    qntdSpan.textContent = qntdNovo;
}