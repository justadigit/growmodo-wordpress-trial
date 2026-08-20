<?php
/**
 * About Us page template.
 *
 * Template Name: About Us
 *
 * @package Estatien
 */

get_header();

$stats = array(
	array( '200+', __( 'Happy Customers', 'estatien' ) ),
	array( '10k+', __( 'Properties For Clients', 'estatien' ) ),
	array( '16+', __( 'Years of Experience', 'estatien' ) ),
);

$values = array(
	array( '✦', __( 'Trust', 'estatien' ), __( 'Trust is the cornerstone of every successful real estate transaction.', 'estatien' ) ),
	array( '◈', __( 'Excellence', 'estatien' ), __( 'We set the bar high for ourselves. From the properties we list to the services we provide.', 'estatien' ) ),
	array( '●', __( 'Client-Centric', 'estatien' ), __( 'Your dreams and needs are at the center of our universe. We listen, understand.', 'estatien' ) ),
	array( '★', __( 'Our Commitment', 'estatien' ), __( 'We are dedicated to providing you with the highest level of service, professionalism, and support.', 'estatien' ) ),
);

$achievements = array(
	array( __( '3+ Years of Excellence', 'estatien' ), __( 'With years in the industry, we have amassed a wealth of knowledge and experience.', 'estatien' ) ),
	array( __( 'Happy Clients', 'estatien' ), __( 'Our greatest achievement is the satisfaction of our clients and their successful property journeys.', 'estatien' ) ),
	array( __( 'Industry Recognition', 'estatien' ), __( 'We have earned recognition for our commitment to excellence and innovation in real estate.', 'estatien' ) ),
);

$steps = array(
	array( '01', __( 'Discover a World of Possibilities', 'estatien' ), __( 'Your journey begins with exploring our carefully curated property listings.', 'estatien' ) ),
	array( '02', __( 'Narrowing Down Your Choices', 'estatien' ), __( 'We help you refine your search by location, lifestyle, budget, and goals.', 'estatien' ) ),
	array( '03', __( 'Personalized Guidance', 'estatien' ), __( 'Our team provides expert advice and market insight at every step.', 'estatien' ) ),
	array( '04', __( 'See It for Yourself', 'estatien' ), __( 'Schedule visits and experience properties with confidence.', 'estatien' ) ),
	array( '05', __( 'Making Informed Decisions', 'estatien' ), __( 'We support negotiation, due diligence, and the details that matter.', 'estatien' ) ),
	array( '06', __( 'Getting the Best Deal', 'estatien' ), __( 'From offer to closing, Estatein helps protect your interests.', 'estatien' ) ),
);

$team = array(
	array( 'team-max.png', 'Max Mitchell', __( 'Founder', 'estatien' ) ),
	array( 'team-sarah.png', 'Sarah Johnson', __( 'Chief Real Estate Officer', 'estatien' ) ),
	array( 'team-david.png', 'David Brown', __( 'Head of Property Management', 'estatien' ) ),
	array( 'team-michael.png', 'Michael Turner', __( 'Legal Counsel', 'estatien' ) ),
);

$clients = array(
	array(
		'since'    => __( 'Since 2019', 'estatien' ),
		'name'     => 'ABC Corporation',
		'domain'   => __( 'Commercial Real Estate', 'estatien' ),
		'category' => __( 'Luxury Home Development', 'estatien' ),
		'quote'    => __( 'Estatein’s expertise in finding the perfect office space for our expanding operations was invaluable. They truly understand our business needs.', 'estatien' ),
	),
	array(
		'since'    => __( 'Since 2018', 'estatien' ),
		'name'     => 'GreenTech Enterprises',
		'domain'   => __( 'Commercial Real Estate', 'estatien' ),
		'category' => __( 'Retail Space', 'estatien' ),
		'quote'    => __( 'Estatein’s ability to identify prime retail locations helped us expand our brand presence. They are a trusted partner in our growth.', 'estatien' ),
	),
);
?>
<section class="section-container about-hero" aria-labelledby="about-title">
	<div class="about-copy">
		<span class="sparkles" aria-hidden="true"></span>
		<h1 id="about-title"><?php esc_html_e( 'Our Journey', 'estatien' ); ?></h1>
		<p><?php esc_html_e( 'Our story is one of continuous growth and evolution. We started as a small team with big dreams, determined to create a real estate platform that transcended the ordinary. Over the years, we have expanded our reach, forged valuable partnerships, and gained the trust of countless clients.', 'estatien' ); ?></p>
		<div class="stats-grid about-stats">
			<?php foreach ( $stats as $stat ) : ?>
				<div><strong><?php echo esc_html( $stat[0] ); ?></strong><span><?php echo esc_html( $stat[1] ); ?></span></div>
			<?php endforeach; ?>
		</div>
	</div>
	<div class="about-visual">
		<img src="<?php echo esc_url( estatien_asset( 'images/hero-pattern.svg' ) ); ?>" alt="" loading="lazy">
		<img src="<?php echo esc_url( estatien_asset( 'images/about-journey.png' ) ); ?>" alt="<?php esc_attr_e( 'A miniature house held in one hand', 'estatien' ); ?>" loading="eager">
	</div>
</section>

