<?php
/**
 *  Template Name: Contact
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
<?php $idpost = get_the_ID();
    $prfx_stored_meta = get_post_meta( $idpost );  ?>
<!--Page Title-->
 <!-- section begin -->
            <section id="subheader" class="text-white" data-stellar-background-ratio=".2" data-bgimage="url(<?php if ( isset ( $prfx_stored_meta['banner_page'] ) ) echo $prfx_stored_meta['banner_page'][0]; ?>) top">
                <div class="center-y relative text-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h1><?php pll_e('contactus'); ?></h1>
			                    <?php
									if ( function_exists('yoast_breadcrumb') ) {
										yoast_breadcrumb( '<p id="breadcrumbs" class="bread-crumb clearfix">','</p>' ); } ?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- section close -->
           <section class="text-dark" data-bgcolor="#fff">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 p-lg-12  mb-sm-30 wow fadeInRight" data-wow-delay=".4s">
                            <span class="p-title">Welcome</span><br>
                            <h2>Justica is Your Best Partner for Legal Solutions</h2>
                        </div>
                        <div class="col-lg-6 wow fadeInRight" data-wow-delay=".6s">
                            <p>
                                At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <?php get_template_part('layout/make-appoint'); ?>
            
<?php get_footer(); ?>