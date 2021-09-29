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
	 <p><button type="button" onclick="showslide(this)">banner page 1</button></p>
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
					<p><label>title 1</label></p>
					<p><input style="width:100%" type="text" name="home-banner-title2" value="<?php if ( isset ( $prfx_stored_meta['home-banner-title2'] ) ) echo $prfx_stored_meta['home-banner-title2'][0]; ?>" ></p>
				   </td>
			  </tr>
			  <tr width="100%">
				  <td width="100%">
					<p><label>title 1</label></p>
					<p><input style="width:100%" type="text" name="home-banner-desc1" value="<?php if ( isset ( $prfx_stored_meta['home-banner-desc1'] ) ) echo $prfx_stored_meta['home-banner-desc1'][0]; ?>" ></p>
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
		 </table>
	</div>
	<div>
	     <p><button type="button" onclick="showslide(this)">services 1</button></p>
		  <table class="slide" style="display: none;">
			  <tr width="100%">
				 <td width="100%">
					<p><label class="prfx-row-title"><?php _e( 'image 1', 'prfx-textdomain' )?></label></p>
					<p><input type="text" class="edit-image" name="image_service1" value="<?php if ( isset ( $prfx_stored_meta['image_service1'] ) ) echo $prfx_stored_meta['image_service1'][0]; ?>" /></p>
					<p><img height="100" width="auto" class="thumbnail" src="<?php if ( isset ( $prfx_stored_meta['image_service1'] ) ) echo $prfx_stored_meta['image_service1'][0]; ?>"></p>
					<button type="button" class="images-menu-button">Upload</button>
				   </td>
			  </tr>
			  <tr width="100%">
				  <td width="100%">
					<p><label>title 1</label></p>
					<p><input style="width:100%" type="text" name="home-service-title1" value="<?php if ( isset ( $prfx_stored_meta['home-service-title1'] ) ) echo $prfx_stored_meta['home-service-title1'][0]; ?>" ></p>
				   </td>
			  </tr>
			  <tr width="100%">
				  <td width="100%">
					<p><label>desc 1</label></p>
					<p><textarea rows="4" cols="50" style="width:100%" name="home-service-desc1"><?php if ( isset ( $prfx_stored_meta['home-service-desc1'] ) ) echo $prfx_stored_meta['home-service-desc1'][0]; ?></textarea></p>
				   </td>
			  </tr>
		  </table>
	</div>
	<div>
	     <p><button type="button" onclick="showslide(this)">services 2</button></p>
		  <table class="slide" style="display: none;">
			  <tr width="100%">
				 <td width="100%">
					<p><label class="prfx-row-title"><?php _e( 'image 2', 'prfx-textdomain' )?></label></p>
					<p><input type="text" class="edit-image" name="image_service2" value="<?php if ( isset ( $prfx_stored_meta['image_service2'] ) ) echo $prfx_stored_meta['image_service2'][0]; ?>" /></p>
					<p><img height="100" width="auto" class="thumbnail" src="<?php if ( isset ( $prfx_stored_meta['image_service2'] ) ) echo $prfx_stored_meta['image_service2'][0]; ?>"></p>
					<button type="button" class="images-menu-button">Upload</button>
				   </td>
			  </tr>
			  <tr width="100%">
				  <td width="100%">
					<p><label>title 2</label></p>
					<p><input style="width:100%" type="text" name="home-service-title2" value="<?php if ( isset ( $prfx_stored_meta['home-service-title2'] ) ) echo $prfx_stored_meta['home-service-title2'][0]; ?>" ></p>
				   </td>
			  </tr>
			  <tr width="100%">
				  <td width="100%">
					<p><label>desc 2</label></p>
					<p><textarea rows="4" cols="50" style="width:100%" name="home-service-desc2"><?php if ( isset ( $prfx_stored_meta['home-service-desc2'] ) ) echo $prfx_stored_meta['home-service-desc2'][0]; ?></textarea></p>
				   </td>
			  </tr>
		  </table>
	</div>
	<div>
	     <p><button type="button" onclick="showslide(this)">services 3</button></p>
		  <table class="slide" style="display: none;">
			  <tr width="100%">
				 <td width="100%">
					<p><label class="prfx-row-title"><?php _e( 'image 3', 'prfx-textdomain' )?></label></p>
					<p><input type="text" class="edit-image" name="image_service3" value="<?php if ( isset ( $prfx_stored_meta['image_service3'] ) ) echo $prfx_stored_meta['image_service3'][0]; ?>" /></p>
					<p><img height="100" width="auto" class="thumbnail" src="<?php if ( isset ( $prfx_stored_meta['image_service3'] ) ) echo $prfx_stored_meta['image_service3'][0]; ?>"></p>
					<button type="button" class="images-menu-button">Upload</button>
				   </td>
			  </tr>
			  <tr width="100%">
				  <td width="100%">
					<p><label>title 3</label></p>
					<p><input style="width:100%" type="text" name="home-service-title3" value="<?php if ( isset ( $prfx_stored_meta['home-service-title3'] ) ) echo $prfx_stored_meta['home-service-title3'][0]; ?>" ></p>
				   </td>
			  </tr>
			  <tr width="100%">
				  <td width="100%">
					<p><label>desc 3</label></p>
					<p><textarea rows="4" cols="50" style="width:100%" name="home-service-desc3"><?php if ( isset ( $prfx_stored_meta['home-service-desc3'] ) ) echo $prfx_stored_meta['home-service-desc3'][0]; ?></textarea></p>
				   </td>
			  </tr>
		  </table>
	</div>
	<div>
	     <p><button type="button" onclick="showslide(this)">services 4</button></p>
		  <table class="slide" style="display: none;">
			  <tr width="100%">
				 <td width="100%">
					<p><label class="prfx-row-title"><?php _e( 'image 4', 'prfx-textdomain' )?></label></p>
					<p><input type="text" class="edit-image" name="image_service4" value="<?php if ( isset ( $prfx_stored_meta['image_service4'] ) ) echo $prfx_stored_meta['image_service4'][0]; ?>" /></p>
					<p><img height="100" width="auto" class="thumbnail" src="<?php if ( isset ( $prfx_stored_meta['image_service4'] ) ) echo $prfx_stored_meta['image_service4'][0]; ?>"></p>
					<button type="button" class="images-menu-button">Upload</button>
				   </td>
			  </tr>
			  <tr width="100%">
				  <td width="100%">
					<p><label>title 4</label></p>
					<p><input style="width:100%" type="text" name="home-service-title4" value="<?php if ( isset ( $prfx_stored_meta['home-service-title4'] ) ) echo $prfx_stored_meta['home-service-title4'][0]; ?>" ></p>
				   </td>
			  </tr>
			  <tr width="100%">
				  <td width="100%">
					<p><label>desc 4</label></p>
					<p><textarea rows="4" cols="50" style="width:100%" name="home-service-desc4"><?php if ( isset ( $prfx_stored_meta['home-service-desc4'] ) ) echo $prfx_stored_meta['home-service-desc4'][0]; ?></textarea></p>
				   </td>
			  </tr>
		  </table>
	</div>
<?php
}

function update_custom_field_page_home($post_id){
	/*slide 1*/
	 if( isset( $_POST['banner_page'])) {
         update_post_meta($post_id, 'banner_page', $_POST[ 'banner_page']);    
     }
     if( isset( $_POST['home-banner-title1'])) {
         update_post_meta($post_id, 'home-banner-title1', $_POST[ 'home-banner-title1']);    
     }
     if( isset( $_POST['home-banner-title2'])) {
         update_post_meta($post_id, 'home-banner-title2', $_POST[ 'home-banner-title2']);    
     }
     if( isset( $_POST['home-banner-desc1'])) {
         update_post_meta($post_id, 'home-banner-desc1', $_POST[ 'home-banner-desc1']);    
     }
     if( isset( $_POST['home-banner-link1'])) {
         update_post_meta($post_id, 'home-banner-link1', $_POST[ 'home-banner-link1']);    
     }
	 if( isset( $_POST['home-point-title1'])) {
         update_post_meta($post_id, 'home-point-title1', $_POST[ 'home-point-title1']);    
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
}	