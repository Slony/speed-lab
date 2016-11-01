<!-- inject critical CSS -->
<style><?php include("css/critical.css");?></style>
<!-- load full CSS stylesheet in async -->
<link rel="preload" href="<?= BASEURL;?>css/app.css" as="style" onload="this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?= BASEURL;?>css/app.css"></noscript>
