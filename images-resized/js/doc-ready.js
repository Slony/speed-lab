/*jshint sub:true*/
jQuery(function($){
  /**
  *
  * Transforme une date au format 20193012
  * (pour le 30 decembre 2019) en string -> "30/12/2019"
  *
  */
  function formateDate(dateSTRING){
    var year = dateSTRING.slice(0,4);
    var month = dateSTRING.slice(4,6);
    var day = dateSTRING.slice(6,8);
    var dateComplete = day+'/'+month+'/'+year;
    return dateComplete;
  }
  /**
  *
  *  Retourne la date du Jour
  *  au format 20193012 (année mois jours)
  *
  */
  function abGetDate(){
    var today = new Date();
    var dd = today.getDate();
    if(dd < 10) dd = "0"+dd;
    var mm = today.getMonth()+1; //January is 0!
    if(mm < 10) mm = "0"+mm;
    var yyyy = today.getFullYear();
    dd = dd.toString();
    mm = mm.toString();
    yyyy = yyyy.toString();
    return parseInt(yyyy+mm+dd);
  }
  /**
  *
  *  Remplace une date
  *
  */
  function formateDateVirgule(dateSTRING){
    var year = dateSTRING.slice(0,4);
    var month = dateSTRING.slice(4,6);
    var day = dateSTRING.slice(6,8);
    var dateComplete = year+','+month+','+day;
    return dateComplete;
  }
  /**
  * [Retourne l'index d'un objet à partir d'une clé / valeur]
  * @param  {[object]} data [l'objet dans lequel on cherche]
  * @param  {[string]} property [la Clé que l'on cherche]
  * @param  {[type]} value [la valeur de la clé cherché]
  * @return {[int]} [Retourne l'index de l'objet]
  */
  function findIndexInData(data, property, value) {
    for(var i = 0, l = data.length ; i < l ; i++) {
      if(data[i][property] === value) {
        return i;
      }
    }
    return -1;
  }
  /**
  *
  *  Met la variable isSafari à true si le navigateur est Safari
  *
  */
  var isSafari = false;
  if (navigator.userAgent.indexOf('Safari') != -1 && navigator.userAgent.indexOf('Chrome') == -1) {
    isSafari = true;
  }
  /**
  *
  *  Fixe une hauteur à un % de la fenêtre
  *  Et evite le sautillement sur mobile (retraction barre url)
  *  http://stackoverflow.com/questions/24944925/background-image-jumps-when-address-bar-hides-ios-android-mobile-chrome
  *
  *
  *  Exemple :
  *
  *  <div class="u-wjs" data-height="90"></div>
  *
  *  Cette div aura une hauteur de 90% de la fenêtre
  *
  */
  function abJsHeight(){
    $('.u-wjs').each(function(){
      var elementHeight = ($(this).data('height'))/100;
      var windowHeight = $(window).height();
      $(this).css('height',(windowHeight*elementHeight)+'px');
    });
  }
  abJsHeight();
  $(window).resize(function(){
    abJsHeight();
  });
  $('#btn-header').click(function(e){
    e.preventDefault();
    $('html, body').animate({
      scrollTop: $(".opti-state").offset().top
    }, 2000);
  });
  $('#banner-player').magnificPopup({
    type: 'iframe'
  });
  // Formulaire Contact
  $('#contact-form-btn').on('click',function(e){
    e.preventDefault();
    var prenom = $( ".contact-form input[name='prenom']" ).val();
    var nom = $( ".contact-form input[name*='nom']" ).val();
    var email = $( ".contact-form input[name*='email']" ).val();
    var sujet = $( ".contact-form input[name='sujet']" ).val();
    //var telephone = $( ".contact-form input[name*='telephone']" ).val();
    var message = $( ".contact-form textarea[name*='message']" ).val();
    //return false;
    var $this = $(this);
    $.ajax({
      type: "POST",
      url: ajaxurl,
      async: true,
      timeout:5000,
      dataType: 'json', // JSON
      data:{
        action: 'form_contact',
        nom: nom,
        prenom: prenom,
        sujet: sujet,
        //telephone: telephone,
        email: email,
        message: message
      },
      success: function(data){
        //this.afterAjaxCall();
        console.log(data);
        $('.erreur').remove();
        if(!data.erreur){
          // On vide les inputs
          $('.contact-form input, textarea').each(function(){
            $(this).val('');
          });
          // Message de succès
          $( ".contact-form").after(data.successMessage);
          // Evenement GA
          //ga('send', 'event', 'lead', 'contact');
        }else{
          if(data.erreurEmail) $( ".contact-form input[name*='email']" ).after(data.erreurEmail);
          if(data.erreurNom) $( ".contact-form input[name='nom']" ).after(data.erreurNom);
          if(data.erreurPrenom) $( ".contact-form input[name='prenom']" ).after(data.erreurPrenom);
          //if(data.erreurTelephone) $( ".contact-form input[name*='telephone']" ).after(data.erreurTelephone);
          if(data.erreurSujet) $( ".contact-form input[name='sujet']" ).after(data.erreurSujet);
          if(data.erreurMessage) $( ".contact-form textarea[name*='message']" ).after(data.erreurMessage);
        }
      },
      error : function(request, errorType, errorMessage){
        console.log(request);
        console.log(errorType);
        console.log(errorMessage);
      },
      beforeSend: function(){
        //alert('Avant la requête AJAX');
        $('#contact-form').after("<i id='ajax-loader' class='fa fa-refresh fa-spin fa-2x ajax-loader'></i>");
      },
      complete:function(){
        $('#ajax-loader').remove();
      }
    });
  });
  // fin formulaire de contact
  /**
  *
  *  Gère le menu responsive
  *
  */
  $('#responsive-icon').on('click',function(){
    $(this).addClass('hidden');
    $('#responsive-icon-close').removeClass('hidden');
    $('.slide-menu nav').addClass('responsive-menu-show');
  });
  $('#responsive-icon-close').on('click',function(){
    $(this).addClass('hidden');
    $('#responsive-icon').removeClass('hidden');
    $('.slide-menu nav').removeClass('responsive-menu-show');
  });
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
  $('#home-slider').owlCarousel({
    autoplay:true,
    autoplayTimeout:8000,
    autoplayHoverPause:true,
    items:1,
    loop:true
  });
}); // document ready
