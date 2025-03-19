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
  });

  $(".to-menu a").click(function(event) {
      event.preventDefault();
      var sectionTop = $('.menu').offset().top;
      $('#div-nav').removeClass('show'); // Chiude il menu dopo lo scroll
      $('html,body').animate({scrollTop: sectionTop }, 'slow', function() {
         
      });
  });

  $(".to-who a").click(function(event) {
      event.preventDefault();
      var sectionTop = $('.who').offset().top;
      $('#div-nav').removeClass('show');

      $('html,body').animate({scrollTop: sectionTop }, 'slow', function() {
      });
  });

  $(".to-info a").click(function(event) {
      event.preventDefault();
      var sectionTop = $('.restaurant-info').offset().top;
      $('#div-nav').removeClass('show');

      $('html,body').animate({scrollTop: sectionTop }, 'slow', function() {
      });
  });

  $(".to-faq a").click(function(event) {
      event.preventDefault();
      var sectionTop = $('#faq-h1').offset().top -30;
      $('#div-nav').removeClass('show');

      $('html,body').animate({scrollTop: sectionTop }, 'slow', function() {
      });
  });

  $('.faq li .question').click(function () {
      $(this).find('.plus-minus-toggle').toggleClass('collapsed');
      $(this).parent().toggleClass('active');
  });


});
