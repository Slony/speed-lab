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
