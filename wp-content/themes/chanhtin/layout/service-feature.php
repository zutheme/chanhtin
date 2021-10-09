<?php 
$social = get_field('social','customizer');
$idpost = get_the_ID();
    $prfx_stored_meta = get_post_meta( $idpost );  ?>
<section class="no-top relative z1000">
	<div class="container">
		<div class="row mt-100">
			<?php for($i=0;$i<4;$i++){ 
				$j = $i +1;
				$str_icon = '';
				switch ($i):
					case 1:
						$str_icon = '<i class="icofont-home"></i>';
					break;
					case 2:
						$str_icon = '<i class="icofont-law-order"></i>';
					break;
					default:
						$str_icon = '<i class="icofont-people"></i>';
				endswitch;
			?>
			<div class="col-md-3 mb-sm-30 wow fadeInRight" data-wow-delay=".2s">
				<div class="mask">
					<div class="cover">
						<div class="c-inner">
							<h3><?php //echo $str_icon; ?><span><?php echo $prfx_stored_meta['feature-service-title'.$j][0]; ?></span></h3>
							<p><?php echo $prfx_stored_meta['feature-service-desc'.$j][0]; ?></p>
							<div class="spacer20"></div>
							<a href="<?php echo $prfx_stored_meta['feature-service-link'.$j][0]; ?>" class="btn-custom capsule"><?php pll_e('readmore'); ?></a>
						</div>
					</div>
					<img src="<?php echo $prfx_stored_meta['feature_image_service'.$j][0]; ?>" alt="" class="img-responsive">
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</section>
