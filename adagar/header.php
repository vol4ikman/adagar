<?php
	$mailto   = get_field('email_address','option');
	$phone    = get_field('phone_number','option');
	$show_phone_number = get_field('show_phone_number','option');
?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
	<link href="//www.google-analytics.com" rel="dns-prefetch" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="format-detection" content="telephone=no">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<link href="https://fonts.googleapis.com/css?family=Alef|Rubik" rel="stylesheet">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

	<!-- wrapper -->
	<div class="adagar_website_container">

		<!-- header -->
		<header class="header clear" role="banner" id="site_header">

			<div class="header_top_bar">
				<div class="wrapper clear">
					<div class="header_top_inner clear">
						<div class="header_top_phone">
							<?php if( $mailto ): ?>
								<a href="mailto:<?php echo $mailto; ?>" target="_blank" aria-label="contact email">
									<i class="fa fa-envelope" aria-hidden="true"></i>
								</a>
							<?php endif; ?>
							<?php if( $phone ) : ?>
								<a href="tel:<?php echo $phone; ?>" class="phone" aria-label="<?php echo $phone; ?>">
									<i class="fa fa-phone" aria-hidden="true"></i> <?php if($show_phone_number): ?><?php echo $phone; ?><?php endif; ?>
								</a>
							<?php endif; ?>
						</div>

						<div class="header_top_socials">
							<?php get_template_part("inc/social"); ?>
							<?php get_template_part("inc/header/accessibility"); ?>
						</div>
					</div>
				</div>
			</div>

			<div class="wrapper clear">

				<div class="menu_trigger">
					<span></span>
				    <span></span>
				    <span></span>
				    <span></span>
				</div>

				<div class="logo logo_left">
					<a href="<?php echo home_url(); ?>" role="logo" aria-title="Adagar - Creative Web Solutions">
						<img src="<?php echo THEME; ?>/images/adagar-logo-190w.png"/>
					</a>
				</div>

			</div>

		</header>
