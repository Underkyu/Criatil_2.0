function blockConta() { //Função resposnsavel popr abrir o menu sanduiche
  let el = document.getElementById('menuSanduicheConta'); //Armazena a div que contem id "menuSanduicheConta" em uma variavel
  let img = document.getElementById('imagemSanduiche'); // armazena a imagem do botão em uma variável

  if (el.classList.contains('open_header_conta')) { // Se a variavel el tiver a classe open_header_conta
    el.classList.remove('open_header_conta');
    el.classList.add('menuSanduicheConta'); 
    img.classList.remove('girar');
    console.log("Menu fechou");
  } else {
    el.classList.add('open_header_conta'); //Adiciona a classe open_header_conta tornando o menu visivel
    el.classList.remove('menuSanduicheConta');
    img.classList.add('girar'); // adiciona a animação
    console.log("Menu abriu");
  }
}