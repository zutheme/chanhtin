<?php
/*

 * Adds a meta box to the post editing screen

 */

function prfx_field_custom_page_meta() {

    add_meta_box( 'prfx_meta', __( 'Field Box Title', 'prfx-textdomain' ), 'prfx_field_meta_page_callback', 'page','normal', 'high');

}

add_action( 'add_meta_boxes', 'prfx_field_custom_page_meta');
/*
 * Outputs the content of the meta box
 */
function prfx_field_meta_page_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );
    $idpost = $post->ID;
    $prfx_stored_meta = get_post_meta( $idpost ); 
    $post_type = get_post_type($idpost);
    $template = get_post_meta( $idpost, '_wp_page_template', true );
    if ( "page" != $post_type) return;
	if('page-home.php' == $template){ 
		prfx_field_meta_custom_field_page_home($idpost);
	}elseif('page-contact.php' == $template){
		prfx_field_meta_custom_field_page_contact($idpost);
	}elseif('page-register.php' == $template){
		prfx_field_meta_custom_field_page_register($idpost);
	}
	else{
		prfx_field_meta_custom_field_page_other($idpost);
	}
}
/*

 * Saves the custom meta input

 */

function prfx_field_page_save( $post_id ) {
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );

    $is_revision = wp_is_post_revision( $post_id );

    $is_valid_nonce = ( isset( $_POST[ 'prfx_nonce' ] ) && wp_verify_nonce( $_POST[ 'prfx_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
    // Checks for input and sanitizes/saves if needed 
    $post_type = get_post_type($post_id);
    $template = get_post_meta( $post_id, '_wp_page_template', true );
    if ( "page" != $post_type) return false;
	if ("page-home.php" == $template || "page-project.php" == $template){
		update_custom_field_page_home($post_id);
    }elseif("page-contact.php" == $template){
		update_custom_field_page_contact($post_id);
	}elseif("page-register.php" == $template){
		update_custom_field_page_register($post_id);
	}
    else{
		update_custom_field_page_other($post_id);
	};
}
add_action('save_post', 'prfx_field_page_save');
/*other*/
function prfx_field_meta_custom_field_page_other( $post_id ){
     wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );
     $prfx_stored_meta = get_post_meta( $post_id ); ?>
		<div>
		 <p><button type="button" onclick="showslide(this)">banner page</button></p>
			  <table class="slide" style="display: none;">
				  <tr width="100%">
					  <td width="100%">
						<p><label class="prfx-row-title"><?php _e( 'banner', 'prfx-textdomain' )?></label></p>
						<p><input type="hidden" class="edit-image" name="banner_page" value="<?php if ( isset ( $prfx_stored_meta['banner_page'] ) ) echo $prfx_stored_meta['banner_page'][0]; ?>" /></p>
						<p><img style="height: 100px;width: auto;" class="thumbnail" src="<?php if ( isset ( $prfx_stored_meta['banner_page'] ) ) echo $prfx_stored_meta['banner_page'][0]; ?>"></p>
						<button type="button" class="images-menu-button">Upload</button>
					   </td>
					</tr>
			</table>
		</div>
<?php }
function update_custom_field_page_other($post_id){
	
	 if( isset( $_POST['banner_page'])) {
         update_post_meta($post_id, 'banner_page', $_POST[ 'banner_page']);    
     }
}
/*end other*/
function prfx_field_meta_custom_field_page_register( $post_id ){
     wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );
     $prfx_stored_meta = get_post_meta( $post_id ); ?>
		<div>
		 <p><button type="button" onclick="showslide(this)">banner page</button></p>
			  <table class="slide" style="display: none;">
				  <tr width="100%">
					  <td width="100%">
						<p><label class="prfx-row-title"><?php _e( 'banner', 'prfx-textdomain' )?></label></p>
						<p><input type="hidden" class="edit-image" name="banner_page" value="<?php if ( isset ( $prfx_stored_meta['banner_page'] ) ) echo $prfx_stored_meta['banner_page'][0]; ?>" /></p>
						<p><img style="height: 100px;width: auto;" class="thumbnail" src="<?php if ( isset ( $prfx_stored_meta['banner_page'] ) ) echo $prfx_stored_meta['banner_page'][0]; ?>"></p>
						<button type="button" class="images-menu-button">Upload</button>
					   </td>
					</tr>
			</table>
		</div>
<?php }
function update_custom_field_page_register($post_id){
	 if( isset( $_POST['banner_page'])) {
         update_post_meta($post_id, 'banner_page', $_POST[ 'banner_page']);    
     }
	 
}
function prfx_field_meta_custom_field_page_contact( $post_id ){
     wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );
     $prfx_stored_meta = get_post_meta( $post_id ); ?>
	 <div>
		
	<div>  
