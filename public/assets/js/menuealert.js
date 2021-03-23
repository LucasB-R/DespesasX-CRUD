 $(document).ready(function(){

    $('.menu-T').click(function(){
    	   $('.menu-T').toggleClass('active')
    $('nav').toggleClass('active')
    })


    $("#alert").fadeTo(2000, 4000).slideUp(500, function() {
      $("#alert").slideUp(500);
          });

          
    $("#alert2").fadeTo(15000, 15000).slideUp(500, function() {
      $("#alert2").slideUp(500);
          });
  });