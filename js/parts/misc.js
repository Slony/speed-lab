$('#btn-header').click(function(e){
  e.preventDefault();

  $('html, body').animate({
    scrollTop: $(".opti-state").offset().top
  }, 2000);

});
