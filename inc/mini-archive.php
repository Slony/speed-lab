
<hr class="hr--50 u-mtm u-mbm" />

<section class="mini-archive">
  <div class="container">

    <div class="row">
      <div class="col-sm-12">
        <h2> Blog news</h2>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
      </div>
    </div>

    <div class="row">
      <?php for($i = 1; $i < 5; $i++): ?>
        <article class="col-md-3 col-sm-6">
          <div class="article-container">
            <div class="img-container">
              <?php if(LAZYLOADING == "true"):?>
                <img class="img-responsive lazyload" data-src="http://lorempicsum.com/futurama/400/400/<?= $i;?>">
              <?php else : ?>
                <img class="img-responsive" src="http://lorempicsum.com/futurama/400/400/<?= $i;?>">
              <?php endif; ?>
            </div>
            <div class="content-container">
              <p class="title">Le titre </p>
              <p class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
            </div>
          </div> <!-- article-container -->
        </article>
      <?php endfor;?>
    </div> <!-- row -->

  </div>
</section>


<hr class="hr--50 u-mtm u-mbm" />
