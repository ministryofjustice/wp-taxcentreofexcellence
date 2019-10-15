<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>
<!doctype html>
<html <?php language_attributes(); ?>>

	<?php get_header(); ?>
	<body <?php body_class(); ?>>
	<div class="page-container" id="content">
		<?php require Wrapper\template_path(); ?>
	</div>
	<?php
	get_footer();
	wp_footer();
	?>
  </body>
</html>
