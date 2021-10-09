<?php $idpost = get_the_ID();
    $prfx_stored_meta = get_post_meta( $idpost );  ?>
<!-- support-section -->
<section aria-label="section" class="text-light" data-bgcolor="#333" style="display: none; position: fixed; z-index: 2147483647; left: 0px; top: 0%; width: 100%; height: 100%; overflow: auto; background-color: rgba(0, 0, 0, 0.1); background-size: cover;">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 mb-sm-30 text-center">
				<h3><?php pll_e('consultant'); ?></h3>
				<form name="contactForm" id="contact_form" class="form-border" method="post">
					<input type="hidden" id="captcha-contact" value="" />
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
					<!--<div id="mail_success" class="success">Your message has been sent successfully.</div>
					<div id="mail_fail" class="error">Sorry, error occured this time sending your message.</div>-->
				</form>
			</div>
			<div class="col-lg-4">
			</div>
		</div>
	</div>
</section>
<!-- support-section end -->