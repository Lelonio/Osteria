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

$(".to-exclusive a").click(function(event) {
  event.preventDefault();
  var sectionTop = $('#btnMenu').offset().top + 15;
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
$(".to-prenotazione a").click(function(event) {
  event.preventDefault();
  var sectionTop = $('.prenotazione').offset().top;
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

$('.experience li .experience-btn').click(function (event) {
  event.preventDefault();
  $(this).parent().toggleClass('active');
  var sectionTop = $('.exclusive-menu').offset().top ;
  $('html,body').animate({
    scrollTop: sectionTop },
    'slow');
});


$('#prenota').click(function (e) {

  e.preventDefault();
  if ($('#prenota-checkbox').is(':checked')) { 
  Swal.fire({
    title: 'Confermare Prenotazione?',
    text: "Se non sei sicuro, controlla i dati",
    icon: 'question',
    showCancelButton: true,
    confirmButtonColor: '#be6440',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Prenota',
    cancelButtonText: 'Annulla',
    showLoaderOnConfirm: true,
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: 'POST', 
        url: 'checkPrenotazione.php', 
        data: $('#prenotaForm').serialize(), 
        success: function (response) {
          $("#result").append(response); 
        }
      });
    }
  })
}

else{
  Swal.fire({
    title:'Il consenso è importante',
    text:'Per prenotare devi prima accettare la policy sui dati personali',
    icon:'error',
    confirmButtonColor: '#be6440'
})
}



});

$('#prenota-experience').click(function (e) {

  e.preventDefault(); 

  if ($('#experience-checkbox').is(':checked')) { 
  Swal.fire({
    title: 'Confermare Experience?',
    text: "Se non sei sicuro, controlla i dati",
    icon: 'question',
    showCancelButton: true,
    confirmButtonColor: '#be6440',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Regala',
    cancelButtonText: 'Annulla',
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: 'POST', 
        url: 'checkExperience.php', 
        data: $('#experienceForm').serialize(), 
        success: function (response) {
          $("#result").append(response); 
        }
      });
    }
  })
  }  

  else{

    Swal.fire({
      title:'Il consenso è importante',
      text:'Per prenotare devi prima accettare la policy sui dati personali',
      icon:'error',
      confirmButtonColor: '#be6440',
  })

  }

});


  AOS.init({      
        duration: 1000,
    easing: 'ease'
  });
   
})