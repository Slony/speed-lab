# speed-lab

A live version is availabe here : http://speedlab.antoinebrossault.com/

Fully optimized results :

WPT Tested From: Ireland - EC2 - Chrome - Emulated Motorola G - 3GFast

[![speed-lab-wpt-SI.png](https://s13.postimg.org/stbf06qh3/speed_lab_wpt_SI.png)](https://postimg.org/image/tvlliq9ab/)

[![before-after.png](https://s16.postimg.org/se22nrrw5/before_after.png)](https://postimg.org/image/igr1upka9/)



## How to setup the environement

```
npm install
```


## Run Grunt tasks

Default grunt task JS validation / concat / minification with CSS concatenation / minification
```
grunt watch
```


## Extract critical CSS

```
grunt critical-css
```

## Generate a sprite

```
grunt sprite
```


## Lazy loading

For lazy loading I use [lazysizes](https://github.com/aFarkas/lazysizes).
Images can saturate the bandwith with mobile connection. We can load the images (not ATF (Above the fold) images) after the onLoad event or just before the user need them (onScroll)



### Responsive images with lazy loading

Important to not display downscaled images on mobile but the perfect image size for each device size. Further more the code bellow (with [lazysizes Lib](https://github.com/aFarkas/lazysizes)) allow you to use responsive images and lazy loading at the same time.

```html
<img
alt=""
data-sizes="auto"
data-srcset="
css/img/450x400.jpeg 300w,
css/img/450x400.jpeg 400w,
css/img/768x400.jpeg 640w,
css/img/1200x800.jpeg 1000w"
data-src="css/img/1200x800.jpeg"
class="lazyload img-responsive img-center" />
```

Add the ```lazyload```class and prefix and set ```data-sizes```to ```auto```

**We sometime have to load bigger images (superior to the screen width it self) because of the device pixel ratio (DPR)**

Details : If we take as example the code below on a 400x736 px smarthpone with a DPR (device pixel ratio) of 1 the image that will be loaded will be the 450x400.

[![dpr-1.png](https://s22.postimg.org/acgi2z4gh/dpr_1.png)](https://postimg.org/image/sf9ku70b1/)

On the same screen size (400x736) but with a DRP of 2 the image that will be loaded will be the 1200x800

[![drp-2.png](https://s22.postimg.org/mfltqjfip/drp_2.png)](https://postimg.org/image/64lpu830t/)





### Lazy loading for the background images

Include to your page this addon [bgset](https://github.com/aFarkas/lazysizes/tree/gh-pages/plugins/bgset) for [lazysizes](https://github.com/aFarkas/lazysizes)

```html
<div class="bg-video lazyload"  data-bgset="http://lorempicsum.com/simpsons/200/200/1 200w, http://lorempicsum.com/simpsons/300/300/1 300w, http://lorempicsum.com/simpsons/400/300/1 400w, http://lorempicsum.com/simpsons/768/400/1 700w" data-sizes="auto">

</div>
```
CSS example
```css
.bg-video{
  width: 450px;
  height: 250px;
  max-width: 100%;
  display: block;
  margin: auto;
}
```


## RESS (Responsive Web Design with Server-Side Components)

To conditionnaly load some scripts / css...  based on the User-Agent I use [mobile detect](https://github.com/serbanghita/Mobile-Detect)

```php
<?php
require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;

if($detect->isMobile()){
  // do stuff
}else {
  // do stuff
}
```



## HTTP 2

** NB : HTTP2 require https**

In HTTP2 is not a best practice anymore to inline the critical css in the document. Instead use server push.

How to push an asset ?

```php
<?php
  function push_to_browser($as, $uri) {
    header('Link: ' . $uri . '; rel=preload; as=' . $as, false);
  }
  $assets = array(
    // insert here the path   here the file type
    '<css/critical.css>' => 'style'
  );
  array_walk( $assets, 'push_to_browser');
```


How to check if the push is activated ? :

[![server-push.png](https://s18.postimg.org/ho1s77zgp/server_push.png)](https://postimg.org/image/us7cjwrid/)

In the example above the file ```critical.css```located in the folder ```css```is server pushed.


<hr/>
<hr/>


## How to setup modPageSpeed (Apache)


If you’re on a 64-bit version (likely)...
```
wget https://dl-ssl.google.com/dl/linux/direct/mod-pagespeed-stable_current_amd64.deb
```
If you’re on a 32-bit version (less likely)...
```
wget https://dl-ssl.google.com/dl/linux/direct/mod-pagespeed-stable_current_i386.deb
```
```
sudo dpkg -i mod-pagespeed-*.deb
apt-get -f install
```
Remove the downloaded package
```
rm mod-pagespeed-*.deb
```

in your htaccess / virtualhost

```
<IfModule !mod_version.c>
  LoadModule version_module /usr/lib/apache2/modules/mod_version.so
</IfModule>

<IfVersion < 2.4>
  LoadModule pagespeed_module /usr/lib/apache2/modules/mod_pagespeed.so
</IfVersion>
<IfVersion >= 2.4.2>
  LoadModule pagespeed_module /usr/lib/apache2/modules/mod_pagespeed_ap24.so
</IfVersion>
```


# Result in details


## Gzip

If we activate Gzip the Speed Index will not move but the weight of the page will decrease. Gzip works well for text files.

[![Screen Shot 2016-11-11 at 5.28.16 PM.png](https://s14.postimg.org/rnzt3j6ip/Screen_Shot_2016_11_11_at_5_28_16_PM.png)](https://postimg.org/image/qyh0r65z1/)


[![Screen Shot 2016-11-11 at 5.30.27 PM.png](https://s14.postimg.org/548ob75k1/Screen_Shot_2016_11_11_at_5_30_27_PM.png)](https://postimg.org/image/ua9mi16u5/)


## Renderblocking VS non-blocking

This optimization is about putting your critical css direclty in the document. (Only for HTTP 1.1, for HTTP2 use server push instead). **This optimization can decrease your speed index by 50%**

[![Renderblocking VS non-blocking](https://s17.postimg.org/6ku2e04zj/filmstrip_2.png)](https://postimg.org/image/xinzfqpmj/)

The blocking behavior waterfall :
[![Screen Shot 2016-11-11 at 10.26.57 AM.png](https://s11.postimg.org/qg34kbi43/Screen_Shot_2016_11_11_at_10_26_57_AM.png)](https://postimg.org/image/ridb2v0xb/)

The non-blocking behavior waterfall :

[![Screen Shot 2016-11-11 at 10.29.19 AM.png](https://s17.postimg.org/62ec16ntr/Screen_Shot_2016_11_11_at_10_29_19_AM.png)](https://postimg.org/image/o57esejob/)


Huge Speed-index drop !

[![si-drop.png](https://s16.postimg.org/rd1bmadad/si_drop.png)](https://postimg.org/image/63dpbfwzl/)


## SSL VS noSSL

In my tests the SSL certificate add 200ms


Above no-ssl, below with SSL
[![Screen Shot 2016-11-17 at 10.09.52 AM.png](https://s15.postimg.org/irmtsucaj/Screen_Shot_2016_11_17_at_10_09_52_AM.png)](https://postimg.org/image/ugqtgt393/)


Speed Index without ssl : 793
Speed Index with ssl : 982
[![Screen Shot 2016-11-17 at 10.12.02 AM.png](https://s14.postimg.org/pk5ybn8pt/Screen_Shot_2016_11_17_at_10_12_02_AM.png)](https://postimg.org/image/x057xfwf1/)




## modPageSpeed On VS OFF

Tested modPagespeed on the unoptimized version of the project. As the page is built I didn't noticed a speedindex drop. MPS minified the JS / CSS and converted the images in webP format.

Nothing changed in terms on "speed perception"
[![Screen Shot 2016-11-26 at 11.45.37 AM.png](https://s12.postimg.org/8n4z7d5cd/Screen_Shot_2016_11_26_at_11_45_37_AM.png)](https://postimg.org/image/dlshlw955/)

onLoad / fullyLoaded time dropped due to images compression
[![Screen Shot 2016-11-26 at 11.49.08 AM.png](https://s13.postimg.org/n1prrin47/Screen_Shot_2016_11_26_at_11_49_08_AM.png)](https://postimg.org/image/8iimq3tz7/)


There's our drop : images weight -40% thanks to webp
[![Screen Shot 2016-11-26 at 11.51.24 AM.png](https://s13.postimg.org/9x4os0nyf/Screen_Shot_2016_11_26_at_11_51_24_AM.png)](https://postimg.org/image/731jekls3/)
