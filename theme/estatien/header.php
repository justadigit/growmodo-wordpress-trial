<?php
/**
 * Site header.
 *
 * @package Estatien
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#site-main"><?php esc_html_e( 'Skip to content', 'estatien' ); ?></a>
<header class="site-header">
	<div class="nav-shell">
		<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'Estatein home', 'estatien' ); ?>">
			<img src="<?php echo esc_url( estatien_asset( 'images/logo-symbol.svg' ) ); ?>" alt="" width="48" height="48">
			<img src="<?php echo esc_url( estatien_asset( 'images/logo-text.svg' ) ); ?>" alt="Estatein" width="102" height="21">
		</a>
		<nav class="primary-nav" id="primary-nav" aria-label="<?php esc_attr_e( 'Primary navigation', 'estatien' ); ?>">
			<ul>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'container'      => false,
						'items_wrap'     => '%3$s',
						'fallback_cb'    => 'estatien_default_menu',
					)
				);
				?>
			</ul>
		</nav>
		<a class="nav-cta" href="<?php echo esc_url( estatien_contact_url() ); ?>"><?php esc_html_e( 'Contact Us', 'estatien' ); ?></a>
		<button class="menu-toggle" type="button" aria-controls="primary-nav" aria-expanded="false">
			<span></span><span></span><span></span>
			<span class="screen-reader-text"><?php esc_html_e( 'Menu', 'estatien' ); ?></span>
		</button>
	</div>
</header>
<main id="site-main">
