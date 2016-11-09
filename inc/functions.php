<?php
error_reporting(-1);
ini_set('display_errors', 'On');
// Script Define
if(isset($_GET['script'])){
  ( $_GET['script'] == "footer") ? define('SCRIPT','footer') : "" ;
  ( $_GET['script'] == "header") ? define('SCRIPT','header') : "" ;
}else{
  define('SCRIPT','');
}


// JS Define
if(isset($_GET['js'])){
  ($_GET['js'] == "min") ? define('JS','min') :  define('JS','unmin');
}else{
  define('JS','unmin');
}


// CSS
if(isset($_GET['css'])){
  ($_GET['css'] == "inline") ? define('CSS','inline') :  define('CSS','external');
}else {
  define('CSS','external');
}


// SRCSET
if(isset($_GET['srcset'])){
  define('SRCSET',"true");
}else {
  define("SRCSET","false");
}

// SPRITE
if(isset($_GET['sprite'])){
  define('SPRITE','true');
}else{
  define('SPRITE','false');
}

// Prefectch
if(isset($_GET['dnsprefetch'])){
  define('DNSPREFETCH','true');
}else{
  define('DNSPREFETCH','false');
}


// LAZYLOADING
if(isset($_GET['lazyloading'])){
  define('LAZYLOADING','true');
}else{
  define('LAZYLOADING','false');
}

// IFRAME
if(isset($_GET['noiframe'])){
  define('NOIFRAME','false');
}else{
  define('NOIFRAME','true');
}

// Prefectch
if(isset($_GET['adaptive'])){
  define('ADAPTIVE','true');
  header('Vary: User-Agent');
}else{
  define('ADAPTIVE','false');
}

// HTML MIN
if(isset($_GET['htmlmin'])){
  define('HTMLMIN','true');
}else{
  define('HTMLMIN','false');
}

// URL
$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

// Base URL
$res = explode('?',$url); define ("BASEURL", $res[0]);

if(strpos($url,'?') !== false){
  define ("URL", $url);
}else{
  define ("URL","$url?");
}


/**
*
*	Libs
*
*/

if(ADAPTIVE == "true"){
  require_once 'libs/mobile_detect.php';
  $detect = new Mobile_Detect;
}else{
  class Mobile_detect {
    public function isMobile(){
    }
  }
  $detect = new Mobile_Detect;
}



function sanitize_output($buffer) {

  $search = array(
    '/\>[^\S ]+/s',  // strip whitespaces after tags, except space
    '/[^\S ]+\</s',  // strip whitespaces before tags, except space
    '/(\s)+/s'       // shorten multiple whitespace sequences
  );

  $replace = array(
    '>',
    '<',
    '\\1'
  );

  $buffer = preg_replace($search, $replace, $buffer);

  return $buffer;
}
