<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package extrums_dev
 */

get_header();
?>

	<main id="primary" class="site-main flex-grow-1">
		<section class="py-5 bg-light border-bottom" id="masthead">
			<div class="container">
				<div class="text-center my-5">
					<h1 class="fw-bolder"><?php the_title(); ?></h1>
					<?php if ( is_front_page() ) : ?>
						<p class="lead mb-0"><?php bloginfo( 'description' ); ?></p>
					<?php endif; ?>
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

							get_template_part( 'template-parts/content', 'page' );

						endwhile; // End of the loop.
						?>
					</div>
				</div>
			</div>
		</section>
	</main><!-- #main -->

<?php
get_footer();
