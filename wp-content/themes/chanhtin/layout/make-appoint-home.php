<?php $idpost = get_queried_object_id();
    $prfx_stored_meta = get_post_meta( $idpost );
	$current_language = pll_current_language('slug');
	$client = get_field('review_'.$current_language,'customizer');
?>
<section aria-label="section" class="text-light" data-bgimage="url(<?php if ( isset ( $prfx_stored_meta['bg_contact'] ) ) echo $prfx_stored_meta['bg_contact'][0]; ?>) top" data-stellar-background-ratio=".2">
<!--<section aria-label="section" class="text-light" data-bgcolor="#333">-->
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 mb-sm-30 text-center">
				<h3><?php pll_e('consultant'); ?></h3>
				<form name="contactForm" id="contact_form" class="form-border" method="post" >
					<input class="captcha-value" type="hidden" id="captcha-contact" value="" />
					<div class="field-set">
						<input type="text" name="name" id="name" class="form-control" placeholder="<?php pll_e('fullname'); ?>">
					</div>
					<div class="field-set">
						<input type="text" name="email" id="email" class="form-control" placeholder="<?php pll_e('email'); ?>">
					</div>
					<div class="field-set">
						<input type="text" name="phone" id="phone" class="form-control" placeholder="<?php pll_e('phone'); ?>">
					</div>
					<div class="field-set">
						<textarea name="note" id="message" class="form-control" placeholder="<?php pll_e('note'); ?>"></textarea>
					</div>
					<div id="captcha-center" class="field-set">
						<div id="captcha_contact"></div>
					</div>
					<div class="spacer-half"></div>
					<div id="submit">
						<input type="button" value="<?php pll_e('submit'); ?>" class="btn btn-custom btn-register-api">
					</div>
				</form>
			</div>
			<div class="col-lg-4">
			</div>
		</div>
	</div>
</section>
<!-- support-section end -->