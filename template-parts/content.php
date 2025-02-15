<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package extrums_dev
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<?php extrums_dev_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'extrums_dev' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);
		
		if (get_post_type() === 'book') {
			get_template_part('template-parts/components/counter');
		}
		?>
		
	</div><!-- .entry-content -->


</article><!-- #post-<?php the_ID(); ?> -->
