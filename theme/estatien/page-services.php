<?php
/**
 * Services page template.
 *
 * Template Name: Services
 *
 * @package Estatien
 */

get_header();

$services = array(
	array( 'icon-feature-home.svg', __( 'Find Your Dream Home', 'estatien' ), __( 'Explore a curated portfolio of homes matched to your lifestyle, location, and budget.', 'estatien' ) ),
	array( 'icon-feature-value.svg', __( 'Unlock Property Value', 'estatien' ), __( 'Understand market potential with practical pricing guidance and local insight.', 'estatien' ) ),
	array( 'icon-feature-management.svg', __( 'Effortless Property Management', 'estatien' ), __( 'Keep your investment cared for with tenant coordination, upkeep, and clear reporting.', 'estatien' ) ),
	array( 'icon-feature-investment.svg', __( 'Smart Investments', 'estatien' ), __( 'Make confident decisions with research-backed opportunities and portfolio planning.', 'estatien' ) ),
);

$valuation = array(
	array( '◔', __( 'Valuation Mastery', 'estatien' ), __( 'Discover the true worth of your property with our expert valuation services.', 'estatien' ) ),
	array( '◑', __( 'Strategic Marketing', 'estatien' ), __( 'Selling a property requires more than a listing. It requires a strategy that speaks to the right buyers.', 'estatien' ) ),
	array( '◒', __( 'Negotiation Wizardry', 'estatien' ), __( 'Negotiating the best deal is an art, and our negotiators are masters of it.', 'estatien' ) ),
	array( '✦', __( 'Closing Success', 'estatien' ), __( 'A successful sale is not complete until closing. We guide you through the intricate closing process.', 'estatien' ) ),
);

$management = array(
	array( '✥', __( 'Tenant Harmony', 'estatien' ), __( 'Our tenant management services ensure that your tenants have a smooth and reducing vacancies.', 'estatien' ) ),
	array( '♜', __( 'Maintenance Ease', 'estatien' ), __( 'Say goodbye to property maintenance headaches. We handle all aspects of property upkeep.', 'estatien' ) ),
	array( '✧', __( 'Financial Peace of Mind', 'estatien' ), __( 'Managing property finances can be complex. Our financial experts take care of rent collection.', 'estatien' ) ),
	array( '✹', __( 'Legal Guardian', 'estatien' ), __( 'Stay compliant with property laws and regulations effortlessly.', 'estatien' ) ),
);

$investment = array(
	array( '◍', __( 'Market Insight', 'estatien' ), __( 'Stay ahead of market trends with our expert market analysis.', 'estatien' ) ),
	array( '◉', __( 'ROI Assessment', 'estatien' ), __( 'Make investment decisions with confidence using clear return analysis.', 'estatien' ) ),
	array( '◆', __( 'Customized Strategies', 'estatien' ), __( 'Every investor is unique. We create strategies tailored to your goals.', 'estatien' ) ),
	array( '✹', __( 'Diversification Mastery', 'estatien' ), __( 'Diversify your real estate portfolio effectively with guidance from our team.', 'estatien' ) ),
);
?>
<section class="section-container page-hero" aria-labelledby="services-title">
	<div>
		<span class="sparkles" aria-hidden="true"></span>
		<h1 id="services-title"><?php esc_html_e( 'Elevate Your Real Estate Experience', 'estatien' ); ?></h1>
		<p><?php esc_html_e( 'Estatein brings buying, selling, management, and investment guidance together in one refined service experience.', 'estatien' ); ?></p>
	</div>
</section>

<section class="feature-strip services-strip" aria-label="<?php esc_attr_e( 'Service categories', 'estatien' ); ?>">
	<?php foreach ( $services as $service ) : ?>
		<article class="feature-card">
			<span class="feature-arrow" aria-hidden="true">↗</span>
			<div class="feature-icon"><img src="<?php echo estatien_asset( 'images/' . $service[0] ); ?>" alt="" loading="lazy"></div>
			<h2><?php echo esc_html( $service[1] ); ?></h2>
			<p><?php echo esc_html( $service[2] ); ?></p>
		</article>
	<?php endforeach; ?>
</section>