<?php }

function update_custom_field_page_contact($post_id){
	 if( isset( $_POST['banner_page'])) {
         update_post_meta($post_id, 'banner_page', $_POST[ 'banner_page']);    
     }
	
}
 
function prfx_field_meta_custom_field_page_home( $post_id ){ 
     wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );
     $prfx_stored_meta = get_post_meta( $post_id ); ?>
    <div>
	 <p><button type="button" onclick="showslide(this)">banner page</button></p>
		  <table class="slide" style="display: none;">
			  <tr width="100%">
				  <td width="100%">
					<p><label class="prfx-row-title"><?php _e( 'banner', 'prfx-textdomain' )?></label></p>
					<p><input type="hidden" class="edit-image" name="banner_page" value="<?php if ( isset ( $prfx_stored_meta['banner_page'] ) ) echo $prfx_stored_meta['banner_page'][0]; ?>" /></p>
					<p><img style="height: 100px;width: auto;" class="thumbnail" src="<?php if ( isset ( $prfx_stored_meta['banner_page'] ) ) echo $prfx_stored_meta['banner_page'][0]; ?>"></p>
					<button type="button" class="images-menu-button">Upload</button>
				   </td>
				</tr>
				<tr width="100%">
				  <td width="100%">
					<p><label>title 1</label></p>
					<p><input style="width:100%" type="text" name="home-banner-title1" value="<?php if ( isset ( $prfx_stored_meta['home-banner-title1'] ) ) echo $prfx_stored_meta['home-banner-title1'][0]; ?>" ></p>
				   </td>
			  </tr>
			  <tr width="100%">
				  <td width="100%">
					<p><label>title 2</label></p>
					<p><input style="width:100%" type="text" name="home-banner-title2" value="<?php if ( isset ( $prfx_stored_meta['home-banner-title2'] ) ) echo $prfx_stored_meta['home-banner-title2'][0]; ?>" ></p>
				   </td>
			  </tr>
			  <tr width="100%">
				  <td width="100%">
					<p><label>title 1</label></p>
					<p><textarea style="width:100%" name="home-banner-desc1"><?php if ( isset ( $prfx_stored_meta['home-banner-desc1'] ) ) echo $prfx_stored_meta['home-banner-desc1'][0]; ?>" </textarea></p>
				   </td>
			  </tr>
		</table>
	</div>
	<div>
	     <p><button type="button" onclick="showslide(this)">make point</button></p>
		  <table class="slide" style="display: none;">
			  <tr width="100%">
				  <td width="100%">
					<p><label>title make point</label></p>
					<p><input style="width:100%" type="text" name="home-point-title1" value="<?php if ( isset ( $prfx_stored_meta['home-point-title1'] ) ) echo $prfx_stored_meta['home-point-title1'][0]; ?>" ></p>
				   </td>
			  </tr>
		</table>
	</div>
	<div>
	     <p><button type="button" onclick="showslide(this)">welcome</button></p>
		  <table class="slide" style="display: none;">
			  <tr width="100%">
				  <td width="100%">
					<p><label>title 1</label></p>
					<p><input style="width:100%" type="text" name="home-welcome-title1" value="<?php if ( isset ( $prfx_stored_meta['home-welcome-title1'] ) ) echo $prfx_stored_meta['home-welcome-title1'][0]; ?>" ></p>
				   </td>
			  </tr>
			  <tr width="100%">
				  <td width="100%">
					<p><label>title 2</label></p>
					<p><input style="width:100%" type="text" name="home-welcome-title2" value="<?php if ( isset ( $prfx_stored_meta['home-welcome-title2'] ) ) echo $prfx_stored_meta['home-welcome-title2'][0]; ?>" ></p>
				   </td>
			  </tr>
			  <tr width="100%">
				  <td width="100%">
					<p><label>title 3</label></p>
					<p><textarea rows="4" cols="50" style="width:100%" name="home-welcome-title3"><?php if ( isset ( $prfx_stored_meta['home-welcome-title3'] ) ) echo $prfx_stored_meta['home-welcome-title3'][0]; ?></textarea></p>
				   </td>
			  </tr>
		  </table>
	</div>
	<div>
		 <p><button type="button" onclick="showslide(this)">services</button></p>
		  <table class="slide" style="display: none;">
			  <tr width="100%">
				  <td width="100%">
					<p><label>title 1</label></p>
					<p><input style="width:100%" type="text" name="home-headsv-title1" value="<?php if ( isset ( $prfx_stored_meta['home-headsv-title1'] ) ) echo $prfx_stored_meta['home-headsv-title1'][0]; ?>" ></p>
				   </td>
			  </tr>
			  <tr width="100%">
				  <td width="100%">
					<p><label>amout item</label></p>
					<p><input style="width:100%" type="number" name="amount-service-item" value="<?php if ( isset ( $prfx_stored_meta['amount-service-item'] ) ) echo $prfx_stored_meta['amount-service-item'][0]; ?>" ></p>
				   </td>
			  </tr>
			  
		 </table>
	</div>
