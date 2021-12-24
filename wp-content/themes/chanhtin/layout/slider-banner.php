<!-- revolution slider begin -->
<section id="section-slider" class="fullwidthbanner-container text-white" aria-label="section-slider">
	<div id="slider-revolution">
		<ul>
			<?php $active="";		  
           $team_query = new WP_Query( array(
			    'post_type' => 'sliders',
				'posts_per_page' => '3',
			));
          $count = 0;
         if($team_query->have_posts()) {
          while ($team_query->have_posts()) {
            	$team_query->the_post();  
            	$id = get_the_ID();
				$title2 = get_post_meta( $id, 'position', true );
				$link = get_post_meta( $id, 'link', true );
            	$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full', false );
            	if(!$thumbnail){
				     $rand = rand(0,4);
				    $_thumbnail = get_template_directory()."/images/no-thumbnail.jpg";
				  }else{
				    $_thumbnail = $thumbnail[0];
				  }
	           	?>
				 <li data-transition="fade" data-slotamount="10" data-masterspeed="300" data-thumb="">
					<!--  BACKGROUND IMAGE -->
					<img alt="" class="rev-slidebg" data-bgposition="top center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" src="<?php echo $_thumbnail; ?>">
					<div class="tp-caption big-s1" data-x="0" data-y="230" data-width="none" data-height="none" data-whitespace="nowrap" data-transform_in="y:100px;opacity:0;s:500;e:Power2.easeOut;" data-transform_out="opacity:0;y:-100;s:200;e:Power2.easeInOut;" data-start="500" data-splitin="none" data-splitout="none" data-responsive_offset="on">
						<h3 class="id-color"><?php echo $title2; ?></h3>
					</div>
					<div class="tp-caption very-big-white" data-x="0" data-y="280" data-width="none" data-height="none" data-whitespace="nowrap" data-transform_in="y:100px;opacity:0;s:500;e:Power2.easeOut;" data-transform_out="opacity:0;y:-100;s:400;e:Power2.easeInOut;" data-start="600" data-splitin="none" data-splitout="none" data-responsive_offset="on">
						<h1><?php the_title(); ?></h1>
					</div>
					<div class="tp-caption" data-x="0" data-y="360" data-width="480" data-height="none" data-whitespace="wrap" data-transform_in="y:100px;opacity:0;s:500;e:Power2.easeOut;" data-transform_out="opacity:0;y:-100;s:600;e:Power2.easeInOut;" data-start="700">
						<p class="lead xs-hide"><?php echo get_the_excerpt_max(200); ?></p>
					</div>
					<div class="tp-caption" data-x="0" data-y="450" data-width="none" data-height="none" data-whitespace="nowrap" data-transform_in="y:100px;opacity:0;s:500;e:Power2.easeOut;" data-transform_out="opacity:0;y:-100;s:800;e:Power2.easeInOut;" data-start="800">
						<a class="btn-custom" href="<?php echo $link; ?>"><?php pll_e('bt-contactus'); ?></a>
					</div>
				</li>
				<?php 
				$count++; 
				  }//end while
			  } else {
				  echo "nothing found";
			  }//end if have post
			  wp_reset_query();  ?>
		</ul>
	</div>
</section>
<!-- revolution slider close -->