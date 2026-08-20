<?php
/**
 * Contact page template.
 *
 * Template Name: Contact Us
 *
 * @package Estatien
 */

get_header();

$contact_methods = array(
	array( '✉', 'info@estatein.com' ),
	array( '☎', '+1 (123) 456-7890' ),
	array( '⌖', __( 'Main Headquarters', 'estatien' ) ),
	array( '𝕏', __( 'Instagram LinkedIn Facebook', 'estatien' ) ),
);

$offices = array(
	array( __( 'Main Headquarters', 'estatien' ), __( '123 Estatein Plaza, City Center, Metropolis', 'estatien' ), __( 'Our main headquarters serve as the heart of Estatein. Located in the bustling city center, this is where our core team of experts operates.', 'estatien' ), 'info@estatein.com', '+1 (123) 456-7890' ),
	array( __( 'Regional Office', 'estatien' ), __( '456 Urban Avenue, Downtown District, Metropolis', 'estatien' ), __( 'Estatein’s presence extends to multiple regions, each with its own dynamic real estate landscape. Discover our regional offices staffed by local experts.', 'estatien' ), 'info@estatein.com', '+1 (123) 628-7890' ),
);
?>
<section class="section-container page-hero" aria-labelledby="contact-title">
	<div>
		<span class="sparkles" aria-hidden="true"></span>
		<h1 id="contact-title"><?php esc_html_e( 'Get in Touch with Estatein', 'estatien' ); ?></h1>
		<p><?php esc_html_e( 'Welcome to Estatein’s Contact Us page. We’re here to assist you with any inquiries, requests, or feedback you may have. Whether you’re looking to buy or sell a property, explore investment opportunities, or simply want to connect, we’re just a message away.', 'estatien' ); ?></p>
	</div>
</section>

<section class="feature-strip contact-methods" aria-label="<?php esc_attr_e( 'Contact methods', 'estatien' ); ?>">
	<?php foreach ( $contact_methods as $method ) : ?>
		<article class="feature-card">
			<span class="feature-arrow" aria-hidden="true">↗</span>
			<div class="feature-icon" aria-hidden="true"><?php echo esc_html( $method[0] ); ?></div>
			<h2><?php echo esc_html( $method[1] ); ?></h2>
		</article>
	<?php endforeach; ?>
</section>

<section class="section-container section-block contact-layout" aria-labelledby="contact-form-title">
	<div class="section-heading contact-heading">
		<div>
			<span class="sparkles" aria-hidden="true"></span>
			<h2 id="contact-form-title"><?php esc_html_e( 'Let’s Connect', 'estatien' ); ?></h2>
			<p><?php esc_html_e( 'Complete the form below and our real estate specialists will be ready to help with your next move.', 'estatien' ); ?></p>
		</div>
	</div>

	<form class="contact-form" action="<?php echo esc_url( estatien_contact_url() ); ?>" method="post">
		<div class="form-grid">
			<p>
				<label for="contact-first-name"><?php esc_html_e( 'First Name', 'estatien' ); ?></label>
				<input id="contact-first-name" name="first_name" type="text" autocomplete="given-name" placeholder="<?php esc_attr_e( 'Enter First Name', 'estatien' ); ?>" required>
			</p>
			<p>
				<label for="contact-last-name"><?php esc_html_e( 'Last Name', 'estatien' ); ?></label>
				<input id="contact-last-name" name="last_name" type="text" autocomplete="family-name" placeholder="<?php esc_attr_e( 'Enter Last Name', 'estatien' ); ?>" required>
			</p>
			<p>
				<label for="contact-email"><?php esc_html_e( 'Email', 'estatien' ); ?></label>
				<input id="contact-email" name="email" type="email" autocomplete="email" placeholder="<?php esc_attr_e( 'Enter your Email', 'estatien' ); ?>" required>
			</p>
			<p>
				<label for="contact-phone"><?php esc_html_e( 'Phone', 'estatien' ); ?></label>
				<input id="contact-phone" name="phone" type="tel" autocomplete="tel" placeholder="<?php esc_attr_e( 'Enter Phone Number', 'estatien' ); ?>">
			</p>
			<p>
				<label for="contact-interest"><?php esc_html_e( 'Inquiry Type', 'estatien' ); ?></label>
				<select id="contact-interest" name="interest" required>
					<option value=""><?php esc_html_e( 'Select Inquiry Type', 'estatien' ); ?></option>
					<option value="buying"><?php esc_html_e( 'Buying a Property', 'estatien' ); ?></option>
					<option value="selling"><?php esc_html_e( 'Selling a Property', 'estatien' ); ?></option>
					<option value="management"><?php esc_html_e( 'Property Management', 'estatien' ); ?></option>
					<option value="investment"><?php esc_html_e( 'Investment Guidance', 'estatien' ); ?></option>
				</select>
			</p>
			<p>
				<label for="contact-source"><?php esc_html_e( 'How Did You Hear About Us?', 'estatien' ); ?></label>
				<select id="contact-source" name="source">
					<option value=""><?php esc_html_e( 'Select', 'estatien' ); ?></option>
					<option value="search"><?php esc_html_e( 'Search Engine', 'estatien' ); ?></option>
					<option value="social"><?php esc_html_e( 'Social Media', 'estatien' ); ?></option>
					<option value="referral"><?php esc_html_e( 'Referral', 'estatien' ); ?></option>
				</select>
			</p>
		</div>
		<p>
			<label for="contact-message"><?php esc_html_e( 'Message', 'estatien' ); ?></label>
			<textarea id="contact-message" name="message" rows="6" placeholder="<?php esc_attr_e( 'Enter your Message here...', 'estatien' ); ?>" required></textarea>
		</p>
		<div class="form-footer">
			<label class="checkbox-row" for="contact-consent">
				<input id="contact-consent" name="consent" type="checkbox" required>
				<span><?php esc_html_e( 'I agree with Terms of Use and Privacy Policy', 'estatien' ); ?></span>
			</label>
			<button class="button button-primary" type="submit"><?php esc_html_e( 'Send Your Message', 'estatien' ); ?></button>
		</div>
	</form>
