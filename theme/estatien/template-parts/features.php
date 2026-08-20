<?php
/**
 * Feature cards.
 *
 * @package Estatien
 */

$features = array(
	array( 'Find Your Dream Home', 'icon-feature-home.svg' ),
	array( 'Unlock Property Value', 'icon-feature-value.svg' ),
	array( 'Effortless Property Management', 'icon-feature-management.svg' ),
	array( 'Smart Investments, Informed Decisions', 'icon-feature-investment.svg' ),
);
?>
<section class="feature-strip" id="features" aria-label="<?php esc_attr_e( 'Estatein services', 'estatien' ); ?>">
	<?php foreach ( $features as $feature ) : ?>
		<div class="feature-card">
			<span class="feature-icon">
				<img src="<?php echo estatien_asset( 'images/' . $feature[1] ); ?>" alt="" width="34" height="34" loading="lazy">
			</span>
			<strong><?php echo esc_html( $feature[0] ); ?></strong>
			<span class="feature-arrow" aria-hidden="true">↗</span>
		</div>
	<?php endforeach; ?>
</section>
