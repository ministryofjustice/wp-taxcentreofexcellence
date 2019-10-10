<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>
<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('head'); ?>
  <body <?php body_class(); ?>>
    <?php
    do_action('get_header');
    get_header();
    ?>
    <div class="page-container" id="content">
      <?php include Wrapper\template_path(); ?>
    </div>
    <?php
    do_action('get_footer');
    get_footer();
    wp_footer();
    ?>
  </body>
</html>
