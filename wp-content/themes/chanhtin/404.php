<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package hibay
 */

get_header();
$current_language = pll_current_language('slug');
$_banner_detail = get_field('banner_'.$current_language.'_detail','customizer');
$banner_detail = $_banner_detail['url'];
?>
  <section id="subheader" class="text-white" data-stellar-background-ratio=".2" data-bgimage="url(<?php echo $banner_detail; ?>) top">
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
    <!--End Page Title-->
<section aria-label="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="blog-read">
						<h2>Trang không tìm thấy</h2>
                    	<?php
							get_search_form();
							?>
                    </div>
                    <div class="spacer-single"></div>
                    <?php //get_template_part('layout/comment'); ?> 
                </div>
            </div>
        </div>
    </section>
</section>
    <!-- error-section end -->
	
<?php
get_footer();