<?php $count_item = $prfx_stored_meta['amount-service-item'][0];
		  if($count_item > 0 ){
			 $j = 0;
			 for($i=0;$i<$count_item;$i++){
					$j = $i + 1;
			 ?>
			 <div>
				 <p><button type="button" onclick="showslide(this)">services <?php echo $j; ?></button></p>
				  <table class="slide" style="display: none;">
					  <tr width="100%">
						 <td width="100%">
							<p><label class="prfx-row-title"><?php _e( 'image '.$j, 'prfx-textdomain' )?></label></p>
							<p><input type="text" class="edit-image" name="image_service<?php echo $j; ?>" value="<?php if ( isset ( $prfx_stored_meta['image_service'.$j] ) ) echo $prfx_stored_meta['image_service'.$j][0]; ?>" /></p>
							<p><img height="100" width="auto" class="thumbnail" src="<?php if ( isset ( $prfx_stored_meta['image_service'.$j] ) ) echo $prfx_stored_meta['image_service'.$j][0]; ?>"></p>
							<button type="button" class="images-menu-button">Upload</button>
						   </td>
					  </tr>
					  <tr width="100%">
						  <td width="100%">
							<p><label>title <?php echo $j; ?></label></p>
							<p><input style="width:100%" type="text" name="home-service-title<?php echo $j; ?>" value="<?php if ( isset ( $prfx_stored_meta['home-service-title'.$j] ) ) echo $prfx_stored_meta['home-service-title'.$j][0]; ?>" ></p>
						   </td>
					  </tr>
					  <tr width="100%">
						  <td width="100%">
							<p><label>desc <?php echo $j; ?></label></p>
							<p><textarea rows="4" cols="50" style="width:100%" name="home-service-desc<?php echo $j; ?>"><?php if ( isset ( $prfx_stored_meta['home-service-desc'.$j] ) ) echo $prfx_stored_meta['home-service-desc'.$j][0]; ?></textarea></p>
						   </td>
					  </tr>
					   <tr width="100%">
						  <td width="100%">
							<p><label>Link <?php echo $j; ?></label></p>
							<p><input style="width:100%" type="text" name="home-service-link<?php echo $j; ?>" value="<?php if ( isset ( $prfx_stored_meta['home-service-link'.$j] ) ) echo $prfx_stored_meta['home-service-link'.$j][0]; ?>" ></p>
						   </td>
					  </tr>
				  </table>
			</div>
		<?php }
		 }?>
		<div>
		 <p><button type="button" onclick="showslide(this)">services feature 1</button></p>
		  <table class="slide" style="display: none;">
			  <tr width="100%">
				 <td width="100%">
					<p><label class="prfx-row-title"><?php _e( 'image ', 'prfx-textdomain' )?></label></p>
					<p><input type="text" class="edit-image" name="feature_image_service1" value="<?php if ( isset ( $prfx_stored_meta['feature_image_service1'] ) ) echo $prfx_stored_meta['feature_image_service1'][0]; ?>" /></p>
					<p><img height="100" width="auto" class="thumbnail" src="<?php if ( isset ( $prfx_stored_meta['feature_image_service1'] ) ) echo $prfx_stored_meta['feature_image_service1'][0]; ?>"></p>
					<button type="button" class="images-menu-button">Upload</button>
				   </td>
			  </tr>
			  <tr width="100%">
				  <td width="100%">
					<p><label>title </label></p>
					<p><input style="width:100%" type="text" name="feature-service-title1" value="<?php if ( isset ( $prfx_stored_meta['feature-service-title1'] ) ) echo $prfx_stored_meta['feature-service-title1'][0]; ?>" ></p>
				   </td>
			  </tr>
			  <tr width="100%">
				  <td width="100%">
					<p><label>desc </label></p>
					<p><textarea rows="4" cols="50" style="width:100%" name="feature-service-desc1"><?php if ( isset ( $prfx_stored_meta['feature-service-desc1'] ) ) echo $prfx_stored_meta['feature-service-desc1'][0]; ?></textarea></p>
				   </td>
			  </tr>
			   <tr width="100%">
				  <td width="100%">
					<p><label>Link </label></p>
					<p><input style="width:100%" type="text" name="feature-service-link1" value="<?php if ( isset ( $prfx_stored_meta['feature-service-link1'] ) ) echo $prfx_stored_meta['feature-service-link1'][0]; ?>" ></p>
				   </td>
			  </tr>
		  </table>
		</div>
		<div>
		 <p><button type="button" onclick="showslide(this)">services feature 2</button></p>
		  <table class="slide" style="display: none;">
			  <tr width="100%">
				 <td width="100%">
					<p><label class="prfx-row-title"><?php _e( 'image ', 'prfx-textdomain' )?></label></p>
					<p><input type="text" class="edit-image" name="feature_image_service2" value="<?php if ( isset ( $prfx_stored_meta['feature_image_service2'] ) ) echo $prfx_stored_meta['feature_image_service2'][0]; ?>" /></p>
					<p><img height="100" width="auto" class="thumbnail" src="<?php if ( isset ( $prfx_stored_meta['feature_image_service2'] ) ) echo $prfx_stored_meta['feature_image_service2'][0]; ?>"></p>
					<button type="button" class="images-menu-button">Upload</button>
				   </td>
			  </tr>
			  <tr width="100%">
				  <td width="100%">
					<p><label>title </label></p>
					<p><input style="width:100%" type="text" name="feature-service-title2" value="<?php if ( isset ( $prfx_stored_meta['feature-service-title2'] ) ) echo $prfx_stored_meta['feature-service-title2'][0]; ?>" ></p>
				   </td>
			  </tr>
			  <tr width="100%">
				  <td width="100%">
					<p><label>desc </label></p>
					<p><textarea rows="4" cols="50" style="width:100%" name="feature-service-desc2"><?php if ( isset ( $prfx_stored_meta['feature-service-desc2'] ) ) echo $prfx_stored_meta['feature-service-desc2'][0]; ?></textarea></p>
				   </td>
			  </tr>
			   <tr width="100%">
				  <td width="100%">
					<p><label>Link </label></p>
					<p><input style="width:100%" type="text" name="feature-service-link2" value="<?php if ( isset ( $prfx_stored_meta['feature-service-link2'] ) ) echo $prfx_stored_meta['feature-service-link2'][0]; ?>" ></p>
				   </td>
			  </tr>
		  </table>
		</div>
		<div>
		 <p><button type="button" onclick="showslide(this)">services feature 3</button></p>
		  <table class="slide" style="display: none;">
			  <tr width="100%">
				 <td width="100%">
					<p><label class="prfx-row-title"><?php _e( 'image ', 'prfx-textdomain' )?></label></p>
					<p><input type="text" class="edit-image" name="feature_image_service3" value="<?php if ( isset ( $prfx_stored_meta['feature_image_service3'] ) ) echo $prfx_stored_meta['feature_image_service3'][0]; ?>" /></p>
					<p><img height="100" width="auto" class="thumbnail" src="<?php if ( isset ( $prfx_stored_meta['feature_image_service3'] ) ) echo $prfx_stored_meta['feature_image_service3'][0]; ?>"></p>
					<button type="button" class="images-menu-button">Upload</button>
				   </td>
			  </tr>
			  <tr width="100%">
				  <td width="100%">
					<p><label>title </label></p>
					<p><input style="width:100%" type="text" name="feature-service-title3" value="<?php if ( isset ( $prfx_stored_meta['feature-service-title3'] ) ) echo $prfx_stored_meta['feature-service-title3'][0]; ?>" ></p>
				   </td>
			  </tr>
			  <tr width="100%">
				  <td width="100%">
					<p><label>desc </label></p>
					<p><textarea rows="4" cols="50" style="width:100%" name="feature-service-desc3"><?php if ( isset ( $prfx_stored_meta['feature-service-desc3'] ) ) echo $prfx_stored_meta['feature-service-desc3'][0]; ?></textarea></p>
				   </td>
			  </tr>
			   <tr width="100%">
				  <td width="100%">
					<p><label>Link </label></p>
					<p><input style="width:100%" type="text" name="feature-service-link3" value="<?php if ( isset ( $prfx_stored_meta['feature-service-link3'] ) ) echo $prfx_stored_meta['feature-service-link3'][0]; ?>" ></p>
				   </td>
			  </tr>
		  </table>
		</div>
		<div>
		 <p><button type="button" onclick="showslide(this)">services feature 4</button></p>
		  <table class="slide" style="display: none;">
			  <tr width="100%">
				 <td width="100%">
					<p><label class="prfx-row-title"><?php _e( 'image ', 'prfx-textdomain' )?></label></p>
					<p><input type="text" class="edit-image" name="feature_image_service4" value="<?php if ( isset ( $prfx_stored_meta['feature_image_service4'] ) ) echo $prfx_stored_meta['feature_image_service4'][0]; ?>" /></p>
					<p><img height="100" width="auto" class="thumbnail" src="<?php if ( isset ( $prfx_stored_meta['feature_image_service4'] ) ) echo $prfx_stored_meta['feature_image_service4'][0]; ?>"></p>
					<button type="button" class="images-menu-button">Upload</button>
				   </td>
			  </tr>
			  <tr width="100%">
				  <td width="100%">
					<p><label>title </label></p>
					<p><input style="width:100%" type="text" name="feature-service-title4" value="<?php if ( isset ( $prfx_stored_meta['feature-service-title4'] ) ) echo $prfx_stored_meta['feature-service-title4'][0]; ?>" ></p>
				   </td>
			  </tr>
			  <tr width="100%">
				  <td width="100%">
					<p><label>desc </label></p>
					<p><textarea rows="4" cols="50" style="width:100%" name="feature-service-desc4"><?php if ( isset ( $prfx_stored_meta['feature-service-desc4'] ) ) echo $prfx_stored_meta['feature-service-desc4'][0]; ?></textarea></p>
				   </td>
			  </tr>
			   <tr width="100%">
				  <td width="100%">
					<p><label>Link </label></p>
					<p><input style="width:100%" type="text" name="feature-service-link4" value="<?php if ( isset ( $prfx_stored_meta['feature-service-link4'] ) ) echo $prfx_stored_meta['feature-service-link4'][0]; ?>" ></p>
				   </td>
			  </tr>
		  </table>
		</div>
		<div>
		 <p><button type="button" onclick="showslide(this)">team</button></p>
		  <table class="slide" style="display: none;">
			  <tr width="100%">
				  <td width="100%">
					<p><label>title 1</label></p>
					<p><input style="width:100%" type="text" name="home-headteam-title" value="<?php if ( isset ( $prfx_stored_meta['home-headteam-title'] ) ) echo $prfx_stored_meta['home-headteam-title'][0]; ?>" ></p>
				   </td>
			  </tr>
		 </table>
	</div>
	<div>
	 <p><button type="button" onclick="showslide(this)">background testimonial</button></p>
		  <table class="slide" style="display: none;">
			   <tr width="100%">
				  <td width="100%">
					<p><label>title 1</label></p>
					<p><input style="width:100%" type="text" name="bg_testimonial_title" value="<?php if ( isset ( $prfx_stored_meta['bg_testimonial_title'] ) ) echo $prfx_stored_meta['bg_testimonial_title'][0]; ?>" ></p>
				   </td>
			  </tr>
			  <tr width="100%">
				  <td width="100%">
					<p><label class="prfx-row-title"><?php _e( 'background testimonial', 'prfx-textdomain' )?></label></p>
					<p><input type="hidden" class="edit-image" name="bg_testimonial" value="<?php if ( isset ( $prfx_stored_meta['bg_testimonial'] ) ) echo $prfx_stored_meta['bg_testimonial'][0]; ?>" /></p>
					<p><img style="height: 100px;width: auto;" class="thumbnail" src="<?php if ( isset ( $prfx_stored_meta['bg_testimonial'] ) ) echo $prfx_stored_meta['bg_testimonial'][0]; ?>"></p>
					<button type="button" class="images-menu-button">Upload</button>
				   </td>
				</tr>
		</table>
	</div>
