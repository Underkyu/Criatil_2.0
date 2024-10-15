function selectPayment(method) {
    var options = document.getElementsByClassName('option');
    for (var i = 0; i < options.length; i++) {
        options[i].classList.remove('selecionada');
    }

    var selectedOption = document.getElementById(method.toLowerCase());
    selectedOption.classList.add('selecionada');

    var paymentText = document.getElementById('pagamentoSelecionado');
    paymentText.textContent = 'Pagamento: ' + method;
}