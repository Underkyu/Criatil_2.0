function block() { //Função resposnsavel popr abrir o menu sanduiche
  let el = document.getElementById('menuSanduiche'); //Armazena a div que contem id "menuSanduiche" em uma variavel
  let img = document.getElementById('imagemSanduiche'); // armazena a imagem do botão em uma variável

  if (el.classList.contains('open_header')) { // Se a variavel el tiver a classe open_header
    el.classList.remove('open_header');
    el.classList.add('menuSanduiche'); 
    img.classList.remove('girar');
    console.log("Menu fechou");
  } else {
    el.classList.add('open_header'); //Adiciona a classe open_header tornando o menu visivel
    el.classList.remove('menuSanduiche');
    img.classList.add('girar'); // adiciona a animação
    console.log("Menu abriu");
  }
}