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
       <div class="post-text">
        <?php the_content(); ?>                  
       <!--<span class="post-date">April 1, 2018</span>
        <span class="post-comment">1</span>
        <span class="post-like">181</span>-->
       </div>
	<?php else : ?>
  <div class="col-lg-4 col-md-6 mb30">
      <div class="bloglist item">
          <div class="post-content">
              <!--<div class="date-box">
                  <div class="m">10</div>
                  <div class="d">NOV</div>
              </div>-->
              <div class="post-image">
                  <img alt="" src="<?php echo $url_default; ?>">
              </div>
              <div class="post-text">
                  <!--<span class="p-tagline">Law Firm</span>-->
                  <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span></span></a></h4>
                  <p><?php echo get_the_excerpt_max(200); ?></p>
                  <!--<span class="p-author">Fynley Wilkinson</span>-->
              </div>
          </div>
      </div>
  </div>
	<?php endif;

		