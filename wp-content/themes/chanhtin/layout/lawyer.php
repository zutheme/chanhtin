<?php 
$social = get_field('social','customizer');
$idpost = get_the_ID();
    $prfx_stored_meta = get_post_meta( $idpost );  ?>
<section aria-label="section" class="no-bottom no-top">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<h2><?php echo $prfx_stored_meta['home-headteam-title'][0]; ?></h2>
				<div class="small-border"></div>
			</div>
			 <?php $active="";		  
           $team_query = new WP_Query( array(
			    'post_type' => 'lawyers',
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
					<div class="col-lg-4 col-md-6 col-sm-6 mb30 wow fadeInRight" data-wow-delay=".2s">
						<div class="f-profile text-center">
							<div class="fp-wrap f-invert">
								<div class="fpw-overlay">
									<div class="fpwo-wrap">
										<!--<div class="fpwow-icons">
											<a href="#"><i class="fa fa-facebook fa-lg"></i></a>
											<a href="#"><i class="fa fa-twitter fa-lg"></i></a>
											<a href="#"><i class="fa fa-linkedin fa-lg"></i></a>
											<a href="#"><i class="fa fa-pinterest fa-lg"></i></a>
										</div>-->
									</div>
								</div>
								<div class="fpw-overlay-btm"></div>
								<img src="<?php echo $_thumbnail; ?>" class="fp-image img-fluid" alt="">
							</div>
							<h4><?php the_title(); ?></h4>
							<?php echo $position; ?>
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
</section>