<?php
}

function update_custom_field_page_home($post_id){
	/*slide 1*/
	 if( isset( $_POST['banner_page'])) {
         update_post_meta($post_id, 'banner_page', $_POST['banner_page']);    
     }
     if( isset( $_POST['home-banner-title1'])) {
         update_post_meta($post_id, 'home-banner-title1', $_POST['home-banner-title1']);    
     }
     if( isset( $_POST['home-banner-title2'])) {
         update_post_meta($post_id, 'home-banner-title2', $_POST['home-banner-title2']);    
     }
     if( isset( $_POST['home-banner-desc1'])) {
         update_post_meta($post_id, 'home-banner-desc1', $_POST['home-banner-desc1']);    
     }
     if( isset( $_POST['home-banner-link1'])) {
         update_post_meta($post_id, 'home-banner-link1', $_POST['home-banner-link1']);    
     }
	 if( isset( $_POST['home-point-title1'])) {
         update_post_meta($post_id, 'home-point-title1', $_POST['home-point-title1']);    
     }
	 if( isset( $_POST['home-welcome-title1'])) {
         update_post_meta($post_id, 'home-welcome-title1', $_POST[ 'home-welcome-title1']);    
     }
	  if( isset( $_POST['home-welcome-title2'])) {
         update_post_meta($post_id, 'home-welcome-title2', $_POST[ 'home-welcome-title2']);    
     }
	 if( isset( $_POST['home-welcome-title3'])) {
         update_post_meta($post_id, 'home-welcome-title3', $_POST[ 'home-welcome-title3']);    
     }
	 
	 if( isset( $_POST['home-headsv-title1'])) {
         update_post_meta($post_id, 'home-headsv-title1', $_POST[ 'home-headsv-title1']);    
     }
	 if( isset( $_POST['amount-service-item'])) {
         update_post_meta($post_id, 'amount-service-item', $_POST[ 'amount-service-item']);    
     }
	 /*service 1*/
	 $prfx_stored_meta = get_post_meta(post_id);
	 $count_item = $prfx_stored_meta['amount-service-item'][0];
	 /*service 1*/
	 if( isset( $_POST['image_service1'])) {
         update_post_meta($post_id, 'image_service1', $_POST[ 'image_service1']);    
     }
	 if( isset( $_POST['home-service-title1'])) {
         update_post_meta($post_id, 'home-service-title1', $_POST[ 'home-service-title1']);    
     }
	 if( isset( $_POST['home-service-desc1'])) {
         update_post_meta($post_id, 'home-service-desc1', $_POST[ 'home-service-desc1']);    
     }
	 if( isset( $_POST['home-service-link1'])) {
         update_post_meta($post_id, 'home-service-link1', $_POST[ 'home-service-link1']);    
     }
	 /*service 2*/
	 if( isset( $_POST['image_service2'])) {
         update_post_meta($post_id, 'image_service2', $_POST[ 'image_service2']);    
     }
	 if( isset( $_POST['home-service-title2'])) {
         update_post_meta($post_id, 'home-service-title2', $_POST[ 'home-service-title2']);    
     }
	 if( isset( $_POST['home-service-desc2'])) {
         update_post_meta($post_id, 'home-service-desc2', $_POST[ 'home-service-desc2']);    
     }
	  if( isset( $_POST['home-service-link2'])) {
         update_post_meta($post_id, 'home-service-link2', $_POST[ 'home-service-link2']);    
     }
	 /*service 3*/
	 if( isset( $_POST['image_service3'])) {
         update_post_meta($post_id, 'image_service3', $_POST[ 'image_service3']);    
     }
	 if( isset( $_POST['home-service-title3'])) {
         update_post_meta($post_id, 'home-service-title3', $_POST[ 'home-service-title3']);    
     }
	 if( isset( $_POST['home-service-desc3'])) {
         update_post_meta($post_id, 'home-service-desc3', $_POST[ 'home-service-desc3']);    
     }
	  if( isset( $_POST['home-service-link3'])) {
         update_post_meta($post_id, 'home-service-link3', $_POST[ 'home-service-link3']);    
     }
	 /*service 4*/
	 if( isset( $_POST['image_service4'])) {
         update_post_meta($post_id, 'image_service4', $_POST[ 'image_service4']);    
     }
	 if( isset( $_POST['home-service-title4'])) {
         update_post_meta($post_id, 'home-service-title4', $_POST[ 'home-service-title4']);    
     }
	 if( isset( $_POST['home-service-desc4'])) {
         update_post_meta($post_id, 'home-service-desc4', $_POST[ 'home-service-desc4']);    
     }
	 if( isset( $_POST['home-service-link4'])) {
         update_post_meta($post_id, 'home-service-link4', $_POST[ 'home-service-link4']);    
     }
	 /*service 5*/
	 if( isset( $_POST['image_service5'])) {
         update_post_meta($post_id, 'image_service5', $_POST[ 'image_service5']);    
     }
	 if( isset( $_POST['home-service-title5'])) {
         update_post_meta($post_id, 'home-service-title5', $_POST[ 'home-service-title5']);    
     }
	 if( isset( $_POST['home-service-desc5'])) {
         update_post_meta($post_id, 'home-service-desc5', $_POST[ 'home-service-desc5']);    
     }
	 if( isset( $_POST['home-service-link5'])) {
         update_post_meta($post_id, 'home-service-link5', $_POST[ 'home-service-link5']);    
     }
	 /*service 6*/
	 if( isset( $_POST['image_service6'])) {
         update_post_meta($post_id, 'image_service6', $_POST[ 'image_service6']);    
     }
	 if( isset( $_POST['home-service-title6'])) {
         update_post_meta($post_id, 'home-service-title6', $_POST[ 'home-service-title6']);    
     }
	 if( isset( $_POST['home-service-desc6'])) {
         update_post_meta($post_id, 'home-service-desc6', $_POST[ 'home-service-desc6']);    
     }
	 if( isset( $_POST['home-service-link6'])) {
         update_post_meta($post_id, 'home-service-link6', $_POST[ 'home-service-link6']);    
     }
	 /*feature service 1*/
	 if( isset( $_POST['feature_image_service1'])) {
         update_post_meta($post_id, 'feature_image_service1', $_POST[ 'feature_image_service1']);    
     }
	 if( isset( $_POST['feature-service-title1'])) {
         update_post_meta($post_id, 'feature-service-title1', $_POST[ 'feature-service-title1']);    
     }
	 if( isset( $_POST['feature-service-desc1'])) {
         update_post_meta($post_id, 'feature-service-desc1', $_POST[ 'feature-service-desc1']);    
     }
	 if( isset( $_POST['feature-service-link1'])) {
         update_post_meta($post_id, 'feature-service-link1', $_POST[ 'feature-service-link1']);    
     }
	 /*feature service 2*/
	 if( isset( $_POST['feature_image_service2'])) {
         update_post_meta($post_id, 'feature_image_service2', $_POST[ 'feature_image_service2']);    
     }
	 if( isset( $_POST['feature-service-title2'])) {
         update_post_meta($post_id, 'feature-service-title2', $_POST[ 'feature-service-title2']);    
     }
	 if( isset( $_POST['feature-service-desc2'])) {
         update_post_meta($post_id, 'feature-service-desc2', $_POST[ 'feature-service-desc2']);    
     }
	 if( isset( $_POST['feature-service-link2'])) {
         update_post_meta($post_id, 'feature-service-link2', $_POST[ 'feature-service-link2']);    
     }
	 /*feature service 3*/
	 if( isset( $_POST['feature_image_service3'])) {
         update_post_meta($post_id, 'feature_image_service3', $_POST[ 'feature_image_service3']);    
     }
	 if( isset( $_POST['feature-service-title3'])) {
         update_post_meta($post_id, 'feature-service-title3', $_POST[ 'feature-service-title3']);    
     }
	 if( isset( $_POST['feature-service-desc3'])) {
         update_post_meta($post_id, 'feature-service-desc3', $_POST[ 'feature-service-desc3']);    
     }
	 if( isset( $_POST['feature-service-link3'])) {
         update_post_meta($post_id, 'feature-service-link3', $_POST[ 'feature-service-link3']);    
     }
	 /*feature service 4*/
	 if( isset( $_POST['feature_image_service4'])) {
         update_post_meta($post_id, 'feature_image_service4', $_POST[ 'feature_image_service4']);    
     }
	 if( isset( $_POST['feature-service-title4'])) {
         update_post_meta($post_id, 'feature-service-title4', $_POST[ 'feature-service-title4']);    
     }
	 if( isset( $_POST['feature-service-desc4'])) {
         update_post_meta($post_id, 'feature-service-desc4', $_POST[ 'feature-service-desc4']);    
     }
	 if( isset( $_POST['feature-service-link4'])) {
         update_post_meta($post_id, 'feature-service-link4', $_POST[ 'feature-service-link4']);    
     }
	 /*lawyer team*/
	 if( isset( $_POST['home-headteam-title'])) {
         update_post_meta($post_id, 'home-headteam-title', $_POST[ 'home-headteam-title']);    
     }
	 /*end lawyer*/
	 if( isset( $_POST['bg_testimonial_title'])) {
         update_post_meta($post_id, 'bg_testimonial_title', $_POST[ 'bg_testimonial_title']);    
     }
	 if( isset( $_POST['bg_testimonial'])) {
         update_post_meta($post_id, 'bg_testimonial', $_POST[ 'bg_testimonial']);    
     }
	 
}	