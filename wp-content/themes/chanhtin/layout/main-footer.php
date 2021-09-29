 <?php $logo = get_field('logo','customizer');
 $tax = get_field('idtax','customizer');  
 $phone1 = get_field('header_phone1','customizer');
 $phone2 = get_field('header_phone2','customizer'); 
 $address1 = get_field('header_address','customizer');
 $email1 = get_field('header_email','customizer');
 $main_footer_bottom = get_field('main_footer_bottom','customizer');
 $logo_footer = get_field('logo_footer','customizer');
 $social = get_field('social','customizer');
 $current_user = wp_get_current_user();
 $current_user_id = $current_user->ID;
 $idpost = get_the_ID();
 $redirect_to = get_permalink($idpost);
 $current_language = pll_current_language('slug');
 ?>
<!-- main-footer -->
 <!-- content close -->
        <a href="#" id="back-to-top"></a>
        <!-- footer begin -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="widget">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img alt="" class="img-fluid mb20" src="<?php echo $logo_footer['url']; ?>"></a>
                            <address class="s1">
                                <span><i class="id-color fa fa-map-marker fa-lg"></i><?php pll_e('addresscorp1'); ?></span>
                                <span><i class="id-color fa fa-phone fa-lg"></i><?php echo $phone1; ?></span>
								<span><i class="id-color fa fa-phone fa-lg"></i><?php echo $phone2; ?></span>
                                <span><i class="id-color fa fa-envelope-o fa-lg"></i><a href="mailto:<?php echo $email1; ?>"><?php echo $email1; ?></a></span>
                                <span><i class="id-color fa fa-file-pdf-o fa-lg"></i><a href="#"><?php echo  $tax;  ?></a></span>
                            </address>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h5 class="id-color mb20"><?php pll_e('services'); ?></h5>
                         <?php 
                                  wp_nav_menu( array(

                                  'theme_location'    => 'menu-3',

                                  'menu'              => 'menu-3',

                                  'depth'             => 1,

                                  'container'         => '',

                                  'container_class'   => '',

                                  'container_id'      => '',

                                  'menu_id'           => '',

                                  'menu_class'        => 'ul-style-2',

                                  'fallback_cb'       => 'wp_bootstrap_navwalker_desktop::fallback',

                                  'walker'            => new wp_bootstrap_navwalker_desktop(),
                                  'items_wrap' => '<ul class="%2$s">%3$s</ul>'

                              ) );
                            ?>
                        <!--<ul class="ul-style-2">
                            <li>Corporate and M&A</li>
                            <li>Construction and Real Estate</li>
                            <li>Commercial Duspute Resolution</li>
                            <li>Employment</li>
                            <li>Banking and Finance</li>
                        </ul>-->
                    </div>
                    <div class="col-lg-4">
                        <div class="widget">
                            <h5 class="id-color"><?php pll_e('news'); ?></h5>
                            <?php 
                                  wp_nav_menu( array(

                                  'theme_location'    => 'menu-4',

                                  'menu'              => 'menu-4',

                                  'depth'             => 1,

                                  'container'         => '',

                                  'container_class'   => '',

                                  'container_id'      => '',

                                  'menu_id'           => '',

                                  'menu_class'        => 'ul-style-2',

                                  'fallback_cb'       => 'wp_bootstrap_navwalker_desktop::fallback',

                                  'walker'            => new wp_bootstrap_navwalker_desktop(),
                                  'items_wrap' => '<ul class="%2$s">%3$s</ul>'

                              ) );
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="subfooter">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="de-flex">
                                <div class="de-flex-col">
                                    &copy; Copyright 2021 - Chanhtin
                                </div>
                                <div class="de-flex-col">
                                    <div class="social-icons">
                                         <?php  if(isset($social)){
                                            foreach($social as $row) { ?>
                                                <!--<a href="#"><i class="fa fa-facebook"></i></a>-->
                                                <a href="<?php echo $row['link_social'] ?>">
                                                    <img src="<?php echo $row['image_social']['url'] ?>">
                                                </a>
                                              <?php 
                                            }
                                         } ?>
                                        <!--<a href="#"><i class="fa fa-facebook fa-lg"></i></a>
                                        <a href="#"><i class="fa fa-twitter fa-lg"></i></a>
                                        <a href="#"><i class="fa fa-linkedin fa-lg"></i></a>
                                        <a href="#"><i class="fa fa-pinterest fa-lg"></i></a>
                                        <a href="#"><i class="fa fa-rss fa-lg"></i></a>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer close -->
        <div id="preloader">
            <div class="spinner">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>