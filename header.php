<!DOCTYPE html>
<html>

	<head>

		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="apple-touch-icon" sizes="57x57" href="<?php echo CGC_BUILD_THEME_URL ;?>/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?php echo CGC_BUILD_THEME_URL ;?>/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo CGC_BUILD_THEME_URL ;?>/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo CGC_BUILD_THEME_URL ;?>/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo CGC_BUILD_THEME_URL ;?>/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo CGC_BUILD_THEME_URL ;?>/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo CGC_BUILD_THEME_URL ;?>/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo CGC_BUILD_THEME_URL ;?>/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo CGC_BUILD_THEME_URL ;?>/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo CGC_BUILD_THEME_URL ;?>/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo CGC_BUILD_THEME_URL ;?>/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="<?php echo CGC_BUILD_THEME_URL ;?>/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo CGC_BUILD_THEME_URL ;?>/favicon-16x16.png">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">
		<?php wp_head(); ?>

		<body <?php body_class(); ?>>

			<?php
			if ( is_home() ) {
				$class = 'blog--archive';
			} else {
				$class = 'blog--single';
			}
			?>

			<main class="content-width--small <?php echo $class;?>">
