<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package hibay
 */

get_header();
//$categories = get_the_category();
?>
 
<?php $idpost = get_the_ID();
    $prfx_stored_meta = get_post_meta( $idpost );
		
 ?>
  <section id="subheader" class="text-white" data-stellar-background-ratio=".2" data-bgimage="url(<?php if ( isset ( $prfx_stored_meta['banner_page'] ) ) echo $prfx_stored_meta['banner_page'][0]; ?>) top">
                <div class="center-y relative text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1><?php the_title(); ?></h1>
                    </div>
                    <div class="col-md-12 text-center">
                    <?php
						if ( function_exists('yoast_breadcrumb') ) {
							yoast_breadcrumb( '<p id="breadcrumbs" class="bread-crumb clearfix">','</p>' ); } ?>
					</div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </section>
   <section aria-label="section">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="blog-read">
                    	<?php
							while ( have_posts() ) :
								the_post();

								get_template_part( 'template-parts/content', get_post_type() );

								/*the_post_navigation(
									array(
										'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'hibay' ) . '</span> <span class="nav-title">%title</span>',
										'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'hibay' ) . '</span> <span class="nav-title">%title</span>',
									)
								);*/

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									if(function_exists('comments_template')){
										comments_template();
									}
									
								endif;

							endwhile; // End of the loop.
							?>
                    </div>
                    <div class="spacer-single"></div>
                    <?php //get_template_part('layout/comment'); ?> 
                </div>
                <div id="sidebar" class="col-md-4">
                	<?php get_template_part('layout/sidebar'); ?> 
                </div>
            </div>
        </div>
    </section>
    <!-- sidebar-page-container -->
<?php
get_footer();
