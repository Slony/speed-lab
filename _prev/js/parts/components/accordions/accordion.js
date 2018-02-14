$('.faq-question').click(function(){
  console.log($(this).closest('.faq'));
  $(this).find('img').toggleClass('up');
  $(this).closest('.faq').find('.faq-awnser').slideToggle();
});


if(window.location.href.indexOf("questions/#") > -1) {

  var hash = window.location.href.split('#');
  var hasho = '#'+hash[1];
  $(hasho).find('.faq-show-more').trigger('click');
  $('html, body').animate({
    scrollTop: $(hasho).offset().top-60
  }, 800, function(){


    // Add hash (#) to URL when done scrolling (default click behavior)

  });
}
