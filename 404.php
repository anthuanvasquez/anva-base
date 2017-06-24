<?php
/**
 * The template file for 404's.
 *
 * WARNING: This template file is a core part of the
 * Anva WordPress Framework. It is advised
 * that any edits to the way this file displays its
 * content be done with via hooks, filters, and
 * template parts.
 *
 * @version      1.0.0
 * @author       Anthuan Vásquez
 * @copyright    Copyright (c) Anthuan Vásquez
 * @link         https://anthuanvasquez.net
 * @package      AnvaFramework
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<div class="container clearfix">
	<div class="col_full">
		<?php anva_get_template_part( 'page', 'content-404' ); ?>
	</div><!-- .col_full (end) -->
</div><!-- .container (end) -->

<?php get_footer(); ?>
