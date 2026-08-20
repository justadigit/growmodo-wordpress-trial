<?php
/**
 * Property archive template.
 *
 * @package Estatien
 */

get_header();

$property_archive_query = new WP_Query(
	array(
		'post_type'      => 'property',
		'posts_per_page' => 3,
		'post_status'    => 'publish',
		'orderby'        => array(
			'menu_order' => 'ASC',
			'date'       => 'ASC',
		),
	)
);
?>
<section class="section-container page-hero property-archive-hero" aria-labelledby="property-archive-title">
	<div>
		<span class="sparkles" aria-hidden="true"></span>
		<h1 id="property-archive-title"><?php esc_html_e( 'Find Your Dream Property', 'estatien' ); ?></h1>
		<p><?php esc_html_e( 'Welcome to Estatein, where your dream property awaits in every corner of our beautiful world. Explore our curated selection of properties, each offering a unique story and a chance to redefine your life.', 'estatien' ); ?></p>
	</div>
</section>

<section class="property-search-band section-container" aria-labelledby="property-search-title">
	<h2 class="screen-reader-text" id="property-search-title"><?php esc_html_e( 'Search properties', 'estatien' ); ?></h2>
	<form class="property-search-form" action="<?php echo esc_url( estatien_properties_url() ); ?>" method="get" role="search">
		<label class="screen-reader-text" for="property-search-input"><?php esc_html_e( 'Search for a property', 'estatien' ); ?></label>
		<input id="property-search-input" name="s" type="search" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="<?php esc_attr_e( 'Search For A Property', 'estatien' ); ?>">
		<button class="button button-primary" type="submit"><span class="search-icon" aria-hidden="true"></span><?php esc_html_e( 'Find Property', 'estatien' ); ?></button>
	</form>
	<div class="property-filter-row" aria-label="<?php esc_attr_e( 'Property search filters shown in the design', 'estatien' ); ?>">
		<?php
		$filters = array(
			array( 'location', __( 'Location', 'estatien' ) ),
			array( 'type', __( 'Property Type', 'estatien' ) ),
			array( 'price', __( 'Pricing Range', 'estatien' ) ),
			array( 'size', __( 'Property Size', 'estatien' ) ),
			array( 'year', __( 'Build Year', 'estatien' ) ),
		);
		foreach ( $filters as $filter ) :
			?>
			<div class="property-filter-pill">
				<span class="filter-icon filter-icon-<?php echo esc_attr( $filter[0] ); ?>" aria-hidden="true"></span>
				<strong><?php echo esc_html( $filter[1] ); ?></strong>
				<span class="filter-chevron" aria-hidden="true"></span>
			</div>
		<?php endforeach; ?>
	</div>
</section>

<section class="section-container section-block property-archive" aria-labelledby="property-list-title">
	<div class="section-heading">
		<div>
			<span class="sparkles" aria-hidden="true"></span>
			<h2 id="property-list-title"><?php esc_html_e( 'Discover a World of Possibilities', 'estatien' ); ?></h2>
			<p><?php esc_html_e( 'Our portfolio of properties is as diverse as your dreams. Explore the following categories to find the perfect property that resonates with your vision of home.', 'estatien' ); ?></p>
		</div>
	</div>

	<?php if ( $property_archive_query->have_posts() ) : ?>
		<div class="card-grid property-grid">
			<?php
			while ( $property_archive_query->have_posts() ) :
				$property_archive_query->the_post();
				$price     = get_post_meta( get_the_ID(), 'estatien_price', true );
				$location  = get_post_meta( get_the_ID(), 'estatien_location', true );
				$bedrooms  = get_post_meta( get_the_ID(), 'estatien_bedrooms', true );
				$bathrooms = get_post_meta( get_the_ID(), 'estatien_bathrooms', true );
				$type      = get_post_meta( get_the_ID(), 'estatien_type', true );
				?>
				<article class="property-card archive-property-card">
					<a href="<?php the_permalink(); ?>" class="property-image">
						<?php if ( has_post_thumbnail() ) : ?>
							<?php the_post_thumbnail( 'large', array( 'loading' => 'lazy' ) ); ?>
						<?php endif; ?>
					</a>
					<?php if ( $type || $location ) : ?>
						<p class="property-tag"><?php echo esc_html( $type ? $type : $location ); ?></p>
					<?php endif; ?>
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<p><?php echo esc_html( get_the_excerpt() ); ?> <a href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read More', 'estatien' ); ?></a></p>
					<div class="property-meta">
						<?php if ( $bedrooms ) : ?><span>🛏 <?php echo esc_html( $bedrooms ); ?>-<?php esc_html_e( 'Bedroom', 'estatien' ); ?></span><?php endif; ?>
						<?php if ( $bathrooms ) : ?><span>🛁 <?php echo esc_html( $bathrooms ); ?>-<?php esc_html_e( 'Bathroom', 'estatien' ); ?></span><?php endif; ?>
						<?php if ( $type ) : ?><span>🏢 <?php echo esc_html( $type ); ?></span><?php endif; ?>
					</div>
					<div class="property-bottom">
						<div><span><?php esc_html_e( 'Price', 'estatien' ); ?></span><strong><?php echo esc_html( $price ? $price : __( 'Contact Us', 'estatien' ) ); ?></strong></div>
						<a class="button button-primary" href="<?php the_permalink(); ?>"><?php esc_html_e( 'View Property Details', 'estatien' ); ?></a>
					</div>
				</article>
				<?php
			endwhile;
			wp_reset_postdata();
			?>
		</div>
		<div class="section-pager" aria-hidden="true"><span><strong>01</strong> of 10</span><span class="pager-buttons"><span>←</span><span>→</span></span></div>
	<?php else : ?>
		<div class="content-card">
			<h2><?php esc_html_e( 'No properties published yet.', 'estatien' ); ?></h2>
			<p><?php esc_html_e( 'Add Property posts in the WordPress admin to populate this archive.', 'estatien' ); ?></p>
		</div>
	<?php endif; ?>
