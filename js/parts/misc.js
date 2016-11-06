$('#btn-header').click(function(e){
  e.preventDefault();

  $('html, body').animate({
    scrollTop: $(".opti-state").offset().top
  }, 2000);

});



$('#banner-player').magnificPopup({
  type: 'iframe'
});
