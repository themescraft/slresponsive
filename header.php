<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SlResponsive
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
	<header id="masthead" class="site-header bg-inverse" role="banner">
		<nav id="site-navigation" class="main-navigation navbar navbar-dark bg-inverse container" role="navigation">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mobile-menu" aria-controls="mobile-menu" aria-expanded="false" aria-label="Toggle navigation"></button>
			<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => null, 'menu_id' => 'primary-menu', 'items_wrap' => '<ul id="%1$s" class="nav navbar-nav primary-menu">%3$s</ul>', 'walker' => new WPDocs_Walker_Nav_Menu() ) ); ?>
			<div class="mobile-menu collapse navbar-toggleable-md" id="mobile-menu">
				<?php wp_nav_menu( array( 'theme_location' => 'mobile', 'container' => null, 'menu_id' => 'mobile-menu', 'items_wrap' => '<ul id="%1$s" class="nav navbar-nav">%3$s</ul>', 'walker' => new WPDocs_Walker_Nav_Menu() ) ); ?>
			</div>
		</nav><!-- #site-navigation -->

	</header><!-- #masthead -->
	<div class="container">
		<div id="content" class="site-content row">
