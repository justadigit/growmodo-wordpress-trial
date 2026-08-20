<?php
/**
 * One-off local demo content seed for the assessment.
 *
 * Run inside the WordPress container:
 * php /var/www/html/wp-content/themes/estatien/tools/seed-demo-content.php
 *
 * @package Estatien
 */

$wp_load = dirname( __DIR__, 4 ) . '/wp-load.php';

if ( ! file_exists( $wp_load ) ) {
	fwrite( STDERR, "wp-load.php was not found. Run this script inside the WordPress container.\n" );
	exit( 1 );
}

require_once $wp_load;
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/image.php';
require_once ABSPATH . 'wp-admin/includes/media.php';

function estatien_seed_page( $title, $slug, $template ) {
	$page = get_page_by_path( $slug, OBJECT, 'page' );

	if ( $page ) {
		update_post_meta( $page->ID, '_wp_page_template', $template );
		return $page->ID;
	}

	$page_id = wp_insert_post(
		array(
			'post_title'   => $title,
			'post_name'    => $slug,
			'post_type'    => 'page',
			'post_status'  => 'publish',
			'post_content' => '',
		),
		true
	);

	if ( is_wp_error( $page_id ) ) {
		fwrite( STDERR, $page_id->get_error_message() . "\n" );
		return 0;
	}

	update_post_meta( $page_id, '_wp_page_template', $template );

	return $page_id;
}

function estatien_seed_attachment( $filename, $post_id ) {
	$title = pathinfo( $filename, PATHINFO_FILENAME );
	$found = get_posts(
		array(
			'post_type'      => 'attachment',
			'post_status'    => 'inherit',
			'title'          => $title,
			'posts_per_page' => 1,
			'fields'         => 'ids',
		)
	);

	if ( $found ) {
		return (int) $found[0];
	}

	$source = dirname( __DIR__ ) . '/assets/images/' . $filename;

	if ( ! file_exists( $source ) ) {
		return 0;
	}

	$upload = wp_upload_bits( basename( $source ), null, file_get_contents( $source ) );

	if ( ! empty( $upload['error'] ) ) {
		fwrite( STDERR, $upload['error'] . "\n" );
		return 0;
	}

	$filetype      = wp_check_filetype( $upload['file'] );
	$attachment_id = wp_insert_attachment(
		array(
			'post_mime_type' => $filetype['type'],
			'post_title'     => $title,
			'post_content'   => '',
			'post_status'    => 'inherit',
		),
		$upload['file'],
		$post_id
	);

	if ( is_wp_error( $attachment_id ) ) {
		fwrite( STDERR, $attachment_id->get_error_message() . "\n" );
		return 0;
	}

	wp_update_attachment_metadata( $attachment_id, wp_generate_attachment_metadata( $attachment_id, $upload['file'] ) );

	return $attachment_id;
}

function estatien_seed_property( $property ) {
	$existing = get_page_by_path( $property['slug'], OBJECT, 'property' );

	if ( $existing ) {
		$post_id = $existing->ID;
		wp_update_post(
			array(
				'ID'           => $post_id,
				'post_excerpt' => $property['excerpt'],
				'post_content' => $property['content'],
				'menu_order'   => $property['order'],
			)
		);
	} else {
		$post_id = wp_insert_post(
			array(
				'post_title'   => $property['title'],
				'post_name'    => $property['slug'],
				'post_type'    => 'property',
				'post_status'  => 'publish',
				'post_excerpt' => $property['excerpt'],
				'post_content' => $property['content'],
				'menu_order'   => $property['order'],
			),
			true
		);

		if ( is_wp_error( $post_id ) ) {
			fwrite( STDERR, $post_id->get_error_message() . "\n" );
			return;
		}
	}

	foreach ( $property['meta'] as $key => $value ) {
		update_post_meta( $post_id, $key, $value );
	}

	if ( ! has_post_thumbnail( $post_id ) ) {
		$attachment_id = estatien_seed_attachment( $property['image'], $post_id );

		if ( $attachment_id ) {
			set_post_thumbnail( $post_id, $attachment_id );
		}
	}
}

estatien_seed_page( 'About Us', 'about-us', 'page-about-us.php' );
estatien_seed_page( 'Services', 'services', 'page-services.php' );
estatien_seed_page( 'Contact Us', 'contact-us', 'page-contact-us.php' );

$properties = array(
	array(
		'title'   => 'Seaside Serenity Villa',
		'slug'    => 'seaside-serenity-villa',
		'order'   => 1,
		'excerpt' => 'Wake up to the soothing melody of waves. This beachfront villa offers refined coastal living.',
		'content' => 'A refined coastal residence with bright living spaces, generous outdoor areas, and easy access to nearby amenities. Designed for comfort, privacy, and relaxed everyday living.',
		'image'   => 'property-seaside.png',
		'meta'    => array(
			'estatien_price'     => '$1,250,000',
			'estatien_location'  => 'Malibu, California',
			'estatien_bedrooms'  => '4',
			'estatien_bathrooms' => '3',
			'estatien_type'      => 'Villa',
		),
	),
	array(
		'title'   => 'Metropolitan Haven',
		'slug'    => 'metropolitan-haven',
		'order'   => 2,
		'excerpt' => 'Immerse yourself in the energy of the city. This modern apartment is in the heart of it all.',
		'content' => 'A modern city apartment with refined finishes, open-plan living, and sweeping skyline views. Ideal for buyers who want convenience, design, and connection to the city.',
		'image'   => 'property-metropolitan.png',
		'meta'    => array(
			'estatien_price'     => '$650,000',
			'estatien_location'  => 'New York, New York',
			'estatien_bedrooms'  => '2',
			'estatien_bathrooms' => '2',
			'estatien_type'      => 'Apartment',
		),
	),
	array(
		'title'   => 'Rustic Retreat Cottage',
		'slug'    => 'rustic-retreat-cottage',
		'order'   => 3,
		'excerpt' => 'Find tranquility in the countryside. This charming cottage is nestled amid rolling hills.',
		'content' => 'A warm mountain retreat with thoughtful interiors, practical amenities, and access to quiet surroundings. Built for comfortable stays and long-term value.',
		'image'   => 'property-rustic.png',
		'meta'    => array(
			'estatien_price'     => '$350,000',
			'estatien_location'  => 'Aspen, Colorado',
			'estatien_bedrooms'  => '3',
			'estatien_bathrooms' => '3',
			'estatien_type'      => 'Cottage',
		),
	),
);

foreach ( $properties as $property ) {
	estatien_seed_property( $property );
}

update_option( 'permalink_structure', '/%postname%/' );
flush_rewrite_rules();

echo "Demo pages, properties, and permalinks are ready.\n";
