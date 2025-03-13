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
    easing: 'ease'
  });
   
})