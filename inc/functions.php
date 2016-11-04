<?php

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
  ( $_GET['sprite'] !== "") ? define('SPRITE','true') : "" ;
}else{
  define('SPRITE','false');
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
