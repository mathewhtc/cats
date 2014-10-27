<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <main>
 * and the left sidebar conditional
 *
 * @since 1.0.0
 */
?><!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" <?php language_attributes(); ?>><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
<!--[if lt IE 9]><script>document.createElement('video');</script><![endif]-->
<head>
<link href='http://fonts.googleapis.com/css?family=Noto+Sans:400,400italic,700,700italic|Noto+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if IE]><script src="<?php echo BAVOTASAN_THEME_URL; ?>/library/js/html5.js"></script><![endif]-->
<?php wp_head(); ?>

<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/core.js"></script>
</head>

<body <?php body_class(); ?>>

	<div id="page">

		<header id="header">
        	<div id="navigation">
                <h1 class="site-title" ><a href="<?php bloginfo('wpurl'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/htc-logo.svg" class="svg"></a></h1>
                <div class="menu-holder">
                    <a href="#" class="open-nav">Open</a>
                    <div class="nav-holder"><?php wp_nav_menu( array( 'theme_location' => 'primary', 'fallback_cb' => 'bavotasan_default_menu', 'depth' => 2 ) ); ?><a href="#" class="close-nav">Close</a></div>
                    <a href="#" class="open-search">Open search</a>
                    <?php get_search_form(); ?> 
                </div>
            </div>