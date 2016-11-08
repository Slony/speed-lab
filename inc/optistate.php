<div class="row u-mtm u-mbm">

  <div class="col-sm-12 u-mts u-mbm">
    <p class="txtLead">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </p>
  </div>



  <hr class="hr--50 u-mtm u-mbm" />

  <div class="col-sm-9">

    <div class="opti-state ">

      <h2> Optimization status : </h2>
      <ul class="u-mbm">
        <!-- Scripts states -->
        <li>
          <?php if (SCRIPT !== "footer"): ?>
            <span class="error">
              Scripts are loaded in the header :/
            </span>
            <a href="<?= URL;?>&script=footer"> we can optimize that... </a>
          <?php else: ?>
            <span class="success">
              Yohoo ! JS are not blocking the critical rendering path :)
            </span>
          <?php endif; ?>
        </li>
        <!-- CSS States -->

        <li>
          <?php if (CSS !== "inline"): ?>
            <span class="error">
              CSS above the fold are in an external stylesheet :(
              <a href="<?= URL;?>&css=inline"> we can optimize that... </a>
            </span>
          <?php else: ?>
            <span class="success">
              Yohoo ! CSS are not blocking the critical rendering path :)
            </span>
          <?php endif; ?>
        </li>


        <li>
          <?php if (JS !== "min"): ?>
            <span class="error">
              JS files are not minified :
              <a href="<?= URL;?>&js=min"> we can optimize that... </a>
            </span>
          <?php else: ?>
            <span class="success">
              Yohoo ! JS files are optimized thanks to the minification :)
            </span>
          <?php endif; ?>
        </li>


        <li>
          <?php if (SRCSET == "false"): ?>
            <span class="error">
              Img are too big, they are resized in CSS :/
              <a href="<?= URL;?>&srcset"> we can optimize that... </a>
            </span>
          <?php else: ?>
            <span class="success">
              Yohoo ! IMG are in perfect size thanks to srcset :)
            </span>
          <?php endif; ?>
        </li>


        <li>
          <?php if (LAZYLOADING == "false"): ?>
            <span class="error">
              All the images are loaded right away, we can use the lazy loading techiques to fix that.
              <a href="<?= URL;?>&lazyloading"> we can optimize that... </a>
            </span>
          <?php else: ?>
            <span class="success">
              Yohoo ! IMG are loaded with lazy loading
            </span>
          <?php endif; ?>
        </li>

        <li>
          <?php if (SPRITE == "false"): ?>
            <span class="error">
              At the bottom of this page there's multiples images and no sprite
              <a href="<?= URL;?>&sprite"> we can optimize that... </a>
            </span>
          <?php else: ?>
            <span class="success">
              Yohoo ! There's a sprite you saved 4 HTTP requests :)
            </span>
          <?php endif; ?>
        </li>

        <li>
          <?php if (DNSPREFETCH == "false"): ?>
            <span class="error">
              You are loading contents for a third party server without Prefectch :(
              <a href="<?= URL;?>&dnsprefetch"> we can optimize that... </a>
            </span>
          <?php else: ?>
            <span class="success">
              Yohoo ! You speed-up DNS lookup thanks to dns-prefetch
            </span>
          <?php endif; ?>
        </li>


        <li>
          <?php if (ADAPTIVE == "false"): ?>
            <span class="error">
              The slider used on the desktop version is hidden in CSS. The scripts, CSS, images are loaded anyway on mobile :(
              <a href="<?= URL;?>&adaptive"> we can optimize that... </a>
            </span>
          <?php else: ?>
            <span class="success">
              Yohoo ! Thanks to the User-Agent detection the slider and his assets are not loaded on mobile :)
            </span>
          <?php endif; ?>
        </li>


        <li>
          <?php if (NOIFRAME == "true"): ?>
            <span class="error">
              A YouTube vide iFrame is loaded right-away :(
              <a href="<?= URL;?>&noiframe"> we can optimize that... </a>
            </span>
          <?php else: ?>
            <span class="success">
              Yohoo ! We load the YouTube video only on demand :)
            </span>
          <?php endif; ?>
        </li>



      </ul>


    </div> <!-- opti-state -->


  </div> <!-- col-sm-6 -->


  <div class="col-sm-3">

    <div class="anim-container u-mtm u-sm-mtl hidden-xs">
      <div class="jetpack">
        <div class="fly">
          <div class="hombre"></div>
          <div class="fuego"></div>
        </div>
      </div>
    </div>

  </div> <!-- col-sm-6 -->


  <div class="col-sm-12 ws-opti-btn">
    <a href="<?= BASEURL;?>" class="hidden button u-mrs u-mls button--blockMobile"> Click here to unoptimize this page </a>


    <a href="<?= BASEURL;?>?script=footer&css=inline&js=min&srcset&lazyloading&sprite&dnsprefetch&adaptive&noiframe"
      class="button button--ghost button--dblcontent u-xs-mts button--blockMobile">
      <span class="initial">Click here to fully optimize this page</span>
      <?php if(SPRITE == "true"):?>
        <span class="hovered"><i class="icon-lightning-black"></i></span>
      <?php else : ?>
        <span class="hovered"><img src="img/sprites/raw/lightning-black.png" /></span>
      <?php endif;?>
    </a>
  </div>


</div> <!-- row -->


<hr class="hr--50 u-mtm u-mbm" />
