<?php $idpost = get_the_ID();
    $prfx_stored_meta = get_post_meta( $idpost );  ?>
<section aria-label="section" class="vh-100 no-padding text-light" data-bgimage="url(<?php if ( isset ( $prfx_stored_meta['banner_page'] ) ) echo $prfx_stored_meta['banner_page'][0]; ?>) top" data-stellar-background-ratio=".2">
    <div class="v-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h3 class="id-color wow fadeInUp" data-wow-delay=".4s"><?php echo $prfx_stored_meta['home-banner-title1'][0]; ?></h3>
                    <h1 class="wow fadeInUp" data-wow-delay=".6s"><?php if ( isset ( $prfx_stored_meta['home-banner-title2'] ) ) echo $prfx_stored_meta['home-banner-title2'][0]; ?></h1>
                    <p class="lead wow fadeInUp" data-wow-delay=".8s"><?php echo $prfx_stored_meta['home-banner-desc1'][0]; ?></p>
                    <div class="spacer-20"></div>
                    <a class="btn-custom wow fadeInUp" data-wow-delay="1s" href="#"><?php pll_e('bt-contactus'); ?></a>
                </div>
            </div>
        </div>
    </div>
</section>