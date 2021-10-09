var verifyCallback = function(response) {
      console.log(response);
};
var onloadCallback = function() {
	var _e_captcha_contact = document.getElementById("captcha_contact");
	if(_e_captcha_contact){
		grecaptcha.render('captcha_contact', {
		  'sitekey' : '6LctkKccAAAAAPv8hGyZxycDH5ukTJLXQs-h_GKO',
		  'callback' : render_contact,
		  'theme' : 'light'
		});
	}
	var _e_captcha_popup = document.getElementById("captcha_popup");
	if(_e_captcha_popup){
		  grecaptcha.render('captcha_popup', {
		  'sitekey' : '6LctkKccAAAAAPv8hGyZxycDH5ukTJLXQs-h_GKO',
		  'callback' : render_popup,
		  'theme' : 'light'
		});
	}
	var _e_captcha_register = document.getElementById("captcha_register");
	if(_e_captcha_register){
		  grecaptcha.render('captcha_register', {
		  'sitekey' : '6LctkKccAAAAAPv8hGyZxycDH5ukTJLXQs-h_GKO',
		  'callback' : render_register,
		  'theme' : 'light'
		});
	}
};
function screen(){
	var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
	alert(width);
}