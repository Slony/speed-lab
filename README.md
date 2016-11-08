# speed-lab

Fully optimized results :

WPT Tested From: Ireland - EC2 - Chrome - Emulated Motorola G - 3GFast

[![speed-lab-wpt-SI.png](https://s13.postimg.org/stbf06qh3/speed_lab_wpt_SI.png)](https://postimg.org/image/tvlliq9ab/)



## How to setup the environement


```
npm install grunt --save-dev

npm install grunt-critical --save-dev
npm install grunt-contrib-concat --save-dev
npm install grunt-contrib-watch --save-dev
npm install grunt-contrib-uglify --save-dev
npm install grunt-contrib-jshint --save-dev
npm install grunt-contrib-cssmin --save-dev
npm install grunt-text-replace --save-dev
npm install grunt-spritesmith --save-dev
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
