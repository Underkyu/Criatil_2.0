let forma = document.getElementById('forma'); //forma de pagamento

function selectPayment(method) {
    let options = document.getElementsByClassName('option');
    for (var i = 0; i < options.length; i++) {
        options[i].classList.remove('selecionada');
    }

    let selectedOption = document.getElementById(method.toLowerCase());
    selectedOption.classList.add('selecionada');

    let paymentText = document.getElementById('pagamentoSelecionado');
    paymentText.textContent = 'Pagamento: ' + method;
}

function mudarForma(formaPagamento){
    let forma = document.getElementById('forma'); //forma de pagamento
    forma.value = formaPagamento;
}