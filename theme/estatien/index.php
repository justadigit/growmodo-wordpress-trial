<?php
/**
 * Default template.
 *
 * @package Estatien
 */

get_header();
?>
<section class="section-container page-content">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<article <?php post_class( 'content-card' ); ?>>
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
			</article>
		<?php endwhile; ?>
	<?php else : ?>
		<h1><?php esc_html_e( 'Nothing Found', 'estatien' ); ?></h1>
	<?php endif; ?>
</section>
<?php
get_footer();
