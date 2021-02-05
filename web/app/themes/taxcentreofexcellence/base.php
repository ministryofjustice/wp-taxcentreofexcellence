<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>
<!doctype html>
<html <?php language_attributes(); ?>>

	<?php get_header(); ?>
	<body <?php body_class(); ?>>

  <?php
  if ( ! function_exists( 'wp_body_open' ) ) {
    /**
     * Open the body tag, pull in any hooked triggers.
     **/
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}
wp_body_open();
?>
	<div class="page-container" id="content">
		<?php require Wrapper\template_path(); ?>
	</div>
	<?php
	get_footer();
	wp_footer();
	?>
  </body>
</html>
