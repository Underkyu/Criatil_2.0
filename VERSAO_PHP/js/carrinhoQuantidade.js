function alterarQntd(elemento, valor, id) {
    const qntdSpan = elemento.parentElement.querySelector('.quantidade-numero');
    const qntdInput = document.getElementById(id);
    let qntdNovo = parseInt(qntdSpan.textContent);
    
    qntdNovo += valor;

    if (qntdNovo < 1) {
        qntdNovo = 0;
    }

    qntdSpan.textContent = qntdNovo;
    qntdInput.value = qntdNovo;

}

function print(texto){
    alert(texto);
}