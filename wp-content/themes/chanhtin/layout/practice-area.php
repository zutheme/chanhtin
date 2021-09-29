<?php 
$social = get_field('social','customizer');
$idpost = get_the_ID();
    $prfx_stored_meta = get_post_meta( $idpost );  ?>
<section class="no-top">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="text-center">
					<h2><?php echo $prfx_stored_meta['home-headsv-title1'][0]; ?></h2>
					<div class="small-border"></div>
				</div>
			</div>
		<?php $count_item = $prfx_stored_meta['amount-service-item'][0];
		  if($count_item > 0 ){
			 $j = 0;
			 for($i=0;$i<$count_item;$i++){
					$j = $i + 1;
			 ?>
			<div class="col-lg-4 col-md-6 mb30">
				<div class="f-box f-icon-left f-icon-rounded">
					<!--<i class="icofont-group bg-color text-light"></i>-->
					<img class="icon" src="<?php echo $prfx_stored_meta['image_service'.$j][0]; ?>">
					<div class="fb-text">
						<h4><a class="text" href="<?php echo $prfx_stored_meta['home-service-link'.$j][0]; ?>"><?php echo $prfx_stored_meta['home-service-title'.$j][0]; ?></a></h4>
						<p><?php echo $prfx_stored_meta['home-service-desc'.$j][0]; ?>
						</p>
					</div>
				</div>
			</div>
			 <?php }
		  }?>
		</div>
	</div>
</section>