<section class="section-container section-block about-values" aria-labelledby="values-title">
	<div class="about-values-copy">
		<span class="sparkles" aria-hidden="true"></span>
		<h2 id="values-title"><?php esc_html_e( 'Our Values', 'estatien' ); ?></h2>
		<p><?php esc_html_e( 'Our story is one of continuous growth and evolution. We started as a small team with big dreams, determined to create a real estate platform that transcended the ordinary.', 'estatien' ); ?></p>
	</div>
	<div class="values-panel">
		<?php foreach ( $values as $value ) : ?>
			<article class="value-card">
				<div class="value-title"><span aria-hidden="true"><?php echo esc_html( $value[0] ); ?></span><h3><?php echo esc_html( $value[1] ); ?></h3></div>
				<p><?php echo esc_html( $value[2] ); ?></p>
			</article>
		<?php endforeach; ?>
	</div>
</section>

<section class="section-container section-block" aria-labelledby="achievements-title">
	<div class="section-heading">
		<div>
			<span class="sparkles" aria-hidden="true"></span>
			<h2 id="achievements-title"><?php esc_html_e( 'Our Achievements', 'estatien' ); ?></h2>
			<p><?php esc_html_e( 'Our journey has been defined by milestones that reflect our commitment to excellence and client success.', 'estatien' ); ?></p>
		</div>
	</div>
	<div class="card-grid about-card-grid">
		<?php foreach ( $achievements as $achievement ) : ?>
			<article class="about-card">
				<h3><?php echo esc_html( $achievement[0] ); ?></h3>
				<p><?php echo esc_html( $achievement[1] ); ?></p>
			</article>
		<?php endforeach; ?>
	</div>
</section>

<section class="section-container section-block" aria-labelledby="steps-title">
	<div class="section-heading">
		<div>
			<span class="sparkles" aria-hidden="true"></span>
			<h2 id="steps-title"><?php esc_html_e( 'Navigating the Estatein Experience', 'estatien' ); ?></h2>
			<p><?php esc_html_e( 'At Estatein, we make your real estate journey clear, guided, and rewarding from discovery to closing.', 'estatien' ); ?></p>
		</div>
	</div>
	<div class="process-grid">
		<?php foreach ( $steps as $step ) : ?>
			<article class="process-card">
				<span><?php echo esc_html( $step[0] ); ?></span>
				<div>
					<h3><?php echo esc_html( $step[1] ); ?></h3>
					<p><?php echo esc_html( $step[2] ); ?></p>
				</div>
			</article>
		<?php endforeach; ?>
	</div>
</section>

<section class="section-container section-block" aria-labelledby="team-title">
	<div class="section-heading">
		<div>
			<span class="sparkles" aria-hidden="true"></span>
			<h2 id="team-title"><?php esc_html_e( 'Meet the Estatein Team', 'estatien' ); ?></h2>
			<p><?php esc_html_e( 'At Estatein, our success is driven by the dedication and expertise of our team. Get to know the people behind our mission to make your real estate dreams a reality.', 'estatien' ); ?></p>
		</div>
	</div>
	<div class="team-grid">
		<?php foreach ( $team as $member ) : ?>
			<article class="team-card">
				<img src="<?php echo esc_url( estatien_asset( 'images/' . $member[0] ) ); ?>" alt="<?php echo esc_attr( $member[1] ); ?>" loading="lazy">
				<div class="team-social" aria-hidden="true">𝕏</div>
				<h3><?php echo esc_html( $member[1] ); ?></h3>
				<p><?php echo esc_html( $member[2] ); ?></p>
				<div class="team-message"><span><?php esc_html_e( 'Say Hello', 'estatien' ); ?></span><span aria-hidden="true">➤</span></div>
			</article>
		<?php endforeach; ?>
	</div>
</section>
<section class="section-container section-block" aria-labelledby="clients-title">
	<div class="section-heading">
		<div>
			<span class="sparkles" aria-hidden="true"></span>
			<h2 id="clients-title"><?php esc_html_e( 'Our Valued Clients', 'estatien' ); ?></h2>
			<p><?php esc_html_e( 'At Estatein, we have had the privilege of working with a diverse range of clients across various industries. Here are some of the clients we have had the pleasure of serving.', 'estatien' ); ?></p>
		</div>
	</div>
	<div class="client-story-grid">
		<?php foreach ( $clients as $client ) : ?>
			<article class="client-story-card">
				<div class="client-story-head">
					<div><span><?php echo esc_html( $client['since'] ); ?></span><h3><?php echo esc_html( $client['name'] ); ?></h3></div>
					<a class="button button-secondary" href="<?php echo esc_url( estatien_contact_url() ); ?>"><?php esc_html_e( 'Visit Website', 'estatien' ); ?></a>
				</div>
				<div class="client-story-meta">
					<div><span><?php esc_html_e( 'Domain', 'estatien' ); ?></span><strong><?php echo esc_html( $client['domain'] ); ?></strong></div>
					<div><span><?php esc_html_e( 'Category', 'estatien' ); ?></span><strong><?php echo esc_html( $client['category'] ); ?></strong></div>
				</div>
				<div class="client-story-quote"><span><?php esc_html_e( 'What They Said', 'estatien' ); ?></span><p><?php echo esc_html( $client['quote'] ); ?></p></div>
			</article>
		<?php endforeach; ?>
	</div>
	<div class="section-pager" aria-hidden="true"><span><strong>01</strong> of 10</span><span class="pager-buttons"><span>←</span><span>→</span></span></div>
</section>
<?php
get_template_part( 'template-parts/cta' );
get_footer();
