<?php
/**
 * Estatien Trial theme setup and CMS features.
 *
 * @package Estatien
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function estatien_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
	);

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'estatien' ),
			'footer'  => __( 'Footer Menu', 'estatien' ),
		)
	);
}
add_action( 'after_setup_theme', 'estatien_setup' );

function estatien_assets() {
	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style(
		'estatien-fonts',
		'https://fonts.googleapis.com/css2?family=Urbanist:wght@400;500;600;700&display=swap',
		array(),
		null
	);
	wp_enqueue_style(
		'estatien-main',
		get_template_directory_uri() . '/assets/css/main.css',
		array( 'estatien-fonts' ),
		$theme_version
	);
	wp_enqueue_script(
		'estatien-main',
		get_template_directory_uri() . '/assets/js/main.js',
		array(),
		$theme_version,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'estatien_assets' );

function estatien_register_property_cpt() {
	$labels = array(
		'name'          => __( 'Properties', 'estatien' ),
		'singular_name' => __( 'Property', 'estatien' ),
		'add_new_item'  => __( 'Add New Property', 'estatien' ),
		'edit_item'     => __( 'Edit Property', 'estatien' ),
	);

	register_post_type(
		'property',
		array(
			'labels'       => $labels,
			'public'       => true,
			'has_archive'  => true,
			'menu_icon'    => 'dashicons-building',
			'rewrite'      => array( 'slug' => 'properties' ),
			'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
			'show_in_rest' => true,
		)
	);
}
add_action( 'init', 'estatien_register_property_cpt' );

function estatien_property_meta_fields() {
	return array(
		'estatien_price'     => __( 'Price', 'estatien' ),
		'estatien_location'  => __( 'Location', 'estatien' ),
		'estatien_bedrooms'  => __( 'Bedrooms', 'estatien' ),
		'estatien_bathrooms' => __( 'Bathrooms', 'estatien' ),
		'estatien_type'      => __( 'Property Type', 'estatien' ),
	);
}

function estatien_add_property_meta_box() {
	add_meta_box(
		'estatien_property_details',
		__( 'Property Details', 'estatien' ),
		'estatien_render_property_meta_box',
		'property',
		'normal',
		'default'
	);
}
add_action( 'add_meta_boxes', 'estatien_add_property_meta_box' );

function estatien_render_property_meta_box( $post ) {
	wp_nonce_field( 'estatien_save_property_meta', 'estatien_property_meta_nonce' );

	foreach ( estatien_property_meta_fields() as $key => $label ) {
		$value = get_post_meta( $post->ID, $key, true );
		?>
		<p>
			<label for="<?php echo esc_attr( $key ); ?>"><strong><?php echo esc_html( $label ); ?></strong></label><br>
			<input class="widefat" type="text" id="<?php echo esc_attr( $key ); ?>" name="<?php echo esc_attr( $key ); ?>" value="<?php echo esc_attr( $value ); ?>">
		</p>
		<?php
	}
}

function estatien_save_property_meta( $post_id ) {
	if (
		! isset( $_POST['estatien_property_meta_nonce'] ) ||
		! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['estatien_property_meta_nonce'] ) ), 'estatien_save_property_meta' )
	) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	foreach ( array_keys( estatien_property_meta_fields() ) as $key ) {
		if ( isset( $_POST[ $key ] ) ) {
			$value = sanitize_text_field( wp_unslash( $_POST[ $key ] ) );
			if ( '' === $value ) {
				delete_post_meta( $post_id, $key );
			} else {
				update_post_meta( $post_id, $key, $value );
			}
		}
	}
}
add_action( 'save_post_property', 'estatien_save_property_meta' );

function estatien_asset( $path ) {
	return esc_url( get_template_directory_uri() . '/assets/' . ltrim( $path, '/' ) );
}

function estatien_section_url( $anchor ) {
	$anchor = ltrim( $anchor, '#' );

	return esc_url( home_url( '/#' . $anchor ) );
}

function estatien_properties_url() {
	return esc_url( home_url( '/properties/' ) );
}

function estatien_static_routes() {
	return array(
		'about-us'   => 'page-about-us.php',
		'services'   => 'page-services.php',
		'contact-us' => 'page-contact-us.php',
	);
}

function estatien_route_path() {
	if ( empty( $_SERVER['REQUEST_URI'] ) ) {
		return '';
	}

	$request_path = wp_parse_url( sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) ), PHP_URL_PATH );

	return trim( (string) $request_path, '/' );
}

function estatien_is_static_route() {
	return array_key_exists( estatien_route_path(), estatien_static_routes() );
}

function estatien_static_route_template( $template ) {
	if ( estatien_is_static_route() ) {
		$templates      = estatien_static_routes();
		$route_template = locate_template( $templates[ estatien_route_path() ] );

		if ( $route_template ) {
			status_header( 200 );
			return $route_template;
		}
	}

	return $template;
}
add_filter( 'template_include', 'estatien_static_route_template' );

function estatien_static_route_404_status( $preempt, $query ) {
	if ( $query->is_main_query() && estatien_is_static_route() ) {
		status_header( 200 );
		return true;
	}

	return $preempt;
}
add_filter( 'pre_handle_404', 'estatien_static_route_404_status', 10, 2 );

function estatien_page_url( $slug ) {
	$page = get_page_by_path( $slug );

	return $page ? esc_url( get_permalink( $page ) ) : esc_url( home_url( '/' . trim( $slug, '/' ) . '/' ) );
}

function estatien_about_url() {
	return estatien_page_url( 'about-us' );
}

function estatien_services_url() {
	return estatien_page_url( 'services' );
}

function estatien_contact_url() {
	return estatien_page_url( 'contact-us' );
}

function estatien_default_menu( $args = null ) {
	$items = array(
		'Home'       => home_url( '/' ),
		'About Us'   => estatien_about_url(),
		'Properties' => estatien_properties_url(),
		'Services'   => estatien_services_url(),
	);
	$current_path = estatien_route_path();

	foreach ( $items as $label => $url ) {
		$item_path = trim( (string) wp_parse_url( $url, PHP_URL_PATH ), '/' );
		$is_home   = '' === $item_path && '' === $current_path;
		$is_active = $is_home || ( '' !== $item_path && ( $item_path === $current_path || str_starts_with( $current_path, $item_path . '/' ) ) );

		printf(
			'<li%1$s><a href="%2$s">%3$s</a></li>',
			$is_active ? ' class="is-current"' : '',
			esc_url( $url ),
			esc_html( $label )
		);
	}
}

function estatien_render_property_card( $post_id ) {
	$price     = get_post_meta( $post_id, 'estatien_price', true );
	$location  = get_post_meta( $post_id, 'estatien_location', true );
	$bedrooms  = get_post_meta( $post_id, 'estatien_bedrooms', true );
	$bathrooms = get_post_meta( $post_id, 'estatien_bathrooms', true );
	$type      = get_post_meta( $post_id, 'estatien_type', true );
	?>
	<article class="property-card">
		<a href="<?php echo esc_url( get_permalink( $post_id ) ); ?>" class="property-image">
			<?php
			if ( has_post_thumbnail( $post_id ) ) {
				echo get_the_post_thumbnail( $post_id, 'large', array( 'loading' => 'lazy' ) );
			}
			?>
		</a>
		<h3><a href="<?php echo esc_url( get_permalink( $post_id ) ); ?>"><?php echo esc_html( get_the_title( $post_id ) ); ?></a></h3>
		<?php if ( $location ) : ?>
			<p class="property-location"><?php echo esc_html( $location ); ?></p>
		<?php endif; ?>
		<p><?php echo esc_html( get_the_excerpt( $post_id ) ); ?></p>
		<div class="property-meta">
			<?php if ( $bedrooms ) : ?>
				<span>🛏 <?php echo esc_html( $bedrooms ); ?>-<?php esc_html_e( 'Bedroom', 'estatien' ); ?></span>
			<?php endif; ?>
			<?php if ( $bathrooms ) : ?>
				<span>🛁 <?php echo esc_html( $bathrooms ); ?>-<?php esc_html_e( 'Bathroom', 'estatien' ); ?></span>
			<?php endif; ?>
			<?php if ( $type ) : ?>
				<span>🏢 <?php echo esc_html( $type ); ?></span>
			<?php endif; ?>
		</div>
		<div class="property-bottom">
			<div><span><?php esc_html_e( 'Price', 'estatien' ); ?></span><strong><?php echo esc_html( $price ? $price : __( 'Contact Us', 'estatien' ) ); ?></strong></div>
			<a class="button button-primary" href="<?php echo esc_url( get_permalink( $post_id ) ); ?>"><?php esc_html_e( 'View Property Details', 'estatien' ); ?></a>
		</div>
	</article>
	<?php
}
