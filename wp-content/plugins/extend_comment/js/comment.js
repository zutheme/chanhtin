function setCookie(cname,cvalue,exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function setCookieHours(cname,cvalue,hours) {
    var d = new Date();
    d.setTime(d.getTime() + (hours*60*60*1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

var e_modal_comment_form = document.getElementsByClassName("modal-comment-form")[0];
var e_modal_comment = document.getElementsByClassName("modal-comment")[0];
var e_frm_comment_body = e_modal_comment.getElementsByClassName("body")[0];
var e_btn_submit = e_frm_comment_body.getElementsByClassName("btn-submit")[0];
e_btn_submit.addEventListener("click",function(){
  var e_fullname= e_frm_comment_body.getElementsByClassName("fullname")[0];
  var e_phone = e_frm_comment_body.getElementsByClassName("phone")[0];
  var e_email = e_frm_comment_body.getElementsByClassName("email")[0];
  var _fullname = e_fullname.value;
  var _phone = e_phone.value;
  var _email = e_email.value;
  var obj = { phone: _phone, email: _email, fullname:_fullname };
  var json_str = JSON.stringify(obj);
  setCookie('ckuser',json_str,1);
  e_modal_comment.style.display = "none";
});

var e_close_modal = e_frm_comment_body.getElementsByClassName("close")[0];
e_close_modal.addEventListener("click",function(){
  e_modal_comment.style.display = "none";
});
//form comment
var e_frm_comment = document.getElementsByClassName("frm-comment")[0];
var e_textarea = e_frm_comment.getElementsByClassName("cmt-content")[0];
e_textarea.addEventListener("click",function(){
    var obj_ck = getCookie('ckuser');
    if(!obj_ck){
      e_modal_comment.style.display = "block";
    }
});
var e_lb_radio = e_frm_comment.getElementsByClassName('lb_radio');
var e_item = e_frm_comment.getElementsByClassName('item');
var e_chk_true;var max=0;
for(var t = 0; t < e_lb_radio.length; t++){
    e_lb_radio[t].addEventListener("click", function(){
  		var e_check = this.parentElement;
      var e_rate = e_check.getElementsByClassName('rate')[0];
      max=0;
      if(e_rate.checked === false){
        e_rate.checked = true;
      }else {
        e_rate.checked = false;
      }
      for(var t = 0; t < e_item.length; t++){
        e_chk_true = e_item[t].getElementsByClassName('rate')[0];
        if(e_chk_true.checked === true){
          max = e_chk_true.value;
          max = parseInt(max)+1;
        }
      }
  		for(var t = 0; t < e_item.length; t++){
  			var _exist_class = e_item[t].getElementsByClassName('lb_radio')[0].getElementsByTagName("span")[0]
  			if(_exist_class.classList.contains('fa-star-compact')){
  				_exist_class.className = _exist_class.className.replace(/\bfa-star-compact\b/g, "");
  				_exist_class.classList.add("fa-star-empty");
  			}
  		}
      if(max > 0){
          for(var k = 0; k < e_item.length; k++){
          if(k == max) break;
          var _exist_class = e_item[k].getElementsByClassName('lb_radio')[0].getElementsByTagName("span")[0]
          if(_exist_class.classList.contains('fa-star-empty')){
            _exist_class.className = _exist_class.className.replace(/\bfa-star-empty\b/g, "");
            _exist_class.classList.add("fa-star-compact");
          }
        }
      }
	});  
}
var e_reply_link;
var e_list_item_comment = document.getElementsByClassName("list-item-comment")[0];
if(e_list_item_comment){
	e_reply_link = e_list_item_comment.getElementsByClassName("comment-reply-link");
	for(var t = 0; t < e_reply_link.length; t++){
	  e_reply_link[t].addEventListener("click",function(){
		var commentid = this.getAttribute("data-commentid");
		console.log(commentid);
	  });
	}
}
/*console.log(_url_ajax);*/
function post_comment(element) {
	var e_frm = element.parentElement.parentElement.parentElement;
	var _security = e_frm.getElementsByClassName("my-special-string")[0].value;
	var _comment_post_ID = e_frm.getElementsByClassName("comment_post_ID")[0].value;
	var _comment_parent = e_frm.getElementsByClassName("comment_parent")[0].value;
	var _cmt_content = e_frm.getElementsByClassName("cmt-content")[0].value;
	//get value info user comment
	var obj_ck = getCookie('ckuser');
	if(!obj_ck){
	  e_modal_comment.style.display = "block";
	  return false;
	}
	if(!_cmt_content){
		alert("bạn chưa nhập bình luận");
		return false;
	}
	var get_obj = JSON.parse(obj_ck);
	_phone = get_obj.phone; _email = get_obj.email; _fullname = get_obj.fullname;
	var http = new XMLHttpRequest();
	/*var url = ajax_object.ajax_url+"?action=send_comment";*/
	var url = _url_ajax + "?action=send_comment";
	var params = "security="+_security+"&comment_post_ID="+_comment_post_ID+"&comment_parent="+_comment_parent+"&comment_body="+_cmt_content;
	params = params + "&phone="+_phone+"&email="+_email+"&fullname="+_fullname+"&max="+max;
	http.open("POST", url, true);
	//http.setRequestHeader("X-CSRF-TOKEN", _csrf_token);
	http.setRequestHeader("Accept", "application/json");
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var load = document.getElementsByClassName("htz-popup-processing")[0];
	load.style.display = "block";
	http.onreadystatechange = function() {
		if(http.readyState == 4 && http.status == 200) {
			var myArr = JSON.parse(this.responseText);
			//console.log(myArr);
			e_frm.getElementsByClassName("cmt-content")[0].value = '';
			load.style.display = "none";
		}
	}
	http.send(params);
}
