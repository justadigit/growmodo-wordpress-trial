<?php
/**
 * Hero section.
 *
 * @package Estatien
 */
?>
<section class="hero-section" id="about" aria-labelledby="hero-title">
	<div class="hero-copy">
		<div class="hero-text">
			<h1 id="hero-title"><span><?php esc_html_e( 'Discover Your Dream', 'estatien' ); ?></span><span><?php esc_html_e( 'Property with Estatein', 'estatien' ); ?></span></h1>
			<p><?php esc_html_e( 'Your journey to finding the perfect property begins here. Explore our listings to find the home that matches your dreams.', 'estatien' ); ?></p>
			<a class="hero-badge" href="#properties" aria-label="<?php esc_attr_e( 'Discover your dream property', 'estatien' ); ?>">↗</a>
		</div>
		<div class="button-row">
			<a class="button button-secondary" href="#features"><?php esc_html_e( 'Learn More', 'estatien' ); ?></a>
			<a class="button button-primary" href="#properties"><?php esc_html_e( 'Browse Properties', 'estatien' ); ?></a>
		</div>
		<div class="stats-grid" aria-label="<?php esc_attr_e( 'Estatein achievements', 'estatien' ); ?>">
			<div><strong>200+</strong><span><?php esc_html_e( 'Happy Customers', 'estatien' ); ?></span></div>
			<div><strong>10k+</strong><span><?php esc_html_e( 'Properties For Clients', 'estatien' ); ?></span></div>
			<div><strong>16+</strong><span><?php esc_html_e( 'Years of Experience', 'estatien' ); ?></span></div>
		</div>
	</div>
	<div class="hero-visual">
		<img class="hero-pattern" src="<?php echo estatien_asset( 'images/hero-pattern.svg' ); ?>" alt="" loading="eager">
		<img class="hero-building" src="<?php echo estatien_asset( 'images/hero-building.png' ); ?>" alt="<?php esc_attr_e( 'Blue glass high-rise building', 'estatien' ); ?>" loading="eager">
	</div>
</section>
