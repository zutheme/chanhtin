<?php $idpost = get_the_ID();
    $prfx_stored_meta = get_post_meta( $idpost );  
	$current_language = pll_current_language('slug');
	$client = get_field('review_'.$current_language,'customizer');
	
?>
<section aria-label="section" class="text-light" data-bgimage="url(<?php echo $prfx_stored_meta['bg_testimonial'][0]; ?>) top" data-stellar-background-ratio=".2">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="text-center text-light">
					<h2><?php echo $prfx_stored_meta['bg_testimonial_title'][0]; ?></h2>
					<div class="small-border"></div>
				</div>
				<div class="owl-carousel owl-theme" id="testimonial-carousel">
					 <?php $active="";		  
           $team_query = new WP_Query( array(
			    'post_type' => 'testimonials',
				'posts_per_page' => '3',
			    /*'tax_query' => array(
			        array (
			            'taxonomy' => 'depart_video',
			            'field' => 'slug',
			            'terms' => 'video-dieu-tri-nam',
			        )
			    ),*/
			));
          $count = 0;
         if($team_query->have_posts()) {
          while ($team_query->have_posts()) {
            	$team_query->the_post();  
            	$id = get_the_ID();
            	$position = get_post_meta( $id, 'position', true );
            	$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full', false );
            	if(!$thumbnail){
				     $rand = rand(0,4);
				    $_thumbnail = get_template_directory()."/images/no-thumbnail.jpg";
				  }else{
				    $_thumbnail = $thumbnail[0];
				  }
	           	?>
					<div class="item">
						<div class="de_testi opt-2 review">
							<blockquote>
								<!--<i class="fa fa-quote-left id-color"></i>-->
								<img src="<?php echo $_thumbnail; ?>" class="client" alt="">
								<h3><?php the_title(); ?></h3>
								<p><?php echo get_the_excerpt_max(200); ?></p>
								<div class="de_testi_by"><span><?php echo $position; ?></span></div>
							</blockquote>
						</div>
					</div>
	           		<?php 
	           		$count++; 
		              }//end while
		          } else {
		              echo "nothing found";
		          }//end if have post
		          wp_reset_query();  ?>
				</div>
			</div>
		</div>
	</div>
</section>