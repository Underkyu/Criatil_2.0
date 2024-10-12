function block(){ //Função resposnsavel popr abrir o menu sanduiche
  let el = document.getElementById('menuSanduiche'); //Armazena a div que contem id "menuSanduiche" em uma variavel
  if(el.classList.contains('open_header')){ //Se a variavel el tiver a classe open_header
    el.classList.remove('open_header');
    el.classList.add('menuSanduiche'); 
    console.log("Menu fechou");
  } else{
    el.classList.add('open_header'); //Adiciona a classe open_header tornando o menu visivel
    el.classList.remove('menuSanduiche');
    console.log("Menu abriu");
  }
  
  }
  