function block(){ //Função resposnsavel popr abrir o menu sanduiche
  let el = document.getElementById('menuSanduicheHeader'); //Armazena a div que contem id "menuSanduicheHeader" em uma variavel
  if(el.classList.contains('open_headerHeader')){ //Se a variavel el tiver a classe open_headerHeader
    el.classList.remove('open_headerHeader');
    el.classList.add('menuSanduicheHeader'); 
    console.log("Menu fechou");
  } else{
    el.classList.add('open_headerHeader'); //Adiciona a classe open_headerHeader tornando o menu visivel
    el.classList.remove('menuSanduicheHeader');
    console.log("Menu abriu");
  }
  
  }