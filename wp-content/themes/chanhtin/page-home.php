<?php
/**
 *  Template Name: Home template
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eleaning
 */
get_header(); ?>
<?php get_template_part('layout/banner-section1'); ?>
<?php get_template_part('layout/topbar-makepoint'); ?>
<?php get_template_part('layout/welcome'); ?>
<?php get_template_part('layout/service-feature'); ?>
<?php get_template_part('layout/practice-area'); ?>
<?php get_template_part('layout/lawyer'); ?>
<?php get_template_part('layout/testimonial'); ?>
<?php get_template_part('layout/post-news'); ?>
<?php get_footer(); ?>