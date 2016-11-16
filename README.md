# speed-lab

Fully optimized results :

WPT Tested From: Ireland - EC2 - Chrome - Emulated Motorola G - 3GFast

[![speed-lab-wpt-SI.png](https://s13.postimg.org/stbf06qh3/speed_lab_wpt_SI.png)](https://postimg.org/image/tvlliq9ab/)



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

For lazy loading I use [lazysizes](https://github.com/aFarkas/lazysizes)

### Responsive images with lazy loading


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
