<?php 
$social = get_field('social','customizer');
$idpost = get_the_ID();
    $prfx_stored_meta = get_post_meta( $idpost );  ?>
<!-- about-section -->
 <div id="topbar" class="topbar-noborder">
    <div class="container">
        <div class="topbar-left sm-hide">
            <span class="topbar-widget tb-social">
                <?php  if(isset($social)){
                    foreach($social as $row) { ?>
                        <!--<a href="#"><i class="fa fa-facebook"></i></a>-->
                        <a href="<?php echo $row['link_social'] ?>">
                            <img src="<?php echo $row['image_social']['url'] ?>">
                        </a>
                      <?php 
                    }
                 } ?>
                <!--<a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>-->
            </span>
        </div>
        <div class="topbar-right">
            <div class="topbar-right">
                 <?php 
                                  wp_nav_menu( array(

                                  'theme_location'    => 'menu-2',

                                  'menu'              => 'menu-2',

                                  'depth'             => 1,

                                  'container'         => '',

                                  'container_class'   => '',

                                  'container_id'      => '',

                                  'menu_id'           => '',

                                  'menu_class'        => 'navigation clearfix',

                                  'fallback_cb'       => 'wp_bootstrap_navwalker_desktop_language::fallback',

                                  'walker'            => new wp_bootstrap_navwalker_desktop_language(),
                                  'items_wrap' => '<ul class="%2$s">%3$s</ul>'

                              ) );
                            ?>
                <!--<span class="topbar-widget"><a href="#">Privacy policy</a></span>
                <span class="topbar-widget"><a href="#">Request Quote</a></span>
                <span class="topbar-widget"><a href="#">FAQ</a></span>-->
                <!--<ul class="navigation"><?php //pll_the_languages();?></ul>-->
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>