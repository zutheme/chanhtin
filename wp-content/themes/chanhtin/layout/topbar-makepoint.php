<?php 
$social = get_field('social','customizer');
$idpost = get_the_ID();
    $prfx_stored_meta = get_post_meta( $idpost );  ?>
<!-- about-section -->
 <section class="pt40 pb40 bg-color text-light">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-8 mb-sm-30 text-lg-left text-sm-center">
				<h3 class="no-bottom"><?php echo $prfx_stored_meta['home-point-title1'][0]; ?></h3>
			</div>
			<div class="col-md-4 text-lg-right rtl-lg-left text-sm-center">
				<a href="#" class="btn-custom btn-black light"><?php pll_e('makeappoint'); ?></a>
			</div>
		</div>
	</div>
</section>