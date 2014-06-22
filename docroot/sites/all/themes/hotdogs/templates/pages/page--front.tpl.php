<!--.page -->
<div role="document" class="page">

  <!--.l-header region -->
  <header role="banner" class="l-header">

    <?php if ($top_bar): ?>
      <!--.top-bar -->
      <?php if ($top_bar_classes): ?>
      <div class="<?php print $top_bar_classes; ?>">
      <?php endif; ?>
        <nav class="top-bar bkgrd-hotdogred" data-topbar <?php print $top_bar_options; ?>>
          <ul class="title-area">
            <li class="name"><h1><?php print $linked_site_name; ?></h1></li>
            <li class="toggle-topbar menu-icon"><a href="#"><span><?php print $top_bar_menu_text; ?></span></a></li>
          </ul>
          <section class="top-bar-section right">
            <?php if ($top_bar_main_menu) :?>
              <?php print $top_bar_main_menu; ?>
            <?php endif; ?>
          </section>
        </nav>
      <?php if ($top_bar_classes): ?>
      </div>
      <?php endif; ?>
      <!--/.top-bar -->
    <?php endif; ?>

    <!-- Title, slogan and menu -->
    <?php if ($alt_header): ?>
    <section class="row <?php print $alt_header_classes; ?>">

      <?php if ($linked_logo): print $linked_logo; endif; ?>

      <?php if ($site_name): ?>
        <?php if ($title): ?>
          <div id="site-name" class="element-invisible">
            <strong>
              <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
            </strong>
          </div>
        <?php else: /* Use h1 when the content title is empty */ ?>
          <h1 id="site-name">
            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
          </h1>
        <?php endif; ?>
      <?php endif; ?>

      <?php if ($site_slogan): ?>
        <h2 title="<?php print $site_slogan; ?>" class="site-slogan"><?php print $site_slogan; ?></h2>
      <?php endif; ?>

      <?php if ($alt_main_menu): ?>
        <nav id="main-menu" class="navigation" role="navigation">
          <?php print ($alt_main_menu); ?>
        </nav> <!-- /#main-menu -->
      <?php endif; ?>

      <?php if ($alt_secondary_menu): ?>
        <nav id="secondary-menu" class="navigation" role="navigation">
          <?php print $alt_secondary_menu; ?>
        </nav> <!-- /#secondary-menu -->
      <?php endif; ?>

    </section>
    <?php endif; ?>
    <!-- End title, slogan and menu -->

    <?php if (!empty($page['header'])): ?>
      <!--.l-header-region -->
      <section class="l-header-region row">
        <div class="large-12 columns">
          <?php print render($page['header']); ?>
        </div>
      </section>
      <!--/.l-header-region -->
    <?php endif; ?>

  </header>
  <!--/.l-header -->

  <?php if (!empty($page['featured'])): ?>
    <!--/.featured -->
    <section class="l-featured row">
      <div class="large-12 columns">
        <?php print render($page['featured']); ?>
      </div>
    </section>
    <!--/.l-featured -->
  <?php endif; ?>

  <?php if ($messages && !$zurb_foundation_messages_modal): ?>
    <!--/.l-messages -->
    <section class="l-messages row">
      <div class="large-12 columns">
        <?php if ($messages): print $messages; endif; ?>
      </div>
    </section>
    <!--/.l-messages -->
  <?php endif; ?>

  <?php if (!empty($page['help'])): ?>
    <!--/.l-help -->
    <section class="l-help row">
      <div class="large-12 columns">
        <?php print render($page['help']); ?>
      </div>
    </section>
    <!--/.l-help -->
  <?php endif; ?>
  
  <!-- Hero Area -->
  <section class="full-screen-photo checks" id="features-hero">
      <div class="row bkgrd-white roundcrnr">
          <div class="small-12 medium-4 large-4 column">
              <h1 class="main-header">Facts Figures &amp; Folklore</h1><br>
              <a class="large radius button" href="#">Get Some Facts!</a><br>
          </div>
          <div class="medium-8 large-8 columns">
              <img src="<?php echo base_path() . path_to_theme(); ?>/images/large-image-dog.jpg">
          </div>
      </div>
  </section>
	<!-- End Hero Area -->

	<!-- Homepage Banner -->
  <div class="bkgrd-lightred">
      <div class="row">
          <div class="large-12 columns text-center">
              <h2 class="text-white gutter-top">Hot dog and sausage statistics, recipes, films that have featured hot dogs and more.</h2>
              <p class=" lead hide-for-small text-white">We have the skinny on all of the latest facts and trivia, you name it we have it.</p>
          </div>
      </div>
  </div>
 	<!-- End Homepage Banner --> 
  
  <main role="main" class="row l-main">
    <div class="<?php print $main_grid; ?> main columns">
      <?php if (!empty($page['highlighted'])): ?>
        <div class="highlight panel callout">
          <?php print render($page['highlighted']); ?>
        </div>
      <?php endif; ?>

      <a id="main-content"></a>

      <?php if ($breadcrumb): print $breadcrumb; endif; ?>

      <?php if ($title && !$is_front): ?>
        <?php print render($title_prefix); ?>
        <h1 id="page-title" class="title"><?php print $title; ?></h1>
        <?php print render($title_suffix); ?>
      <?php endif; ?>

      <?php if (!empty($tabs)): ?>
        <?php print render($tabs); ?>
        <?php if (!empty($tabs2)): print render($tabs2); endif; ?>
      <?php endif; ?>

      <?php if ($action_links): ?>
        <ul class="action-links">
          <?php print render($action_links); ?>
        </ul>
      <?php endif; ?>

      <?php print render($page['home_content']); ?>
    </div>
    <!--/.main region -->

    <?php if (!empty($page['sidebar_first'])): ?>
      <aside role="complementary" class="<?php print $sidebar_first_grid; ?> sidebar-first columns sidebar">
        <?php print render($page['sidebar_first']); ?>
      </aside>
    <?php endif; ?>

    <?php if (!empty($page['sidebar_second'])): ?>
      <aside role="complementary" class="<?php print $sidebar_sec_grid; ?> sidebar-second columns sidebar">
        <?php print render($page['sidebar_second']); ?>
      </aside>
    <?php endif; ?>
  </main>
  <!--/.main-->

  <?php if (!empty($page['triptych_first']) || !empty($page['triptych_middle']) || !empty($page['triptych_last'])): ?>
    <!--.triptych-->
    <section class="l-triptych row">
      <div class="triptych-first large-4 columns">
        <?php print render($page['triptych_first']); ?>
      </div>
      <div class="triptych-middle large-4 columns">
        <?php print render($page['triptych_middle']); ?>
      </div>
      <div class="triptych-last large-4 columns">
        <?php print render($page['triptych_last']); ?>
      </div>
    </section>
    <!--/.triptych -->
  <?php endif; ?>

  <?php if (!empty($page['footer_firstcolumn']) || !empty($page['footer_secondcolumn']) || !empty($page['footer_thirdcolumn']) || !empty($page['footer_fourthcolumn'])): ?>
    <!--.footer-columns -->
    <section class="row l-footer-columns">
      <?php if (!empty($page['footer_firstcolumn'])): ?>
        <div class="footer-first large-3 columns">
          <?php print render($page['footer_firstcolumn']); ?>
        </div>
      <?php endif; ?>
      <?php if (!empty($page['footer_secondcolumn'])): ?>
        <div class="footer-second large-3 columns">
          <?php print render($page['footer_secondcolumn']); ?>
        </div>
      <?php endif; ?>
      <?php if (!empty($page['footer_thirdcolumn'])): ?>
        <div class="footer-third large-3 columns">
          <?php print render($page['footer_thirdcolumn']); ?>
        </div>
      <?php endif; ?>
      <?php if (!empty($page['footer_fourthcolumn'])): ?>
        <div class="footer-fourth large-3 columns">
          <?php print render($page['footer_fourthcolumn']); ?>
        </div>
      <?php endif; ?>
    </section>
    <!--/.footer-columns-->
  <?php endif; ?>

  <!--.l-footer-->
  <footer class="l-footer" role="contentinfo">
    <div class="row gutter-bottom-lg">
        <h2 class="dotted-header"><span>Connect With Us</span></h2>
        <div class="medium-12 medium-centered small-12 small-centered columns" >
            <ul id="social">
              <li><a class="youtube" href="http://www.youtube.com/user/hotdogcouncil">YouTube</a></li>
              <li><a class="facebook" href="https://www.facebook.com/NHDSC">Facebook</a></li>
              <li><a class="pinterest" href="http://localhost/dev.hot-dog.local/designs/nhdsc-v1/index.php#">Pinterst</a></li>
              <li><a class="allrecipes" href="http://allrecipes.com/cook/natlhotdogsausagecounci/">All Recipes</a></li>
              <li><a class="zazzle" href="http://www.zazzle.com/hotdogcouncil">Zazzle</a></li>
            </ul>
        </div>
    </div>
    
    
    
    <div class="bkgrd-creme">
        <div class="row gutter-top-lg">
            <div class="small-12 medium-6 large-6 columns push-6 text-grey sans">
                <h4 class="text-hotdogred">Media Contacts</h4>
                <p class="small text-light">Janet Riley<br>
                    President, NHDSC and 'Queen of Wien'<br>
                    202/587-4245, cell 703/801-2238<br>
                    <a href="mailto:jriley@meatami.com" class="text-grey">jriley@meatami.com</a></p>
    
                <p class="small">Eric Mittenthal<br>
                    Vice President, Public Affairs<br>
                    National Hot Dog &amp; Sausage Council<br>
                    202/587-4238, cell 404/808-8396<br>
                    <a href="mailto:emittenthal@meatami.com" class="text-grey">emittenthal@meatami.com</a></p>
            </div>
            <div class="small-12 medium-6 large-6 columns pull-6 text-grey sans ">
                <p><img src="<?php echo base_path() . path_to_theme(); ?>/images/nhdsc-logo-newest-dark.png" alt="National Hot Dog &amp; Sausage Council"></p>
                <p class="small"> 1150 Connecticut Avenue, NW, 12th floor <br>
                    Washington, DC&nbsp;&nbsp; | 202-587-4200 <br>
                </p>
    
                <ul class="inline-list">
                    <li><a href="http://allrecipes.com/cook/natlhotdogsausagecounci/" class="text-grey ">All Recipes</a></li>
                    <li><a href="https://www.facebook.com/NHDSC" class="text-grey">Facebook</a></li>
                    <li><a href="http://www.youtube.com/user/hotdogcouncil" class="text-grey">Youtube</a></li>
                    <li><a href="http://www.pinterest.com/hotdogsausage/" class="text-grey">Pinterest</a></li>
                </ul>
    
                <!--/ .social-icons -->
            </div>
        </div>
    </div>
    
    <!-- END Full width -->
    
    <!-- Footer -->
    
    <div class="bkgrd-hotdogred gutter-bottom">
        <div class="row">
            <div class="medium-4 medium-4 push-8 columns gutter-top">
                <ul class="inline-list smaller">
                    <li><a href="about.php" class="text-ltgrey ">About</a></li>
                    <li><a href="#" class="text-ltgrey"> News</a></li>
                    <li><a href="#" class="text-ltgrey">Sitemap</a></li>
                </ul>
            </div>
            <div class="medium-8 medium-8 pull-4 columns gutter-top ">
                <p class="smaller text-ltgrey">&copy; Copyright, just source credit</p>
            </div>
        </div>
    </div>
  </footer>
  <!--/.footer-->

  <?php if ($messages && $zurb_foundation_messages_modal): print $messages; endif; ?>
</div>
<!--/.page -->
