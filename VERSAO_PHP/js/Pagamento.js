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

function flex(){ //Função resposnsavel popr abrir o menu sanduiche
    let el = document.getElementById('cupom'); //Armazena a div que contem id "menuSanduicheHeader" em uma variavel
    if(el.classList.contains('flex')){ //Se a variavel el tiver a classe open_headerHeader
      el.classList.remove('flex');
      el.classList.add('cupom'); 
      console.log("Menu fechou");
    } else{
      el.classList.add('flex'); //Adiciona a classe open_headerHeader tornando o menu visivel
      el.classList.remove('cupom');
      console.log("Menu abriu");
    }
    
    }