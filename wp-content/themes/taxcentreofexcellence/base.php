<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>
<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>

    <div id="skiplink-container">
      <div>
        <a href="#content" class="skiplink">Skip to Content</a>
      </div>
    </div>

    <header role="banner" id="global-header" class="">
      <div class="header-wrapper">
        <div class="header-global">
          <div class="header-logo">
            <a href="<?php bloginfo('url'); ?>" title="" id="logo" class="content">
              <img src="<?php echo get_template_directory_uri(); ?>/dist/images/gov.uk_logotype_crown_invert_trans.png" width="35" height="31" alt="">
            </a>
          </div>

        </div>

      </div>
    </header>

    <div id="global-header-bar"></div>

    <footer class="group js-footer" id="footer" role="contentinfo">

      <div class="footer-wrapper">


        <div class="footer-meta">
          <div class="footer-meta-inner">


            <div class="open-government-licence">
              <p class="logo"><a href="https://www.nationalarchives.gov.uk/doc/open-government-licence/version/3/" rel="license">Open Government Licence</a></p>



            </div>
          </div>

          <div class="copyright">
            <a href="http://www.nationalarchives.gov.uk/information-management/re-using-public-sector-information/copyright-and-re-use/crown-copyright/"></a>
          </div>
        </div>
      </div>
    </footer>

<?php /*
    <!--[if IE]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->
    <?php
      do_action('get_header');
      get_template_part('templates/header');
    ?>
    <div class="wrap container" role="document">
      <div class="content row">
        <main class="main">
          <?php include Wrapper\template_path(); ?>
        </main><!-- /.main -->
        <?php if (Setup\display_sidebar()) : ?>
          <aside class="sidebar">
            <?php include Wrapper\sidebar_path(); ?>
          </aside><!-- /.sidebar -->
        <?php endif; ?>
      </div><!-- /.content -->
    </div><!-- /.wrap -->
    <?php
      do_action('get_footer');
      get_template_part('templates/footer');
      wp_footer();
    ?> */ ?>
  </body>
</html>
