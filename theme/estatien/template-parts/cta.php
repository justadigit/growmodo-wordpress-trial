<?php
/**
 * Final CTA section.
 *
 * @package Estatien
 */
?>
<section class="cta-section" aria-labelledby="cta-title">
	<div class="section-container cta-inner">
		<div>
			<h2 id="cta-title"><?php esc_html_e( 'Start Your Real Estate Journey Today', 'estatien' ); ?></h2>
			<p><?php esc_html_e( 'Your dream property is just a click away. Whether you are looking for a new home, a strategic investment, or expert real estate advice, Estatein is here to help.', 'estatien' ); ?></p>
		</div>
		<a class="button button-primary" href="<?php echo esc_url( estatien_properties_url() ); ?>"><?php esc_html_e( 'Explore Properties', 'estatien' ); ?></a>
	</div>
</section>
