# Хакатон в прямом эфире: ускоряем мобильные сайты

* [Настройка сервера](#Настройка-сервера)
* [Сборка сайта](#Сборка-сайта)
  + [Исходная неоптимизированная страница](#Исходная-неоптимизированная-страница)
  + [Скрипты в конце страницы](#Скрипты-в-конце-страницы)
  + [Все скрипты в одном минифицированном файле](#Все-скрипты-в-одном-минифицированном-файле)
  + [Изображения разных размеров для разных устройств](#Изображения-разных-размеров-для-разных-устройств)
  + [Ленивая загрузка изображений](#Ленивая-загрузка-изображений)
  + [Атлас спрайтов вместо маленьких изображений](#Атлас-спрайтов-вместо-маленьких-изображений)
  + [Стили для верхней части страницы в HTML-коде](#Стили-для-верхней-части-страницы-в-html-коде)
  + [Упреждающие DNS-запросы для сторонних ресурсов](#Упреждающие-dns-запросы-для-сторонних-ресурсов)
  + [Мобильная версия без слайдера для больших экранов](#Мобильная-версия-без-слайдера-для-больших-экранов)
  + [Ленивая загрузка видео с YouTube](#Ленивая-загрузка-видео-с-youtube)
  + [Минифицированный HTML-код](#Минифицированный-html-код)
* [Переход на HTTPS](#Переход-на-https)
* [Переход на HTTP/2](#Переход-на-http-2)


## Настройка сервера

___
__ВНИМАНИЕ!__ Всё описанное ниже было выполнено на виртуальном сервере с операционной системой `Ubuntu 16.04.3 LTS`.
___

Добавляем PPA для nodejs:

```bash
\curl -sL https://deb.nodesource.com/setup_8.x | sudo bash
```

Обновляем информацию об источниках пакетов:

```bash
sudo apt-get update
```

Устанавливаем Apache, PHP, nodejs, Ruby, imagemagick, git и пакеты, необходимые для компиляции:

```bash
sudo apt-get install apache2 php nodejs libapache2-mod-php \
  ruby imagemagick git libffi-dev build-essential ruby-dev
```

Ставим compass для сборки CSS из SCSS:

```bash
sudo gem update --system && sudo gem install compass
```

Клонируем репозиторий:

```bash
git clone https://github.com/Slony/speed-lab.git
```

Создаем файл виртуального хоста для Apache:

```bash
sudo tee -a /etc/apache2/sites-available/speed-lab.conf >/dev/null <<EOF
<VirtualHost *:80>
  ServerName speed-lab.anticor.pro
  ServerAlias localhost
  ServerAdmin webmaster@localhost
  DocumentRoot $HOME/speed-lab
  <Directory $HOME/speed-lab>
    Options +FollowSymLinks +ExecCGI +Includes
    Require all granted
  </Directory>
  ErrorLog ${APACHE_LOG_DIR}/error.log
  CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
EOF
```

___
__ВНИМАНИЕ!__ Если будете использовать этот скрипт, пожалуйста, не забудьте заменить домен `speed-lab.anticor.pro` в директиве `ServerName` на ваш домен.

Для простоты изложения далее по тексту везде будет использоваться домен `speed-lab.anticor.pro`.
___

Включаем виртуальный хост:

```bash
sudo a2ensite speed-lab.conf
```

Просим Apache обновить конфигурацию:

```bash
sudo service apache2 reload
```

Проверяем сайт по внешнему адресу: [http://speed-lab.anticor.pro/](http://speed-lab.anticor.pro/)


## Сборка сайта


### Исходная неоптимизированная страница

Переходим в директорию `original` с изначальной версией страницы:

```bash
cd speed-lab/original
```

Ставим npm-пакеты:

```bash
npm install
```

Собираем стили:

```bash
node_modules/grunt/bin/grunt compass
```

Проверяем: [http://speed-lab.anticor.pro/](http://speed-lab.anticor.pro/)


### Скрипты в конце страницы

Переходим в директорию `scripts-in-footer`:

```bash
cd ../scripts-in-footer
```

Ставим npm-пакеты:

```bash
npm install
```

Собираем стили:

```bash
node_modules/grunt/bin/grunt compass
```

Проверяем: [http://speed-lab.anticor.pro/scripts-in-footer/](http://speed-lab.anticor.pro/scripts-in-footer/)


### Все скрипты в одном минифицированном файле

Переходим в директорию `scripts-minified`:

```bash
cd ../scripts-minified
```

Ставим npm-пакеты:

```bash
npm install
```

Собираем стили:

```bash
node_modules/grunt/bin/grunt compass
```

Собираем скрипты в один файл:

```bash
node_modules/grunt/bin/grunt concat
```

Минифицируем файл со скриптами:

```bash
node_modules/grunt/bin/grunt uglify
```

Проверяем: [http://speed-lab.anticor.pro/scripts-minified/](http://speed-lab.anticor.pro/scripts-minified/)


### Изображения разных размеров для разных устройств

Переходим в директорию `images-resized`:

```bash
cd ../images-resized
```

Ставим npm-пакеты:

```bash
npm install
```

Собираем стили:

```bash
node_modules/grunt/bin/grunt compass
```

Генерируем уменьшенные изображения разного размера:

```bash
node_modules/grunt/bin/grunt responsive_images
```

Проверяем: [http://speed-lab.anticor.pro/images-resized/](http://speed-lab.anticor.pro/images-resized/)


### Ленивая загрузка изображений

Переходим в директорию `images-lazy`:

```bash
cd ../images-lazy
```

Ставим npm-пакеты:

```bash
npm install
```

Собираем стили:

```bash
node_modules/grunt/bin/grunt compass
```

Проверяем: [http://speed-lab.anticor.pro/images-lazy/](http://speed-lab.anticor.pro/images-lazy/)


### Атлас спрайтов вместо маленьких изображений

Переходим в директорию `images-sprite`:

```bash
cd ../images-sprite
```

Ставим npm-пакеты:

```bash
npm install
```

Собираем стили:

```bash
node_modules/grunt/bin/grunt compass
```

Генерируем атлас спрайтов и отдельную таблицу стилей для него:

```bash
node_modules/grunt/bin/grunt sprite
```

Проверяем: [http://speed-lab.anticor.pro/images-sprite/](http://speed-lab.anticor.pro/images-sprite/)


### Стили для верхней части страницы в HTML-коде

Переходим в директорию `styles-inline`:

```bash
cd ../styles-inline
```

Ставим npm-пакеты:

```bash
npm install
```

Собираем стили:

```bash
node_modules/grunt/bin/grunt compass
```

Генерируем таблицу стилей, необходимую для отрисовки верхней части страницы, которую пользователь видит сразу, до прокрутки:

```bash
node_modules/grunt/bin/grunt critical-css
```

В `index.php` «критические» стили вставляются директивой `include()`:

```php
<style><?php include("css/critical.css");?></style>
```

Проверяем: [http://speed-lab.anticor.pro/images-sprite/](http://speed-lab.anticor.pro/images-sprite/)


### Упреждающие DNS-запросы для сторонних ресурсов

Переходим в директорию `prefetch`:

```bash
cd ../prefetch
```

Ставим npm-пакеты:

```bash
npm install
```

Собираем стили:

```bash
node_modules/grunt/bin/grunt compass
```

В HTML-коде упреждающие DNS-запросы вставляются тэгом `<link>':

```html
<link rel="dns-prefetch" href="//www.youtube.com">
<link rel="dns-prefetch" href="//i.ytimg.com">
```

Проверяем: [http://speed-lab.anticor.pro/prefetch/](http://speed-lab.anticor.pro/prefetch/)


### Мобильная версия без слайдера для больших экранов

Переходим в директорию `slider-desktop`:

```bash
cd ../slider-desktop
```

Ставим npm-пакеты:

```bash
npm install
```

Собираем стили:

```bash
node_modules/grunt/bin/grunt compass
```

В `index.php` используем класс `Mobile_Detect` для определения пользовательской платформы на стороне сервера:

```php
<?php
  require_once 'mobile_detect.php';
  $detect = new Mobile_Detect;
?>
```
```php
    <?php if (!$detect->isMobile()): ?>
      <link rel="stylesheet" type="text/css" href="css/owl.css">
    <?php endif; ?>
```
```php
    <?php if (!$detect->isMobile()): ?>
      <script type="text/javascript" src="js/libs/owl.js"></script>
    <?php endif; ?>
```
```php
      <?php if (!$detect->isMobile()): ?>
        <h2 class="hidden-mobile">This slider is only displayed on Desktop</h2>
        <div id="home-slider" class="owl-carousel owl-theme hidden-mobile">
          <div class="item"><img src="img/home/slider/3.jpeg" alt="The Last of us"></div>
          <div class="item"><img src="img/home/slider/4.jpeg" alt="GTA V"></div>
          <div class="item"><img src="img/home/slider/5.jpeg" alt="Mirror Edge"></div>
        </div>
        <hr class="hr--50 u-mtm u-mbm hidden-mobile" />
      <?php endif; ?>
```

Проверяем: [http://speed-lab.anticor.pro/slider-desktop/](http://speed-lab.anticor.pro/slider-desktop/)


### Ленивая загрузка видео с YouTube

Переходим в директорию `youtube-lazy`:

```bash
cd ../youtube-lazy
```

Ставим npm-пакеты:

```bash
npm install
```

Собираем стили:

```bash
node_modules/grunt/bin/grunt compass
```

В `index.php` подключены скрипты для ленивой загрузки адаптивного фонового изображения:

```html
<script type="text/javascript" src="js/libs/ls.bgset.min.js"></script>
<script type="text/javascript" src="js/libs/lazysizes.js"></script>
```

… и для показа видео-плеера по клику или касанию:

```html
<script type="text/javascript" src="js/libs/magnific-popup.js"></script>
```

В `js/doc-ready.js` добавлен скрипт, привязывающий показ видео-плеера к элементу в идентификатором `banner-player`:

```js
$('#banner-player').magnificPopup({
  type: 'iframe'
});
```

В `index.php` видео вставлено в виде блочного элемента с классом `lazyload` и ссылкой с идентификатором `banner-player`:

```html
<div class="bg-video lazyload" data-bgset="img/home/video-bg/200x200-1.jpeg 200w, img/home/video-bg/300x300-1.jpeg 300w, img/home/video-bg/400x300-1.jpeg 400w, img/home/video-bg/768x400-1.jpeg 700w" data-sizes="auto">
  <a id="banner-player" href="https://www.youtube.com/watch?v=I4vX-twze9I">
    <img class="player-btn lazyload"  data-src="img/home-banner-promo-player.png">
  </a>
</div>
```

Проверяем: [http://speed-lab.anticor.pro/youtube-lazy/](http://speed-lab.anticor.pro/youtube-lazy/)


### Минифицированный HTML-код

Переходим в директорию `html-minified`:

```bash
cd ../html-minified
```

Ставим npm-пакеты:

```bash
npm install
```

Собираем стили:

```bash
node_modules/grunt/bin/grunt compass
```

В самом начале `index.php` включаем буферизацию потока вывода с фильтрацией через функцию `sanitize_output()`, которая удаляет лишние пробельные символы из HTML-кода:

```php
<?php
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
  ob_start("sanitize_output");
?><!DOCTYPE html>
```

В самом конце `index.php` выводим содержимое отфильтрованного буфера:

```php
</html>
<?php ob_end_flush(); ?>
```


## Переход на HTTPS

Для перехода на HTTPS получаем SSL-сертификат с помощью сервиса [Let’s Encrypt](https://letsencrypt.org/) и включаем HTTPS в веб-сервере Apache (подробнее читайте в статье [How to Properly Enable HTTPS on Apache with Let’s Encrypt on Ubuntu 16.04/17.10](https://www.linuxbabe.com/ubuntu/https-apache-letsencrypt-ubuntu16-04-17-10)).

Ставим пакеты [Let’s Encrypt](https://letsencrypt.org/):

```bash
sudo apt-get install letsencrypt python-letsencrypt-apache software-properties-common
```

Добавляем источник пакетов для [certbot](https://certbot.eff.org/#ubuntuxenial-apache) и ставим его:

```bash
sudo add-apt-repository ppa:certbot/certbot
sudo apt-get update
sudo apt install certbot python-certbot-apache
```

Запускаем certbot, чтобы он получил SSL-сертификат и настроил Apache:

```bash
sudo certbot --apache --agree-tos --redirect --uir --hsts \
  --staple-ocsp --must-staple -d speed-lab.anticor.pro \
  --email example@example.com
```

___
__ВНИМАНИЕ!__ Если будете копировать и запускать приведенную выше команду, пожалуйста,
не забудьте заменить `speed-lab.anticor.pro` на ваш домен и `example@example.com` на ваш адрес электронной почты.
___

Проверяем наш новый сертификат: [https://www.ssllabs.com/ssltest/analyze.html?d=speed-lab.anticor.pro](https://www.ssllabs.com/ssltest/analyze.html?d=speed-lab.anticor.pro).

___
__ВНИМАНИЕ!__ Если будете использовать для проверки SSL-сертификата приведенный выше адрес, пожалуйста,
не забудьте заменить `speed-lab.anticor.pro` на ваш домен.
___


## Переход на HTTP/2

* [How to Enable HTTP/2 Protocol with Apache on Ubuntu 16.04/17.10](https://www.linuxbabe.com/ubuntu/enable-http-2-apache-ubuntu-16-04-17-10)
* [How to Enable HTTP/2 Protocol with Nginx on Debian 8 Jessie Server](https://www.linuxbabe.com/debian/enable-http2-nginx-debian-8-jessie-server)
