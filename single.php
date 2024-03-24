<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package extrums_dev
 */

get_header();
?>

	<main id="primary" class="site-main d-flex flex-column flex-grow-1">
		<section class="py-5 bg-light border-bottom">
			<div class="container">
				<div class="text-center my-5">
					<h1 class="fw-bolder"><?php the_title(); ?></h1>
				</div>
			</div>
		</section>
		<section class="py-5">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<?php
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content' );

						endwhile; // End of the loop.
						?>
					</div>
				</div>
			</div>
		</section>
		<?php get_template_part('template-parts/last-visited-post'); ?>
	</main><!-- #main -->

<?php
get_footer();
