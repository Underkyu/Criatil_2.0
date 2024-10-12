const myInput = document.getElementById("my-input");
function stepper(btn){
    let id = btn.getAttribute("id");
    let min = myInput.getAttribute("min");
    let max = myInput.getAttribute("max");
    let step = myInput.getAttribute("step");
    let val = myInput.getAttribute("value");
    let calcStep = (id == "increment") ? (step*1) : (step * -1);
    let newValue = parseInt(val) + calcStep;

    if(newValue >= min && newValue <= max){
        myInput.setAttribute("value", newValue);
    }
}



  //Iniciando product slider

  var swiper2 = new Swiper(".product", {
    slidesPerView: 3,
    loop : true,
    spaceBetween: 30,
    navigation: {
      nextEl: ".next-product",
      prevEl: ".prev-product",
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
0: {
    slidesPerView: 1.2,
    spaceBetween: 30,
},    
475: {
  slidesPerView: 1.5,
  spaceBetween: 30,
},
640: {
slidesPerView: 2.1,
spaceBetween: 30,
},
768: {
slidesPerView: 2.2,
spaceBetween: 60,
},
1024: {
  slidesPerView: 2.4,
  spaceBetween: 60,
},
1280: {
  slidesPerView: 3.2,
  spaceBetween: 60,
},
1536: {
  slidesPerView: 4,
  spaceBetween: 60,
},
},
  });


  function mudarImagem(url, um, dois, tres){
    document.getElementById('imagem_maior').src=url;
    document.getElementById('um').style.display = um;
    document.getElementById('dois').style.display = dois;
    document.getElementById('tres').style.display = tres;
  }


  //Iniciando carrossel
var swiper = new Swiper(".carrossel", {
  slidesPerView: 0.9,
  pagination: {
    el: ".swiper-pagination",
  },
  lazyLoading: true,
  loop: true,
});