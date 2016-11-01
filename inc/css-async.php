<!-- inject critical CSS -->
<style><?= file_get_contents(BASEURL."css/critical.css");?></style>
<!-- load full CSS stylesheet in async -->
<link rel="preload" href="<?= BASEURL;?>css/app.css" as="style" onload="this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?= BASEURL;?>css/app.css"></noscript>
