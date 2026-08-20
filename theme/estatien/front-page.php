<?php
/**
 * Front page template.
 *
 * @package Estatien
 */

get_header();

get_template_part( 'template-parts/hero' );
get_template_part( 'template-parts/features' );
get_template_part( 'template-parts/featured-properties' );
get_template_part( 'template-parts/testimonials' );
get_template_part( 'template-parts/faq' );
get_template_part( 'template-parts/cta' );

get_footer();