</section>

<section class="section-container section-block" aria-labelledby="offices-title">
	<div class="section-heading">
		<div>
			<span class="sparkles" aria-hidden="true"></span>
			<h2 id="offices-title"><?php esc_html_e( 'Discover Our Office Locations', 'estatien' ); ?></h2>
			<p><?php esc_html_e( 'Estatein is here to serve you across multiple locations. Whether you’re looking to meet our team, discuss real estate opportunities, or simply drop by for a chat, we have offices conveniently located to serve your needs.', 'estatien' ); ?></p>
		</div>
	</div>
	<div class="office-tabs" aria-hidden="true"><span>All</span><span>Regional</span><span>International</span></div>
	<div class="card-grid office-grid">
		<?php foreach ( $offices as $office ) : ?>
			<article class="about-card office-card">
				<span><?php echo esc_html( $office[0] ); ?></span>
				<h3><?php echo esc_html( $office[1] ); ?></h3>
				<p><?php echo esc_html( $office[2] ); ?></p>
				<div class="office-contact-row"><span>✉ <?php echo esc_html( $office[3] ); ?></span><span>☎ <?php echo esc_html( $office[4] ); ?></span><span>📍 Metropolis</span></div>
				<a class="button button-primary" href="<?php echo esc_url( estatien_contact_url() ); ?>"><?php esc_html_e( 'Get Direction', 'estatien' ); ?></a>
			</article>
		<?php endforeach; ?>
	</div>
</section>
<section class="section-container section-block contact-world" aria-labelledby="world-title">
	<div class="world-collage">
		<img class="world-office" src="<?php echo esc_url( estatien_asset( 'images/contact-world-office.png' ) ); ?>" alt="<?php esc_attr_e( 'Estatein office workspace', 'estatien' ); ?>" loading="lazy">
		<img class="world-team-wide" src="<?php echo esc_url( estatien_asset( 'images/contact-world-team-wide.png' ) ); ?>" alt="<?php esc_attr_e( 'Estatein team members', 'estatien' ); ?>" loading="lazy">
		<img class="world-meeting" src="<?php echo esc_url( estatien_asset( 'images/contact-world-meeting.png' ) ); ?>" alt="<?php esc_attr_e( 'Estatein team planning session', 'estatien' ); ?>" loading="lazy">
		<img class="world-team-left" src="<?php echo esc_url( estatien_asset( 'images/contact-world-team-left.png' ) ); ?>" alt="<?php esc_attr_e( 'Estatein consultants', 'estatien' ); ?>" loading="lazy">
		<img class="world-team-right" src="<?php echo esc_url( estatien_asset( 'images/contact-world-team-right.png' ) ); ?>" alt="<?php esc_attr_e( 'Estatein advisory team', 'estatien' ); ?>" loading="lazy">
		<div class="world-copy">
			<span class="sparkles" aria-hidden="true"></span>
			<h2 id="world-title"><?php esc_html_e( "Explore Estatein's World", 'estatien' ); ?></h2>
			<p><?php esc_html_e( 'Step inside the world of Estatein, where professionalism meets warmth, and expertise meets passion. Our gallery offers a glimpse into our team and workspaces.', 'estatien' ); ?></p>
		</div>
		<img class="world-handshake" src="<?php echo esc_url( estatien_asset( 'images/contact-world-handshake.png' ) ); ?>" alt="<?php esc_attr_e( 'Estatein client consultation', 'estatien' ); ?>" loading="lazy">
	</div>
</section>
<?php
get_template_part( 'template-parts/cta' );
get_footer();
