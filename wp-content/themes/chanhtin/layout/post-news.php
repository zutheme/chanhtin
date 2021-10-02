<section aria-label="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                        <h2><?php pll_e('news'); ?></h2>
                        <div class="small-border"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                  $team_query = new WP_Query( array(
                      'post_type' => 'post',
                      'posts_per_page' => 3,
                      'order' => 'desc',
                      // 'tax_query' => array(
                      //     array(
                      //         'taxonomy' => 'category',
                      //         'field' => 'slug',
                      //         'terms' =>'tin-tuc'
                      //     )
                      // )
                  ));  
       
          if ($team_query->have_posts()) {
            while ($team_query->have_posts()) {
              $team_query->the_post();  
              $id = get_the_ID();
              //$link = get_post_meta( $id, 'link', true );
              $excerpt = get_the_excerpt_max(200);
              //$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full', false );
              $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full', false );
             ?>
             <div class="col-lg-4 col-md-6 mb30">
                <div class="bloglist item">
                    <div class="post-content">
                        <div class="post-image">
                            <img alt="" src="<?php echo $thumbnail[0]; ?>">
                        </div>
                        <div class="post-text">
                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span></span></a></h4>
                            <p><?php echo get_the_excerpt_max(200); ?></p>
                        </div>
                    </div>
                </div>
            </div>
               <?php
               //$order++;
                } 
          } ?>
            </div>
        </div>
    </section>
</div>