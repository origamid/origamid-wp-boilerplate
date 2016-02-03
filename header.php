<!DOCTYPE html>
<!--[if IE]>	<html class="no-js ie"> <![endif]-->
<!--[if !IE]><!-->	<html class="no-js" lang="pt-br"> <!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title><?php bloginfo('name'); ?> - <?php wp_title(''); ?> <?php the_field('title_seo'); ?></title>
	<meta name="description" content="<?php bloginfo('name'); ?> - <?php wp_title(''); ?> <?php the_field('description_seo'); ?>">

	<meta name="author" content="<?php bloginfo('name'); ?>"/>

	<meta property="og:title" content="<?php bloginfo('name'); ?> - <?php wp_title(''); ?> <?php the_field('title_seo'); ?>"/>
	<meta property="og:description" content="<?php bloginfo('name'); ?> - <?php wp_title(''); ?> <?php the_field('description_seo'); ?>"/>
	<meta property="og:type" content="website"/>
	<meta property="og:url" content="https://www.siteurl.com<?php echo $directoryURI; ?>"/>
	<?php if(get_field('og_image')) { ?>
		<meta property="og:image" content="<?php the_field('og_image') ?>"/>
	<?php } else { ?>
		<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/og-image.png"/>
	<?php } ?>
	<meta property="og:site_name" content="Origamid"/>

	<link rel="sitemap" type="application/xml" title="Sitemap" href="<?php echo get_template_directory_uri(); ?>/sitemap.xml">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="apple-touch-icon" href="/apple-touch-icon.png">
	<link rel="shortcut icon" href="/favicon.ico">

	<!-- Wordpress Header -->
	<?php wp_head(); ?>
	<!-- Wordpress Header -->
</head>

<body>

	<header class="header">
		<div class="container">
			<a href="<?php bloginfo('url'); ?>" class="col-4">
				<img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Logo">
			</a>
			<nav class="col-8">
				<?php
					$args = array(
						'menu' => 'principal',
						'theme_location' => 'menu-principal',
						'container' => false
					);
					wp_nav_menu( $args );
				?>
			</nav>
		</div>
	</header>
