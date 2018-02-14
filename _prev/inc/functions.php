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


if(isset($_GET['asyncfont'])){
  define('ASYNCFONT','true');
}else{
  define('ASYNCFONT','false');
}


// servPush
if(isset($_GET['serverpush'])){
  define('SERVERPUSH','true');
}else{
  define('SERVERPUSH','false');
}

// URL

if (isset($_SERVER['HTTPS']) &&
($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
$_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
  $protocol = 'https://';
}
else {
  $protocol = 'http://';
}


$url = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

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
  class Mobile_detect {public function isMobile(){}}
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


function optiMarker($getVar){
  $value = (isset($_GET[$getVar])) ? "true" : "false";
  define(strtoupper($getVar),$value);
}

