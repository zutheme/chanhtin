<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hibay
 */

get_header();
?>
 <?php  
		$current_language = pll_current_language('slug');
		$_banner_detail = get_field('banner_'.$current_language.'_detail','customizer');
		$banner_detail = $_banner_detail['url'];
		$_banner_service = get_field('banner_'.$current_language.'_service','customizer');
		$banner_service = $_banner_service['url'];
		$_banner_news = get_field('banner_'.$current_language.'_news','customizer');
		$banner_news = $_banner_news['url'];
		$_banner_doc = get_field('banner_'.$current_language.'_doc','customizer');
		$banner_doc = $_banner_doc['url'];
		$slug_banner = get_top_breadcrumbs('');
		if($current_language=='vie'){
			if($slug_banner == 'dich-vu'){
				if(isset($banner_service)){
					$banner_detail = $banner_service;
				}
			}elseif($slug_banner == 'tin-tuc-va-su-kien'){
				if(isset($banner_news)){
					$banner_detail = $banner_news;
				}
			}elseif($slug_banner == 'van-ban-phap-luat'){
				if(isset($banner_doc)){
					$banner_detail = $banner_doc;
				}
			}
		}else{
			if($slug_banner == 'services'){
				if(isset($banner_service)){
					$banner_detail = $banner_service;
				}
			}elseif($slug_banner == 'news-and-events'){
				if(isset($banner_news)){
					$banner_detail = $banner_news;
				}
			}elseif($slug_banner == 'legal-documents'){
				if(isset($banner_doc)){
					$banner_detail = $banner_doc;
				}
			}
		}
 ?>
 <section id="subheader" class="text-white" data-stellar-background-ratio=".2" data-bgimage="url(<?php echo $banner_detail; ?>) top">
    <div class="center-y relative text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                   <?php the_archive_title( '<h1>', '</h1>' );
					//the_archive_description( '<div class="archive-description">', '</div>' );?>
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
			<?php if ( have_posts() ) : 
				$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1; 
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();
					/*
					 * Include the Post-Type-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_type() );

				endwhile;
				//the_posts_navigation(); 
				if ( $wp_query->max_num_pages > 1 ) : // if there's more than one page turn on pagination ?>
					<div class="pagination-wrapper centred">
						<?php custom_pagination($wp_query->max_num_pages,"",$paged); ?>
	                    <!--<ul class="pagination clearfix">
	                        <li><a href="blog-classic.html" class="active">1</a></li>
	                        <li><a href="blog-classic.html">2</a></li>
	                        <li><a href="blog-classic.html">3</a></li>
	                        <li><a href="blog-classic.html"><i class="fas fa-arrow-right"></i></a></li>
	                    </ul>-->
	                </div>   
           		<?php endif;
				?>
				<?php else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>
        </div>
    </div>
 </section>

<?php

get_footer();