</section>
<section class="section-container section-block archive-inquiry" aria-labelledby="archive-inquiry-title">
	<div class="section-heading">
		<div>
			<span class="sparkles" aria-hidden="true"></span>
			<h2 id="archive-inquiry-title"><?php esc_html_e( "Let's Make it Happen", 'estatien' ); ?></h2>
			<p><?php esc_html_e( 'Ready to take the first step toward your dream property? Fill out the form below, and our real estate wizards will work their magic to find your perfect match.', 'estatien' ); ?></p>
		</div>
	</div>
	<form class="contact-form property-inquiry-form" action="<?php echo esc_url( estatien_properties_url() ); ?>" method="get">
		<div class="form-grid">
			<p><label for="archive-first-name"><?php esc_html_e( 'First Name', 'estatien' ); ?></label><input id="archive-first-name" type="text" name="first_name" placeholder="<?php esc_attr_e( 'Enter First Name', 'estatien' ); ?>"></p>
			<p><label for="archive-last-name"><?php esc_html_e( 'Last Name', 'estatien' ); ?></label><input id="archive-last-name" type="text" name="last_name" placeholder="<?php esc_attr_e( 'Enter Last Name', 'estatien' ); ?>"></p>
			<p><label for="archive-email"><?php esc_html_e( 'Email', 'estatien' ); ?></label><input id="archive-email" type="email" name="email" placeholder="<?php esc_attr_e( 'Enter your Email', 'estatien' ); ?>"></p>
			<p><label for="archive-phone"><?php esc_html_e( 'Phone', 'estatien' ); ?></label><input id="archive-phone" type="tel" name="phone" placeholder="<?php esc_attr_e( 'Enter Phone Number', 'estatien' ); ?>"></p>
			<p><label for="archive-location"><?php esc_html_e( 'Preferred Location', 'estatien' ); ?></label><select id="archive-location" name="location"><option value=""><?php esc_html_e( 'Select Location', 'estatien' ); ?></option></select></p>
			<p><label for="archive-type"><?php esc_html_e( 'Property Type', 'estatien' ); ?></label><select id="archive-type" name="type"><option value=""><?php esc_html_e( 'Select Property Type', 'estatien' ); ?></option></select></p>
			<p><label for="archive-bathrooms"><?php esc_html_e( 'No. of Bathrooms', 'estatien' ); ?></label><select id="archive-bathrooms" name="bathrooms"><option value=""><?php esc_html_e( 'Select no. of Bathrooms', 'estatien' ); ?></option></select></p>
			<p><label for="archive-bedrooms"><?php esc_html_e( 'No. of Bedrooms', 'estatien' ); ?></label><select id="archive-bedrooms" name="bedrooms"><option value=""><?php esc_html_e( 'Select no. of Bedrooms', 'estatien' ); ?></option></select></p>
		</div>
		<div class="property-form-split">
			<p><label for="archive-budget"><?php esc_html_e( 'Budget', 'estatien' ); ?></label><select id="archive-budget" name="budget"><option value=""><?php esc_html_e( 'Select Budget', 'estatien' ); ?></option></select></p>
			<fieldset><legend><?php esc_html_e( 'Preferred Contact Method', 'estatien' ); ?></legend><div class="contact-method-options"><label><span>☎</span><input type="radio" name="contact_method" value="phone" checked><span><?php esc_html_e( 'Enter Your Number', 'estatien' ); ?></span></label><label><span>✉</span><input type="radio" name="contact_method" value="email"><span><?php esc_html_e( 'Enter Your Email', 'estatien' ); ?></span></label></div></fieldset>
		</div>
		<p><label for="archive-message"><?php esc_html_e( 'Message', 'estatien' ); ?></label><textarea id="archive-message" name="message" rows="5" placeholder="<?php esc_attr_e( 'Enter your Message here...', 'estatien' ); ?>"></textarea></p>
		<div class="form-footer"><label class="checkbox-row" for="archive-consent"><input id="archive-consent" type="checkbox" name="consent"><span><?php esc_html_e( 'I agree with Terms of Use and Privacy Policy', 'estatien' ); ?></span></label><button class="button button-primary" type="submit"><?php esc_html_e( 'Send Your Message', 'estatien' ); ?></button></div>
	</form>
</section>
<?php get_template_part( 'template-parts/cta' ); ?>
<?php
get_footer();
