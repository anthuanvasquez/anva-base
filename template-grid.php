<?php
/**
 * Template Name: Posts Grid
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

get_header();

$column       = apply_filters( 'anva_template_grid_columns', 2 ); // Default Column.
$thumbnail    = apply_filters( 'anva_template_grid_thumbnail', 'anva_grid_2' );
$current_grid = anva_get_post_meta( '_anva_grid_column' );
$grid_columns = anva_get_grid_columns();

if ( isset( $grid_columns[ $current_grid ]['column'] ) ) {
	$column = $grid_columns[ $current_grid ]['column'];
}

// Get posts.
$query = anva_get_posts();
?>

<div class="container clearfix">

	<?php
		/**
		 * Before post content not hooked by default.
		 */
		do_action( 'anva_post_content_before' );
	?>

	<div id="posts" class="<?php anva_template_class( 'grid' ); ?> grid-<?php echo esc_attr( $column ); ?> clearfix" data-layout="fitRows">
		<?php while ( $query->have_posts() ) : $query->the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php anva_the_post_grid_thumbnail( $thumbnail ); ?>
				<div class="entry-title">
					<h2>
						<a href="<?php the_permalink(); ?>">
							<?php the_title(); ?>
						</a>
					</h2>
				</div>

				<?php anva_get_template_part( 'post', 'content-meta-mini' ); ?>

				<div class="entry-content">
					<?php anva_the_excerpt(); ?>
				</div>
			</article>

		<?php endwhile; ?>

	</div><!-- #posts (end) -->

	<?php
		/**
		 * After post content not hooked by default.
		 */
		do_action( 'anva_post_content_after' );
	?>

	<?php anva_num_pagination( $query->max_num_pages ); ?>
	<?php wp_reset_postdata(); ?>

</div><!-- .container (end) -->

<?php get_footer(); ?>
