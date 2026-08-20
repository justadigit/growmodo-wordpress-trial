<?php
/**
 * Site footer.
 *
 * @package Estatien
 */
?>
</main>
<footer class="site-footer" id="contact">
	<div class="footer-main section-container">
		<div class="footer-brand">
			<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<img src="<?php echo estatien_asset( 'images/logo-symbol.svg' ); ?>" alt="" width="48" height="48">
				<img src="<?php echo estatien_asset( 'images/logo-text.svg' ); ?>" alt="Estatein" width="102" height="21">
			</a>
			<form class="newsletter" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" role="search">
				<label class="screen-reader-text" for="estatien-email"><?php esc_html_e( 'Email address', 'estatien' ); ?></label>
				<input id="estatien-email" name="s" type="search" placeholder="<?php esc_attr_e( 'Search Properties', 'estatien' ); ?>">
				<button type="submit" aria-label="<?php esc_attr_e( 'Search', 'estatien' ); ?>">→</button>
			</form>
		</div>
		<div class="footer-columns">
			<?php
			$columns = array(
				'Home'       => array(
					'Hero Section' => home_url( '/' ),
					'Features'     => home_url( '/#features' ),
					'Properties'   => estatien_properties_url(),
					'Testimonials' => home_url( '/#testimonials' ),
					'FAQ'          => home_url( '/#faq' ),
				),
				'About Us'   => array(
					'Our Story'    => estatien_about_url(),
					'Our Works'    => estatien_properties_url(),
					'How It Works' => estatien_about_url(),
					'Our Team'     => estatien_about_url(),
				),
				'Properties' => array(
					'Portfolio'  => estatien_properties_url(),
					'Categories' => estatien_properties_url(),
				),
				'Services'   => array(
					'Valuation'   => estatien_services_url(),
					'Management'  => estatien_services_url(),
					'Investment'  => estatien_services_url(),
					'Consulting'  => estatien_services_url(),
				),
				'Contact Us' => array(
					'Contact Form' => estatien_contact_url(),
					'Offices'      => estatien_contact_url(),
				),
			);
			foreach ( $columns as $heading => $links ) :
				?>
				<div class="footer-column">
					<h2><?php echo esc_html( $heading ); ?></h2>
					<ul>
						<?php foreach ( $links as $label => $url ) : ?>
							<li><a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $label ); ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
	<div class="footer-bottom">
		<div class="section-container footer-bottom-inner">
			<p>© <?php echo esc_html( gmdate( 'Y' ) ); ?> Estatein. <?php esc_html_e( 'All Rights Reserved.', 'estatien' ); ?></p>
			<span><?php esc_html_e( 'Terms & Conditions', 'estatien' ); ?></span>
			<div class="social-links" aria-hidden="true">
				<span>f</span>
				<span>in</span>
				<span>x</span>
				<span>▶</span>
			</div>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
