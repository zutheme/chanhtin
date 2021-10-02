<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hibay
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<!-- Fav Icon -->
	<?php $favicon = get_field('favicon','customizer'); ?>
	<link rel="icon" href="<?php echo $favicon['url']; ?>" type="image/png">
	
	<!-- new style -->
	<!--[if lt IE 9]>
            <script src="js/html5shiv.js"></script>
        <![endif]-->
    <!-- CSS Files
    ================================================== -->
    <link id="bootstrap" href="<?php bloginfo('template_directory');?>/justica/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link id="bootstrap-grid" href="<?php bloginfo('template_directory');?>/justica/css/bootstrap-grid.min.css" rel="stylesheet" type="text/css">
    <link id="bootstrap-reboot" href="<?php bloginfo('template_directory');?>/justica/css/bootstrap-reboot.min.css" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('template_directory');?>/justica/css/animate.css" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('template_directory');?>/justica/css/owl.carousel.css?v=0.0.1" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('template_directory');?>/justica/css/owl.theme.css" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('template_directory');?>/justica/css/owl.transitions.css" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('template_directory');?>/justica/css/magnific-popup.css" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('template_directory');?>/justica/css/jquery.countdown.css" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('template_directory');?>/justica/css/style.css?v=0.3.5" rel="stylesheet" type="text/css">
    <!-- color scheme -->
    <link id="colors" href="<?php bloginfo('template_directory');?>/justica/css/colors/scheme-01.css" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('template_directory');?>/justica/css/coloring-logo.css?v=0.0.1" rel="stylesheet" type="text/css">
	<!--end style -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Libre+Franklin&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body>
	<div id="wrapper">
<?php wp_body_open(); ?>
<?php 
get_template_part('layout/topbar'); 
get_template_part('layout/main-header');
?>
  <!-- content begin -->
<div class="no-bottom no-top" id="content">
    <div id="top"></div>
