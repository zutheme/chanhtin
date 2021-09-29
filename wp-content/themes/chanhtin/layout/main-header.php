 <?php $logo = get_field('logo','customizer'); 
 $phone1 = get_field('header_phone1','customizer');
 $phone2 = get_field('header_phone2','customizer');  
 $address1 = get_field('header_address','customizer');
 $email1 = get_field('header_email','customizer');
 $social = get_field('social','customizer');
 $current_user = wp_get_current_user();
 $current_user_id = $current_user->ID; ?>
<script> var _userlogin = '';</script>
 <?php if($current_user_id > 0){ ?>
	<script> var _userlogin = '<?php echo $current_user->display_name; ?>';</script>
 <?php }
 ?>
  <!-- header begin -->
        <header class="transparent">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="de-flex sm-pt10">
                            <div class="de-flex-col">
                                <!-- logo begin -->
                                <div id="logo">
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                        <img alt="" class="logo" src="<?php echo $logo['url']; ?>">
                                        <img alt="" class="logo-2" src="<?php echo $logo['url']; ?>">
                                    </a>
                                </div>
                                <!-- logo close -->
                            </div>
                            <div class="de-flex-col header-col-mid">
                                <!-- mainmenu begin -->
                                <?php 
                                  wp_nav_menu( array(

                                  'theme_location'    => 'menu-1',

                                  'menu'              => 'menu-1',

                                  'depth'             => 4,

                                  'container'         => '',

                                  'container_class'   => '',

                                  'container_id'      => '',

                                  'menu_id'           => '',

                                  'menu_class'        => 'navigation clearfix',

                                  'fallback_cb'       => 'wp_bootstrap_navwalker_desktop::fallback',

                                  'walker'            => new wp_bootstrap_navwalker_desktop(),
                                  'items_wrap' => '<ul id="mainmenu" class="%2$s">%3$s</ul>'

                              ) );
                            ?>
                                <!-- mainmenu close -->
                            </div>
                            <div class="de-flex-col">
                                <div class="h-phone md-hide"><span><?php pll_e('needhelp'); ?></span><i class="fa fa-phone"></i><?php echo  $phone1;  ?></div>
                                <span id="menu-btn"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header close -->