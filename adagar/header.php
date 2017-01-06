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
							<a href="mailto:adagarweb@gmail.com" target="_blank" aria-label="contact email">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</a>
							<a href="tel:0502598678" class="phone" aria-label="0502598678">
								<i class="fa fa-phone" aria-hidden="true"></i> 050-2598678
							</a>
						</div>

						<div class="header_top_socials">
							<a href="#" aria-label="Facebook">
								<i class="fa fa-facebook-square" aria-hidden="true"></i></i>
							</a>
							<a href="#" aria-label="Linkedin">
								<i class="fa fa-linkedin-square" aria-hidden="true"></i>
							</a>
							<a href="#" aria-label="Google plus">
								<i class="fa fa-google-plus-square" aria-hidden="true"></i>
							</a>

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
