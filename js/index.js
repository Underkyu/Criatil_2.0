//Iniciando carrossel
var swiper = new Swiper(".carrossel", {
    pagination: {
      el: ".swiper-pagination",
    },
    effect: "fade",
    autoplay: {
        delay: 2500,
        disableOnInteraction: false
    },
    lazyLoading: true,
    loop: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      }
  });

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
  slidesPerView: 3.2,
  spaceBetween: 60,
},
1536: {
  slidesPerView: 4.1,
  spaceBetween: 60,
},
},
  });




  //Iniciando product slider

  var swiper3 = new Swiper(".product2", {
    slidesPerView: 3,
    loop : true,
    spaceBetween: 30,
    navigation: {
      nextEl: ".next-product2",
      prevEl: ".prev-product2",
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
  slidesPerView: 3.2,
  spaceBetween: 60,
},
1536: {
  slidesPerView: 4.1,
  spaceBetween: 60,
},
},
  });
