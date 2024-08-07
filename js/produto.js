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
325: {
  slidesPerView: 2,
  spaceBetween: 30,
},
640: {
slidesPerView: 2.5,
spaceBetween: 30,
},
768: {
slidesPerView: 3,
spaceBetween: 60,
},
1024: {
  slidesPerView: 3.5,
  spaceBetween: 60,
},
1280: {
  slidesPerView: 4.1,
  spaceBetween: 60,
},
},
  });
