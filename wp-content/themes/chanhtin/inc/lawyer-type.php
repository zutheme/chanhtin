<?php
// Our custom post type function
function create_lawyer_post_type() {

	register_post_type( 'lawyers',
	// CPT Options
		array(
			'labels' => array(
				'name' => __( 'lawyers' ),
				'singular_name' => __( 'lawyer' )
			),
			'public' => true,
			'menu_icon' => 'dashicons-megaphone',
			'has_archive' => true,
			'rewrite' => array('slug' => 'lawyers'),
		)
	);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_lawyer_post_type' );

/*
* Creating a function to create our CPT
*/

function custom_lawyer_post_type() {

// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'lawyers', 'Post Type General Name', 'hatazu' ),
		'singular_name'       => _x( 'lawyer', 'Post Type Singular Name', 'hatazu' ),
		'menu_name'           => __( 'lawyers', 'hatazu' ),
		'parent_item_colon'   => __( 'Parent lawyer', 'hatazu' ),
		'all_items'           => __( 'All lawyers', 'hatazu' ),
		'view_item'           => __( 'View lawyer', 'hatazu' ),
		'add_new_item'        => __( 'Add New lawyer', 'hatazu' ),
		'add_new'             => __( 'Add New', 'hatazu' ),
		'edit_item'           => __( 'Edit lawyer', 'hatazu' ),
		'update_item'         => __( 'Update lawyer', 'hatazu' ),
		'search_items'        => __( 'Search lawyer', 'hatazu' ),
		'not_found'           => __( 'Not Found', 'hatazu' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'hatazu' ),
	);
	
// Set other options for Custom Post Type
	
	$args = array(
		'label'               => __( 'lawyers', 'hatazu' ),
		'description'         => __( 'lawyer news and reviews', 'hatazu' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 

		'taxonomies' => array( 'post_tag'), 
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/	
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	
	// Registering your Custom Post Type
	register_post_type( 'lawyers', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action( 'init', 'custom_lawyer_post_type', 0 );


/* Create blog Type Taxonomy */
if (!function_exists('create_lawyer_group_taxonomy')) {
    function create_lawyer_group_taxonomy()
    {
        $group_labels = array(
            'name' => __( 'group_lawyer', 'hatazu' ),
            'singular_name' => __( 'group_lawyer', 'hatazu' ),
            'search_items' =>  __( 'Search groups', 'hatazu' ),
            'popular_items' => __( 'Popular groups', 'hatazu' ),
            'all_items' => __( 'All groups', 'hatazu' ),
            'parent_item' => __( 'Parent group', 'hatazu' ),
            'parent_item_colon' => __( 'Parent group:', 'hatazu' ),
            'edit_item' => __( 'Edit group', 'hatazu' ),
            'update_item' => __( 'Update group', 'hatazu' ),
            'add_new_item' => __( 'Add New group', 'hatazu' ),
            'new_item_name' => __( 'New group Name', 'hatazu' ),
            'separate_items_with_commas' => __( 'Separate groups with commas', 'hatazu' ),
            'add_or_remove_items' => __( 'Add or remove groups', 'hatazu' ),
            'choose_from_most_used' => __( 'Choose from the most used groups', 'hatazu' ),
            'menu_name' => __( 'groups_lawyer', 'hatazu' )
        );

        register_taxonomy(
            'group_lawyer',
            array( 'lawyers' ),
            array(
                'hierarchical' => true,
                'labels' => $group_labels,
                'show_ui' => true,
                'query_var' => true,
                'rewrite' => array('slug' => __('group_lawyer', 'hatazu'))
            )
        );
    }
}

add_action('init', 'create_lawyer_group_taxonomy', 0);

/*

 * Adds a meta box to the post editing screen

 */

function prfx_field_custom_lawyer_meta() {

    add_meta_box( 'prfx_meta', __( 'Field Box Title', 'prfx-textdomain' ), 'prfx_field_meta_lawyer_callback', 'lawyers','normal', 'high');

}

add_action( 'add_meta_boxes', 'prfx_field_custom_lawyer_meta');
/*
 * Outputs the content of the meta box
 */
function prfx_field_meta_lawyer_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );
    $prfx_stored_meta = get_post_meta( $post->ID ); ?>
   <table class="slide">
	  <tr width="100%">
		  <td width="100%">
			<p><label>position</label></p>
			<p><input style="width:100%" type="text" name="position" value="<?php if ( isset ( $prfx_stored_meta['position'] ) ) echo $prfx_stored_meta['position'][0]; ?>" ></p>
		   </td>
	  </tr>
	</table>
 
    <?php
}

/*

 * Saves the custom meta input

 */

function prfx_field_lawyer_save( $post_id ) {

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

    if ( "lawyers" != $post_type ) return;   

    if( isset( $_POST['position'] ) ) {
        update_post_meta( $post_id, 'position', $_POST[ 'position' ] );    
    } 
}

add_action( 'save_post', 'prfx_field_lawyer_save' );

// add_action("admin_enqueue_scripts", "lawyers_admin_script");
// function lawyers_admin_script() {
// 	    global $post_type;
//     	if( 'lawyers' != $post_type ) return;
// 	        wp_enqueue_media();
// 	        // Registers and enqueues the required javascript.
// 	        wp_register_script( 'lawyers_admin_script', get_stylesheet_directory_uri() . '/js/media_upload.js', array(), '0.0.1', true );
// 	        wp_localize_script( 'lawyers_admin_script', 'meta_image',
// 	            array(
// 	                'title' => __( 'Choose or Upload an Image', 'prfx-textdomain' ),
// 	                'button' => __( 'Use this image', 'prfx-textdomain' ),
// 	            )
// 	        );
// 	        wp_enqueue_script( 'lawyers_admin_script' );
// }