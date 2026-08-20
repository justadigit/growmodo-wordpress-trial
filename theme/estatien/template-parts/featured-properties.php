<?php
/**
 * Featured properties section.
 *
 * @package Estatien
 */

$fallback_properties = array(
	array(
		'title'     => 'Seaside Serenity Villa',
		'excerpt'   => 'A stunning 4-bedroom, 3-bathroom villa in a peaceful suburban neighborhood...',
		'image'     => 'property-seaside.png',
		'price'     => '$550,000',
		'location'  => 'Malibu, California',
		'bedrooms'  => '4',
		'bathrooms' => '3',
		'type'      => 'Villa',
	),
	array(
		'title'     => 'Metropolitan Haven',
		'excerpt'   => 'A chic and fully-furnished 2-bedroom apartment with panoramic city views...',
		'image'     => 'property-metropolitan.png',
		'price'     => '$550,000',
		'location'  => 'New York, New York',
		'bedrooms'  => '2',
		'bathrooms' => '2',
		'type'      => 'Apartment',
	),
	array(
		'title'     => 'Rustic Retreat Cottage',
		'excerpt'   => 'An elegant 3-bedroom, 2.5-bathroom townhouse in a gated community...',
		'image'     => 'property-rustic.png',
		'price'     => '$550,000',
		'location'  => 'Aspen, Colorado',
		'bedrooms'  => '3',
		'bathrooms' => '3',
		'type'      => 'Cottage',
	),
);

$property_query = new WP_Query(
	array(
		'post_type'      => 'property',
		'posts_per_page' => 3,
		'post_status'    => 'publish',
	)
);
?>
<section class="section-container section-block" id="properties" aria-labelledby="properties-title">
	<div class="section-heading">
		<div>
			<span class="sparkles" aria-hidden="true"></span>
			<h2 id="properties-title"><?php esc_html_e( 'Featured Properties', 'estatien' ); ?></h2>
			<p><?php esc_html_e( 'Explore our handpicked selection of featured properties. Each listing offers a glimpse into exceptional homes and investments available through Estatein. Click "View Details" for more information.', 'estatien' ); ?></p>
		</div>
		<a class="button button-secondary" href="<?php echo esc_url( get_post_type_archive_link( 'property' ) ); ?>"><?php esc_html_e( 'View All Properties', 'estatien' ); ?></a>
	</div>
	<div class="card-grid property-grid">
		<?php if ( $property_query->have_posts() ) : ?>
			<?php while ( $property_query->have_posts() ) : $property_query->the_post(); ?>
				<?php estatien_render_property_card( get_the_ID() ); ?>
			<?php endwhile; wp_reset_postdata(); ?>
		<?php else : ?>
			<?php foreach ( $fallback_properties as $property ) : ?>
				<article class="property-card">
					<img class="property-image" src="<?php echo estatien_asset( 'images/' . $property['image'] ); ?>" alt="<?php echo esc_attr( $property['title'] ); ?>" loading="lazy">
					<h3><?php echo esc_html( $property['title'] ); ?></h3>
					<p class="property-location"><?php echo esc_html( $property['location'] ); ?></p>
					<p><?php echo esc_html( $property['excerpt'] ); ?></p>
					<div class="property-meta">
						<span>🛏 <?php echo esc_html( $property['bedrooms'] ); ?>-<?php esc_html_e( 'Bedroom', 'estatien' ); ?></span>
						<span>🛁 <?php echo esc_html( $property['bathrooms'] ); ?>-<?php esc_html_e( 'Bathroom', 'estatien' ); ?></span>
						<span>🏢 <?php echo esc_html( $property['type'] ); ?></span>
					</div>
					<div class="property-bottom">
						<div><span><?php esc_html_e( 'Price', 'estatien' ); ?></span><strong><?php echo esc_html( $property['price'] ); ?></strong></div>
						<a class="button button-primary" href="<?php echo estatien_properties_url(); ?>"><?php esc_html_e( 'View Properties', 'estatien' ); ?></a>
					</div>
				</article>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
	<div class="section-pager" aria-hidden="true"><span><strong>01</strong> of 60</span><span class="pager-buttons"><span>←</span><span>→</span></span></div>
</section>
