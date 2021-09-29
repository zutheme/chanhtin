<?php 
$social = get_field('social','customizer');
$idpost = get_the_ID();
    $prfx_stored_meta = get_post_meta( $idpost );  ?>
<section id="section-highlight" class="relative text-light no-top" data-bgcolor="#111111">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-4">
				<span class="p-title"><?php echo $prfx_stored_meta['home-welcome-title1'][0]; ?></span><br>
				<h2>
					<?php echo $prfx_stored_meta['home-welcome-title2'][0]; ?>
				</h2>
				<div class="small-border sm-left"></div>
			</div>
			<div class="col-md-8">
				<p><?php echo $prfx_stored_meta['home-welcome-title3'][0]; ?></p>
			</div>
		</div>
		<div class="spacer-double"></div>
	</div>
</section>
