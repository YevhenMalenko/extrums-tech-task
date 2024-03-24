<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package extrums_dev
 */

?>

	<footer class="py-5 bg-dark">
		<div class="container">
			<p class="m-0 text-center text-white">
				<?php _e('Copyright &copy; '. date("Y"), 'extrums_dev'); ?>
			</p>
		</div>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
