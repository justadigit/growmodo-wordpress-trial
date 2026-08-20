<?php
/**
 * Single property template.
 *
 * @package Estatien
 */

get_header();

while ( have_posts() ) :
	the_post();

	$price     = get_post_meta( get_the_ID(), 'estatien_price', true );
	$location  = get_post_meta( get_the_ID(), 'estatien_location', true );
	$bedrooms  = get_post_meta( get_the_ID(), 'estatien_bedrooms', true );
	$bathrooms = get_post_meta( get_the_ID(), 'estatien_bathrooms', true );
	$type      = get_post_meta( get_the_ID(), 'estatien_type', true );
	$area      = get_post_meta( get_the_ID(), 'estatien_area', true );
	$area      = $area ? $area : __( '2,500 Square Feet', 'estatien' );
	$amenities = array(
		__( 'Expansive oceanfront terrace for outdoor entertaining', 'estatien' ),
		__( 'Gourmet kitchen with top-of-the-line appliances', 'estatien' ),
		__( 'Private beach access for morning strolls and sunset views', 'estatien' ),
		__( 'Master suite with a spa-inspired bathroom and ocean-facing balcony', 'estatien' ),
		__( 'Private garage and ample storage space', 'estatien' ),
	);
	$fees      = array(
		array( __( 'Property Transfer Tax', 'estatien' ), '$25,000', __( 'Based on the sale price and local regulations', 'estatien' ) ),
		array( __( 'Legal Fees', 'estatien' ), '$3,000', __( 'Approximate cost for legal services, including title transfer', 'estatien' ) ),
		array( __( 'Home Inspection', 'estatien' ), '$500', __( 'Recommended before purchase', 'estatien' ) ),
		array( __( 'Property Insurance', 'estatien' ), '$1,200', __( 'Annual insurance estimate', 'estatien' ) ),
	);
	$pricing_sections = array(
		__( 'Additional Fees', 'estatien' )   => $fees,
		__( 'Monthly Costs', 'estatien' )     => array(
			array( __( 'Property Taxes', 'estatien' ), '$1,250', __( 'Approximate monthly property tax based on assessed value', 'estatien' ) ),
			array( __( 'Homeowners Association Fee', 'estatien' ), '$300', __( 'Monthly fee for common area maintenance and security', 'estatien' ) ),
		),
		__( 'Total Initial Costs', 'estatien' ) => array(
			array( __( 'Listing Price', 'estatien' ), $price ? $price : '$1,250,000', __( 'Property purchase price', 'estatien' ) ),
			array( __( 'Down Payment', 'estatien' ), '$250,000', __( '20% down payment estimate', 'estatien' ) ),
			array( __( 'Mortgage Amount', 'estatien' ), '$1,000,000', __( 'If applicable', 'estatien' ) ),
		),
		__( 'Monthly Expenses', 'estatien' )  => array(
			array( __( 'Property Taxes', 'estatien' ), '$1,250', __( 'Estimated monthly property tax', 'estatien' ) ),
			array( __( 'Homeowners Association Fee', 'estatien' ), '$300', __( 'Monthly HOA fee', 'estatien' ) ),
			array( __( 'Property Insurance', 'estatien' ), '$100', __( 'Approximate monthly cost', 'estatien' ) ),
		),
	);
	$faqs      = array(
		array( __( 'How do I search for properties on Estatein?', 'estatien' ), __( 'Use the property archive to browse listings and open each property for details.', 'estatien' ) ),
		array( __( 'What documents do I need to sell my property through Estatein?', 'estatien' ), __( 'Our team will guide you through ownership, disclosure, and transaction documents.', 'estatien' ) ),
		array( __( 'How can I contact an Estatein agent?', 'estatien' ), __( 'Use the inquiry form or contact page and we will route your request to the right specialist.', 'estatien' ) ),
	);
	?>
	<section class="section-container property-detail">
		<nav class="breadcrumb" aria-label="<?php esc_attr_e( 'Property navigation', 'estatien' ); ?>">
			<a href="<?php echo esc_url( estatien_properties_url() ); ?>"><?php esc_html_e( 'Properties', 'estatien' ); ?></a>
			<span aria-hidden="true">/</span>
			<span><?php echo esc_html( get_the_title() ); ?></span>
		</nav>

		<header class="property-detail-hero">
			<div>
				<span class="sparkles" aria-hidden="true"></span>
				<h1><?php echo esc_html( get_the_title() ); ?></h1>
				<?php if ( $location ) : ?>
					<p class="property-location"><?php echo esc_html( $location ); ?></p>
				<?php endif; ?>
			</div>
			<?php if ( $price ) : ?>
				<div class="property-detail-price"><span><?php esc_html_e( 'Price', 'estatien' ); ?></span><strong><?php echo esc_html( $price ); ?></strong></div>
			<?php endif; ?>
		</header>

		<?php if ( has_post_thumbnail() ) : ?>
			<div class="property-gallery">
				<div class="property-gallery-thumbs" aria-hidden="true">
					<?php for ( $i = 0; $i < 8; $i++ ) : ?>
						<?php the_post_thumbnail( 'thumbnail', array( 'loading' => 'lazy' ) ); ?>
					<?php endfor; ?>
				</div>
				<div class="property-gallery-main">
					<?php the_post_thumbnail( 'large', array( 'loading' => 'eager' ) ); ?>
					<?php the_post_thumbnail( 'medium_large', array( 'loading' => 'lazy' ) ); ?>
				</div>
				<div class="gallery-pager" aria-hidden="true"><span>←</span><span></span><span>→</span></div>
			</div>
		<?php endif; ?>

		<article <?php post_class( 'property-detail-card' ); ?>>
			<div class="property-detail-content">
				<h2><?php esc_html_e( 'Description', 'estatien' ); ?></h2>
				<div class="property-description">
					<?php
					if ( get_the_content() ) {
						the_content();
					} elseif ( has_excerpt() ) {
						echo '<p>' . esc_html( get_the_excerpt() ) . '</p>';
					}
					?>
				</div>
				<div class="property-spec-row">
					<?php if ( $bedrooms ) : ?>
						<div><span><?php esc_html_e( 'Bedrooms', 'estatien' ); ?></span><strong><?php echo esc_html( sprintf( '%02d', (int) $bedrooms ) ); ?></strong></div>
					<?php endif; ?>
					<?php if ( $bathrooms ) : ?>
						<div><span><?php esc_html_e( 'Bathrooms', 'estatien' ); ?></span><strong><?php echo esc_html( sprintf( '%02d', (int) $bathrooms ) ); ?></strong></div>
					<?php endif; ?>
					<div><span><?php esc_html_e( 'Area', 'estatien' ); ?></span><strong><?php echo esc_html( $area ); ?></strong></div>
				</div>
			</div>
			<aside class="property-overview" aria-labelledby="property-overview-title">
				<h2 id="property-overview-title"><?php esc_html_e( 'Key Features and Amenities', 'estatien' ); ?></h2>
				<ul class="amenity-list">
					<?php foreach ( $amenities as $amenity ) : ?>
						<li><span aria-hidden="true">✦</span><?php echo esc_html( $amenity ); ?></li>
					<?php endforeach; ?>
				</ul>
				<a class="button button-primary" href="<?php echo esc_url( estatien_contact_url() ); ?>"><?php esc_html_e( 'Ask About This Property', 'estatien' ); ?></a>
			</aside>
		</article>

		<section class="property-inquiry section-block" aria-labelledby="property-inquiry-title">
			<div class="property-inquiry-copy">
				<span class="sparkles" aria-hidden="true"></span>
				<h2 id="property-inquiry-title"><?php echo esc_html( sprintf( __( 'Inquire About %s', 'estatien' ), get_the_title() ) ); ?></h2>
				<p><?php esc_html_e( 'Interested in this property? Complete the form and the Estatein team will help you take the next step.', 'estatien' ); ?></p>
			</div>
			<form class="contact-form property-inquiry-form" action="<?php echo esc_url( get_permalink() ); ?>" method="post">
				<div class="form-grid">
					<p><label for="property-first-name"><?php esc_html_e( 'First Name', 'estatien' ); ?></label><input id="property-first-name" type="text" name="first_name" placeholder="<?php esc_attr_e( 'Enter First Name', 'estatien' ); ?>" required></p>
					<p><label for="property-last-name"><?php esc_html_e( 'Last Name', 'estatien' ); ?></label><input id="property-last-name" type="text" name="last_name" placeholder="<?php esc_attr_e( 'Enter Last Name', 'estatien' ); ?>" required></p>
					<p><label for="property-email"><?php esc_html_e( 'Email', 'estatien' ); ?></label><input id="property-email" type="email" name="email" placeholder="<?php esc_attr_e( 'Enter your Email', 'estatien' ); ?>" required></p>
					<p><label for="property-phone"><?php esc_html_e( 'Phone', 'estatien' ); ?></label><input id="property-phone" type="tel" name="phone" placeholder="<?php esc_attr_e( 'Enter Phone Number', 'estatien' ); ?>"></p>
					<p><label for="property-location-select"><?php esc_html_e( 'Preferred Location', 'estatien' ); ?></label><select id="property-location-select" name="preferred_location"><option value=""><?php esc_html_e( 'Select Location', 'estatien' ); ?></option><option><?php echo esc_html( $location ? $location : __( 'California', 'estatien' ) ); ?></option></select></p>
					<p><label for="property-type-select"><?php esc_html_e( 'Property Type', 'estatien' ); ?></label><select id="property-type-select" name="property_type"><option value=""><?php esc_html_e( 'Select Property Type', 'estatien' ); ?></option><option><?php echo esc_html( $type ? $type : __( 'Villa', 'estatien' ) ); ?></option></select></p>
					<p><label for="property-bathrooms-select"><?php esc_html_e( 'No. of Bathrooms', 'estatien' ); ?></label><select id="property-bathrooms-select" name="bathrooms"><option value=""><?php esc_html_e( 'Select no. of Bathrooms', 'estatien' ); ?></option><option><?php echo esc_html( $bathrooms ? $bathrooms : '3' ); ?></option></select></p>
					<p><label for="property-bedrooms-select"><?php esc_html_e( 'No. of Bedrooms', 'estatien' ); ?></label><select id="property-bedrooms-select" name="bedrooms"><option value=""><?php esc_html_e( 'Select no. of Bedrooms', 'estatien' ); ?></option><option><?php echo esc_html( $bedrooms ? $bedrooms : '4' ); ?></option></select></p>
				</div>
				<div class="property-form-split">
					<p><label for="property-budget-select"><?php esc_html_e( 'Budget', 'estatien' ); ?></label><select id="property-budget-select" name="budget"><option value=""><?php esc_html_e( 'Select Budget', 'estatien' ); ?></option><option><?php echo esc_html( $price ? $price : '$1,250,000' ); ?></option></select></p>
					<fieldset>
						<legend><?php esc_html_e( 'Preferred Contact Method', 'estatien' ); ?></legend>
						<div class="contact-method-options">
							<label><span>☎</span><input type="radio" name="contact_method" value="phone" checked><span><?php esc_html_e( 'Enter Your Number', 'estatien' ); ?></span></label>
							<label><span>✉</span><input type="radio" name="contact_method" value="email"><span><?php esc_html_e( 'Enter Your Email', 'estatien' ); ?></span></label>
						</div>
					</fieldset>
				</div>
				<p><label for="property-message"><?php esc_html_e( 'Message', 'estatien' ); ?></label><textarea id="property-message" name="message" rows="5" placeholder="<?php esc_attr_e( 'Enter your Message here...', 'estatien' ); ?>" required></textarea></p>
				<div class="form-footer">
					<label class="checkbox-row" for="property-consent"><input id="property-consent" type="checkbox" name="consent" required><span><?php esc_html_e( 'I agree with Terms of Use and Privacy Policy', 'estatien' ); ?></span></label>
					<button class="button button-primary" type="submit"><?php esc_html_e( 'Send Your Message', 'estatien' ); ?></button>
				</div>
			</form>
		</section>

		<section class="section-block pricing-details" aria-labelledby="pricing-title">
			<div class="section-heading">
				<div>
					<span class="sparkles" aria-hidden="true"></span>
					<h2 id="pricing-title"><?php esc_html_e( 'Comprehensive Pricing Details', 'estatien' ); ?></h2>
					<p><?php esc_html_e( 'At Estatein, transparency is key. Review the costs associated with your property investment below.', 'estatien' ); ?></p>
				</div>
			</div>
			<div class="pricing-layout">
				<div class="pricing-price"><span><?php esc_html_e( 'Listing Price', 'estatien' ); ?></span><strong><?php echo esc_html( $price ? $price : '$1,250,000' ); ?></strong></div>
				<div class="pricing-card-stack">
					<?php foreach ( $pricing_sections as $heading => $items ) : ?>
						<div class="pricing-card">
							<h3><?php echo esc_html( $heading ); ?></h3>
							<div class="pricing-grid">
								<?php foreach ( $items as $fee ) : ?>
									<div><span><?php echo esc_html( $fee[0] ); ?></span><strong><?php echo esc_html( $fee[1] ); ?></strong><p><?php echo esc_html( $fee[2] ); ?></p></div>
								<?php endforeach; ?>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section>

		<section class="section-block" aria-labelledby="property-faq-title">
			<div class="section-heading">
				<div>
					<span class="sparkles" aria-hidden="true"></span>
					<h2 id="property-faq-title"><?php esc_html_e( 'Frequently Asked Questions', 'estatien' ); ?></h2>
					<p><?php esc_html_e( 'Find answers to common questions about browsing, buying, and contacting Estatein.', 'estatien' ); ?></p>
				</div>
			</div>
			<div class="card-grid">
				<?php foreach ( $faqs as $faq ) : ?>
					<article class="faq-card property-faq-card">
						<h3><?php echo esc_html( $faq[0] ); ?></h3>
						<p><?php echo esc_html( $faq[1] ); ?></p>
						<a class="button button-secondary" href="<?php echo esc_url( estatien_contact_url() ); ?>"><?php esc_html_e( 'Read More', 'estatien' ); ?></a>
					</article>
				<?php endforeach; ?>
			</div>
		</section>
	</section>
	<?php
endwhile;

get_template_part( 'template-parts/cta' );
get_footer();
