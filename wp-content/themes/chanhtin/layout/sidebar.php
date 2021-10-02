<?php $current_language = pll_current_language('slug'); 
      $aboutus = get_field('aboutus_'.$current_language,'customizer');   
?>
<!-- support-section -->
<div class="widget widget-post">
    <h4><?php pll_e('recentnews'); ?></h4>
    <div class="small-border"></div>
    <ul>
         <?php $active="";        
           $team_query = new WP_Query( array(
                'post_type' => 'post',
                'posts_per_page' => '5',
            ));
          $count = 0;
         if($team_query->have_posts()) {
          while ($team_query->have_posts()) {
                $team_query->the_post();  
                $id = get_the_ID();
                $position = get_post_meta( $id, 'position', true );
                $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full', false );
                if(!$thumbnail){
                     $rand = rand(0,4);
                    $_thumbnail = get_template_directory()."/images/no-thumbnail.jpg";
                  }else{
                    $_thumbnail = $thumbnail[0];
                  }
                ?>
                  <li><span class="thumb"><img src="<?php echo $_thumbnail; ?>" class=""></span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>  
                    <?php 
                    $count++; 
                  }//end while
              } else {
                  echo "nothing found";
              }//end if have post
              wp_reset_query();  ?>
    </ul>
</div>
<div class="widget widget-post">
    <h4><?php pll_e('categories'); ?></h4>
    <div class="small-border"></div>
    <?php 
          wp_nav_menu( array(

          'theme_location'    => 'menu-3',

          'menu'              => 'menu-3',

          'depth'             => 1,

          'container'         => '',

          'container_class'   => '',

          'container_id'      => '',

          'menu_id'           => '',

          'menu_class'        => 'list-cate',

          'fallback_cb'       => 'wp_bootstrap_navwalker_desktop::fallback',

          'walker'            => new wp_bootstrap_navwalker_desktop(),
          'items_wrap' => '<ul class="%2$s">%3$s</ul>'

      ) ); ?>
</div>
<div class="widget widget-text">
    <h4><?php pll_e('aboutus'); ?></h4>
    <div class="small-border"></div>
    <?php echo $aboutus; ?>
</div>
<div class="widget widget_tags">
    <h4><?php pll_e('populartags'); ?></h4>
    <div class="small-border"></div>
    <ul>
        <?php if (function_exists('wp_tag_cloud')) {

            $tags = wp_tag_cloud( array('smallest'=>10, 'largest'=>10, 'orderby'=>'name', 'order'=>'ASC', 'format' => 'array') );

            foreach($tags as $tag) {

                if(isset($tag) && !empty($tag)){

                    echo '<li>'.$tag.'</li>';

                }

            }

        }?>
        <!--<li><a href="#link">Art</a></li>-->
        
    </ul>
</div>
