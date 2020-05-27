<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package davejmoz
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'davejmoz' ); ?></a>
<div id="page" class="hfeed site">
	
	<?php if ( is_page_template( 'page-landing.php' ) ){ ?>
	
	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<!-- <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>-->
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<div class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
				<svg class="icon-small-size" xmlns="http://www.w3.org/2000/svg" width="16" height="12" viewBox="0 0 16 12">
					<g fill="none" fill-rule="evenodd">
						<line id="top-line" stroke="#000" x1="0" y1="0" x2="16" y2="0"/>
						<line id="middle-line" stroke="#000" x1="0" y1="5" x2="16" y2="5"/>
						<line id="bottom-line" stroke="#000" x1="0" y1="10" x2="16" y2="10"/>
					</g>
				</svg>
			</div>
			<div id="nav-wrap">
				<?php wp_nav_menu( array(
					'theme_location' => 'social',
					'menu_id' => 'social-menu',
					'container' => '',
					'items_wrap' => '<div id="social-menu"><ul>%3$s</ul></div>',
					'walker' => new DaveMozDev_Nav_Walker(), ) ); ?>
			</div>
			<div id="mobile-nav-wrap">
				<?php wp_nav_menu( array(
					'theme_location' => 'social',
					'menu_id' => 'social-menu',
					'container' => '',
					'items_wrap' => '<div id="social-menu"><ul>%3$s</ul></div>',
					'walker' => new DaveMozDev_Nav_Walker(),
				) ); ?>
			</div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
	
	<?php } else { ?>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<!-- <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>-->
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<div class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
				<svg class="icon-small-size" xmlns="http://www.w3.org/2000/svg" width="16" height="12" viewBox="0 0 16 12">
					<g fill="none" fill-rule="evenodd">
						<line id="top-line" stroke="#000" x1="0" y1="0" x2="16" y2="0"/>
						<line id="middle-line" stroke="#000" x1="0" y1="5" x2="16" y2="5"/>
						<line id="bottom-line" stroke="#000" x1="0" y1="10" x2="16" y2="10"/>
					</g>
				</svg>
			</div>
			<div id="nav-wrap">
				<?php wp_nav_menu( array(
					'theme_location' => 'primary',
					'menu_id' => 'primary-menu',
					'container' => '',
					'items_wrap' => '<div id="primary-menu"><ul>%3$s</ul></div>',
				) ); ?>
				<?php wp_nav_menu( array(
					'theme_location' => 'social',
					'menu_id' => 'social-menu',
					'container' => '',
					'items_wrap' => '<div id="social-menu"><ul>%3$s</ul></div>',
					'walker' => new DaveMozDev_Nav_Walker(), ) ); ?>
			</div>
			<div id="mobile-nav-wrap">
				<?php wp_nav_menu( array(
					'theme_location' => 'mobile',
					'menu_id' => 'mobile-menu',
					'container' => '',
					'items_wrap' => '<div id="mobile-menu"><ul>%3$s</ul></div>',
				) ); ?>
				<?php wp_nav_menu( array(
					'theme_location' => 'social',
					'menu_id' => 'social-menu',
					'container' => '',
					'items_wrap' => '<div id="social-menu"><ul>%3$s</ul></div>',
					'walker' => new DaveMozDev_Nav_Walker(),
				) ); ?>
			</div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
	
	<?php } ?>

	<div id="content" class="site-content">
