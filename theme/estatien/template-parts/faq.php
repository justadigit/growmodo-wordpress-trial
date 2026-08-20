<?php
/**
 * FAQ section.
 *
 * @package Estatien
 */

$faqs = array(
	array( 'How do I search for properties on Estatein?', 'Use the Properties area to browse featured homes, then refine by location, type, bedrooms, bathrooms, and budget inside WordPress-managed property listings.' ),
	array( 'What documents do I need to sell my property?', 'Our agents help prepare ownership documents, disclosures, property details, and marketing material before your listing goes live.' ),
	array( 'How can I schedule a property viewing?', 'Contact the Estatein team from any property page and we will coordinate a viewing time that works for you.' ),
);
?>
<section class="section-container section-block faq-section" id="faq" aria-labelledby="faq-title">
	<div class="section-heading">
		<div>
			<span class="sparkles" aria-hidden="true"></span>
			<h2 id="faq-title"><?php esc_html_e( 'Frequently Asked Questions', 'estatien' ); ?></h2>
			<p><?php esc_html_e( 'Find answers to common questions about Estatein\'s services, property listings, and the real estate process. We\'re here to provide clarity and assist you every step of the way.', 'estatien' ); ?></p>
		</div>
		<span class="button button-secondary is-disabled-visual"><?php esc_html_e( 'View All FAQ\'s', 'estatien' ); ?></span>
	</div>
	<div class="faq-grid">
		<?php foreach ( $faqs as $index => $faq ) : ?>
			<article class="faq-card">
				<h3>
					<button type="button" aria-expanded="<?php echo 0 === $index ? 'true' : 'false'; ?>">
						<?php echo esc_html( $faq[0] ); ?>
						<span aria-hidden="true">+</span>
					</button>
				</h3>
				<div class="faq-answer" <?php echo 0 === $index ? '' : 'hidden'; ?>>
					<p><?php echo esc_html( $faq[1] ); ?></p>
				</div>
			</article>
		<?php endforeach; ?>
	</div>
</section>
