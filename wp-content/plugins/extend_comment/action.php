<?php 
if(!function_exists('send_comment')):
	function send_comment(){
			 //check_ajax_referer( 'my-special-string', 'security' );
			 $user = wp_get_current_user();
			 $_user_id = 0;
			 if(isset($user)){
				 $_user_id = $user->ID;
			 }
			 wp_verify_nonce( 'my-special-string','security');
			 $comment_post_ID = htmlspecialchars(stripslashes(trim($_POST['comment_post_ID'])));
			 $comment_parent = htmlspecialchars(stripslashes(trim($_POST['comment_parent'])));
			 $text_comment = htmlspecialchars(stripslashes(trim($_POST['comment_body'])));
             $phone = htmlspecialchars(stripslashes(trim($_POST['phone'])));
             $email = htmlspecialchars(stripslashes(trim($_POST['email'])));
             $fullname = htmlspecialchars(stripslashes(trim($_POST['fullname'])));
             $rate = htmlspecialchars(stripslashes(trim($_POST['max'])));
			 date_default_timezone_set('Asia/Ho_Chi_Minh');
			 $time = current_time('mysql');
			 $data = array(
			    'comment_post_ID' => $comment_post_ID,
			    'comment_author' => $fullname,
			    'comment_author_email' => $email,
			    'comment_author_url' => '',
			    'comment_content' => $text_comment,
			    'comment_type' => '',
			    'comment_parent' => $comment_parent,
			    'user_id' => $_user_id,
			    'comment_author_IP' => getUserIP(),
			    'comment_agent' => 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.0.10) Gecko/2009042316 Firefox/3.0.10 (.NET CLR 3.5.30729)',
			    'comment_date' => $time,
			    'comment_approved' => 0,
			);
			$comment_id = wp_insert_comment($data);
            $phone = wp_filter_nohtml_kses($phone);
            add_comment_meta( $comment_id, 'phone', $phone );
            $rate = wp_filter_nohtml_kses($rate);
            add_comment_meta( $comment_id, 'rating', $rate );
			//pll__('success');
			$result = array('error'=>0,'desc'=>'success');
            echo json_encode($result);
            wp_die();
	}
endif;
add_action( 'wp_ajax_send_comment', 'send_comment' );
add_action( 'wp_ajax_nopriv_send_comment', 'send_comment' );
function getUserIP()
{
    // Get real visitor IP behind CloudFlare network
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
              $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
              $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];
    if(filter_var($client, FILTER_VALIDATE_IP)){
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP)){
        $ip = $forward;
    }
    else{
        $ip = $remote;
    }

    return $ip;
}
if(!function_exists('form_comment')):
	function form_comment(){ 
     if(is_single()) {
		$user = wp_get_current_user();
		$current_user_id = $user->ID;
		$avatar = plugin_dir_url(__FILE__) .'image/guest1.png';
		if(isset($avatar)){
			$avatar = esc_url(get_avatar_url($user->ID));
		} ?>
		<script> var _url_ajax = '<?php echo admin_url( 'admin-ajax.php' ); ?>'; </script>
	 <div class="comments-container form-comment">
        <ul class="comments-list">
 		<li> 
            <form class="frm-comment">
                <?php $ajax_nonce = wp_create_nonce( "my-special-string" ); ?>          
                <input type='hidden' class="my-special-string" name='my-special-string' value='<?php echo $ajax_nonce; ?>' />
                    <input type='hidden' class="comment_post_ID" name='comment_post_ID' value='<?php echo get_the_ID(); ?>' />
                    <input type='hidden' class="comment_parent" name='comment_parent' value='0' />
                    <div class="comment-main-level">
                        <!-- Avatar -->
                        <div class="comment-avatar"><img src="<?php echo $avatar; ?>" alt=""></div>
                        <!-- Contenedor del Comentario -->
                        <div class="comment-box">
                            <div class="comment-head">
                                <h6 class="comment-name by-author"><a href="#"><?php pll_e('comment'); ?></a></h6>
                                <!-- <span>Đánh giá</span> -->
                                 <span class="rating">
                                <span class="chk-rate"><?php pll_e('review'); ?></span>&nbsp; 
                                  <?php for( $i=0; $i < 5; $i++ ) { ?>
                                  	 <span class="item">
                                       <input type="radio" name="rating" class="rate" value="<?php echo $i; ?>" />
                                       <label class="lb_radio"><span class="fa fa-star-empty"></span></label><!-- fa fa-star -->
                                     </span>
                                    <?php } ?>
                                  </span> 
                            </div>
                            <div class="comment-content">
                                <textarea name="comment" class="cmt-content form-control" rows="4" aria-required="true"></textarea>
                            </div>
                            <button class="post-comment" type="button" onclick="post_comment(this);"><?php pll_e('post'); ?></button>
                        </div>
                    </div>
                </form>
            </li>
		</ul>
	</div>
<?php }
}
endif;

if(!function_exists('form_user_comment')):
	function form_user_comment(){ 
		if(is_single()) {  
			$user = wp_get_current_user();
			if(!isset($user )) return;
		?>
			<div class="modal-comment-form">
			  <div class="modal-comment">
				<div class="modal-content-comment">   
					<form class="frm-comment body">
						<span class="close">&times;</span>
						<div class="row">     
								<div class="form-reg">
									<p>Vòng lòng để lại thông tin để chúng tôi xác nhận</p>
									<div class="input-group-comment">
										<input type="text" class="form-control-comment fullname" name="fullname" placeholder="Họ và tên" required>
									</div>
									<div class="input-group-comment">
										<input type="number" class="form-control-comment phone" name="phone" placeholder="Điện thoại" required>
									</div>          
									<div class="input-group-comment">
										<input type="email" class="form-control-comment email" name="email" placeholder="E-mail (nếu có)">
									</div>      
								  <div class="input-group-comment area-btn">
										<a href="javascript:void(0)" class="btn btn-default btn-submit">Xác nhận</a>
								  </div>
								  <p><img class="loading" style="display:none;width:30px;" src="<?php echo plugin_dir_url(__FILE__); ?>image/loader.gif"></p>
								  <span class="result"></span>      
							</div>
						</div>
					</form>     
				</div>
			  </div>
			</div>
		<?php } 
	} 
endif;