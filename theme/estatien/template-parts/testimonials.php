<?php
/**
 * Testimonials section.
 *
 * @package Estatien
 */

$testimonials = array(
	array( 'Exceptional Service!', 'Our experience with Estatein was outstanding. Their team\'s dedication and professionalism made finding our dream home a breeze. Highly recommended!', 'Wade Warren', 'USA, California', 'avatar-wade.png' ),
	array( 'Efficient and Reliable', 'Estatein provided us with top-notch service. They helped us sell our property quickly and at a great price. We couldn\'t be happier with the results.', 'Emelie Thomson', 'USA, Florida', 'avatar-emelie.png' ),
	array( 'Trusted Advisors', 'The Estatein team guided us through the entire buying process. Their knowledge and commitment to our needs were impressive. Thank you for your support!', 'John Mans', 'USA, Nevada', 'avatar-john.png' ),
);
?>
<section class="section-container section-block" id="testimonials" aria-labelledby="testimonials-title">
	<div class="section-heading">
		<div>
			<span class="sparkles" aria-hidden="true"></span>
			<h2 id="testimonials-title"><?php esc_html_e( 'What Our Clients Say', 'estatien' ); ?></h2>
			<p><?php esc_html_e( 'Read the success stories and heartfelt testimonials from our valued clients. Discover why they chose Estatein for their real estate needs.', 'estatien' ); ?></p>
		</div>
		<span class="button button-secondary is-disabled-visual"><?php esc_html_e( 'View All Testimonials', 'estatien' ); ?></span>
	</div>
	<div class="card-grid testimonial-grid">
		<?php foreach ( $testimonials as $item ) : ?>
			<article class="testimonial-card">
				<div class="stars" aria-label="<?php esc_attr_e( 'Five star rating', 'estatien' ); ?>">★★★★★</div>
				<h3><?php echo esc_html( $item[0] ); ?></h3>
				<p><?php echo esc_html( $item[1] ); ?></p>
				<div class="client">
					<img src="<?php echo estatien_asset( 'images/' . $item[4] ); ?>" alt="" width="60" height="60" loading="lazy">
					<div><strong><?php echo esc_html( $item[2] ); ?></strong><span><?php echo esc_html( $item[3] ); ?></span></div>
				</div>
			</article>
		<?php endforeach; ?>
	</div>
	<div class="section-pager" aria-hidden="true"><span><strong>01</strong> of 10</span><span class="pager-buttons"><span>←</span><span>→</span></span></div>
</section>
