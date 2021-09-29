<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hibay
 */
 $id_post = get_the_ID();
  $url_default = get_template_directory() . '/inc/image/no-image.jpg';
  //$media = wp_get_attachment_image_src( get_post_thumbnail_id($id_post), 'media', false );
  $media = wp_get_attachment_image_src( get_post_thumbnail_id($id_post), 'media', false );
  if(isset($media)){
	  $url_default = $media[0];
  }
  $excerpt = get_the_excerpt_max(200);
?>

<?php
	if ( is_singular() ) : 
			//the_title( '<h1>', '</h1>' ); ?>
			<div class="inner-box">
			<?php the_content(); ?>
			</div>
	<?php else : ?>
	<div class="news-block-three">
        <div class="inner-box">
            <div class="image-box">
                <figure class="image"><a href="<?php the_permalink(); ?>"><img src="<?php echo $url_default; ?>" alt=""></a></figure>
                <!--<span class="category">business</span>-->
            </div>
            <div class="lower-content">
                
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <p><?php echo $excerpt; ?></p>
                <div class="link"><a href="<?php the_permalink(); ?>"><i class="fas fa-arrow-right"></i><span><?php pll_e('readmore'); ?></span></a></div>
            </div>
        </div>
    </div>
	<?php endif;

		