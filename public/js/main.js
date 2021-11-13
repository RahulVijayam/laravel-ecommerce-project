/*Jquery*/ 
 
  $( document ).ready(function() {
  new WOW().init();
});
/*Adding Multiple Animations Using Jquery*/
$( ".wow" ).addClass( "fadeInUp" );

/* Jquery Animation When we use scroll down*/
    $(window).scroll(function() {
  $(".slideanim").each(function(){
    var pos = $(this).offset().top;

    var winTop = $(window).scrollTop();
    if (pos < winTop + 600) {
      $(this).addClass("slide");
    }
  });
});




/*Jquery*/