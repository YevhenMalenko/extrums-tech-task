<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package extrums_dev
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site d-flex flex-column min-vh-100 ">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'extrums_dev' ); ?></a>

	<header id="masthead" class="site-header">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<div class="container">
				<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
				<?php if ( has_nav_menu( 'primary-menu' ) ) { ?>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#primary-menu" aria-controls="primary-menu" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<?php wp_nav_menu(
						array(
							'theme_location'  => 'primary-menu',
							'menu_id'         => 'main-menu',
							'container'       => 'div',
							'container_id'    => 'primary-menu',
							'container_class' => 'collapse navbar-collapse',
							'menu_class'      => 'navbar-nav ms-auto mb-2 mb-lg-0',
							'list_item_class' => 'nav-item',
							'link_class'      => 'nav-link'
						)
					);
				} ?>
			</div>
		</nav>
	</header><!-- #masthead -->
