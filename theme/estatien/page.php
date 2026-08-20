<?php
/**
 * Page template.
 *
 * @package Estatien
 */

get_header();
?>
<section class="section-container page-content">
	<?php while ( have_posts() ) : the_post(); ?>
		<article <?php post_class( 'content-card' ); ?>>
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		</article>
	<?php endwhile; ?>
</section>
<?php
get_footer();
