$(document).ready(function() {
  
  $('button').on('click', function() {
    if($(this).hasClass('nav-button')) {
      $('#div-nav').addClass('show');
    } else if($(this).hasClass('exit-menu')) {
      $('#div-nav').removeClass('show');
    } 
    else if($(this).hasClass('to-top')) {
      $('html,body').animate({scrollTop:0}, 'slow');
    }


  })

  $(".to-menu a").click(function(event) {
      event.preventDefault();
      var sectionTop = $('.menu').offset().top;
      $('html,body').animate({
        scrollTop: sectionTop },
        'slow');
      
})



$(".to-who a").click(function(event) {
  event.preventDefault();
  var sectionTop = $('.who').offset().top;
  $('html,body').animate({
    scrollTop: sectionTop },
    'slow');
  
})
$(".to-info a").click(function(event) {
  event.preventDefault();
  var sectionTop = $('.restaurant-info').offset().top;
  $('html,body').animate({
    scrollTop: sectionTop },
    'slow');
  
})


$(".to-faq a").click(function(event) {
  event.preventDefault();
  var sectionTop = $('#faq-h1').offset().top -30;
  $('html,body').animate({
    scrollTop: sectionTop },
    'slow');
  
})
$('.faq li .question').click(function () {
  $(this).find('.plus-minus-toggle').toggleClass('collapsed');
  $(this).parent().toggleClass('active');
});

  AOS.init({      
        duration: 500,
    easing: 'ease',
    once: true,
    disable: function() {
      return document.querySelector(".header-carousel") ? true : false;
    },
    disable: function() {
      return document.querySelector(".cucina-carousel") ? true : false;
    }
  });
   


  
});
document.addEventListener("DOMContentLoaded", function () {
  const images = [
  "assets/gnocchi.webp",
  "assets/pesce.webp",
  "assets/tonno.webp",
   "assets/crema.webp",
    "assets/tiramisu.webp",
    "assets/salaint.jpg",
    "assets/tavolo2.jpg",
    "assets/tavolo3.jpg"



];

images.forEach((src) => {
  const img = new Image();
  img.src = src;
});
  new Swiper(".header-carousel", {
    preventInteractionOnTransition: true, // Evita interferenze con lo scroll

    loop: true,
    autoplay: {
      delay: 3000,
      
    },
    pagination: {
    },
    effect: "fade",
    fadeEffect: {
      crossFade: false,
    },
    on: {
  slideChangeTransitionEnd: function () {
    document.querySelectorAll(".swiper-slide-active").forEach(slide => {
      slide.style.opacity = "1";
    });
  }
},
watchSlidesProgress: true, // Mantiene l’animazione anche fuori dalla viewport
watchSlidesVisibility: true, // Evita il reset delle immagini
    observer: true, // Rileva i cambiamenti nella visibilità
    observeParents: true, // Osserva i cambiamenti anche nei contenitori
    preloadImages: false, // Precarica tutte le immagini
    lazy: false, // Evita che Swiper ricarichi le immagini ogni volta
    passiveListeners: true, // Evita listener non necessari
speed: 600, // Riduci la velocità di transizione
allowTouchMove: false // Blocca swipe manuale se non necessario
  });

  new Swiper(".cucina-carousel", {
    preventInteractionOnTransition: true, // Evita interferenze con lo scroll

    loop: true,
    autoplay: {
      delay: 3000,
      
    },
    pagination: {
     
    },
    effect: "fade",
    fadeEffect: {
      crossFade: true,
    },
  });
});