<section class="section-container section-block service-section" aria-labelledby="value-title">
	<div class="section-heading">
		<div>
			<span class="sparkles" aria-hidden="true"></span>
			<h2 id="value-title"><?php esc_html_e( 'Unlock Property Value', 'estatien' ); ?></h2>
			<p><?php esc_html_e( 'Selling your property should be a rewarding experience, and at Estatein, we make sure it is. Our Property Selling Service is designed to maximize the value of your property.', 'estatien' ); ?></p>
		</div>
	</div>
	<div class="service-feature-grid">
		<?php foreach ( $valuation as $item ) : ?>
			<article class="service-mini-card">
				<div class="value-title"><span aria-hidden="true"><?php echo esc_html( $item[0] ); ?></span><h3><?php echo esc_html( $item[1] ); ?></h3></div>
				<p><?php echo esc_html( $item[2] ); ?></p>
			</article>
		<?php endforeach; ?>
		<article class="service-cta-card">
			<div>
				<h3><?php esc_html_e( 'Unlock the Value of Your Property Today', 'estatien' ); ?></h3>
				<p><?php esc_html_e( 'Ready to unlock the true value of your property? Explore our Property Selling Service categories and let us help you achieve the best deal possible.', 'estatien' ); ?></p>
			</div>
			<a class="button button-secondary" href="<?php echo estatien_contact_url(); ?>"><?php esc_html_e( 'Learn More', 'estatien' ); ?></a>
		</article>
	</div>
</section>

<section class="section-container section-block service-section" aria-labelledby="management-title">
	<div class="section-heading">
		<div>
			<span class="sparkles" aria-hidden="true"></span>
			<h2 id="management-title"><?php esc_html_e( 'Effortless Property Management', 'estatien' ); ?></h2>
			<p><?php esc_html_e( 'Owning a property should be a pleasure, not a hassle. Estatein Property Management Service takes the stress out of property ownership.', 'estatien' ); ?></p>
		</div>
	</div>
	<div class="service-feature-grid">
		<?php foreach ( $management as $item ) : ?>
			<article class="service-mini-card">
				<div class="value-title"><span aria-hidden="true"><?php echo esc_html( $item[0] ); ?></span><h3><?php echo esc_html( $item[1] ); ?></h3></div>
				<p><?php echo esc_html( $item[2] ); ?></p>
			</article>
		<?php endforeach; ?>
		<article class="service-cta-card">
			<div>
				<h3><?php esc_html_e( 'Experience Effortless Property Management', 'estatien' ); ?></h3>
				<p><?php esc_html_e( 'Ready to experience hassle-free property management? Explore our services and let us handle the complexities while you enjoy the benefits.', 'estatien' ); ?></p>
			</div>
			<a class="button button-secondary" href="<?php echo estatien_contact_url(); ?>"><?php esc_html_e( 'Learn More', 'estatien' ); ?></a>
		</article>
	</div>
</section>

<section class="section-container section-block service-investment" aria-labelledby="investment-title">
	<div class="service-investment-copy">
		<span class="sparkles" aria-hidden="true"></span>
		<h2 id="investment-title"><?php esc_html_e( 'Smart Investments, Informed Decisions', 'estatien' ); ?></h2>
		<p><?php esc_html_e( 'Building a real estate portfolio requires a strategic approach. Estatein investment advisory services give you the market intelligence and guidance you need.', 'estatien' ); ?></p>
		<div class="service-cta-card service-cta-card-stacked">
			<h3><?php esc_html_e( 'Unlock Your Investment Potential', 'estatien' ); ?></h3>
			<p><?php esc_html_e( 'Explore our Property Management Service categories and let us help you maximize the value and performance of your investments.', 'estatien' ); ?></p>
			<a class="button button-secondary" href="<?php echo estatien_contact_url(); ?>"><?php esc_html_e( 'Learn More', 'estatien' ); ?></a>
		</div>
	</div>
	<div class="service-investment-grid">
		<?php foreach ( $investment as $item ) : ?>
			<article class="service-mini-card">
				<div class="value-title"><span aria-hidden="true"><?php echo esc_html( $item[0] ); ?></span><h3><?php echo esc_html( $item[1] ); ?></h3></div>
				<p><?php echo esc_html( $item[2] ); ?></p>
			</article>
		<?php endforeach; ?>
	</div>
</section>

<?php
get_template_part( 'template-parts/cta' );
get_footer();
