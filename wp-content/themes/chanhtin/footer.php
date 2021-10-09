<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hibay
 */
?>
</div>
<?php get_template_part('layout/main-footer'); ?>
</div>
<?php get_template_part('layout/popup'); ?>
<div class="htz-popup-processing" style="display: none; position: fixed; z-index: 1010;left: 0;top: 0%;width: 100%; height: 100%; overflow: auto;background-color: rgb(0,0,0); background-color: rgba(0,0,0,0.1); ">
  <div class="processing" style="position:relative;background-color: rgba(255,255,255,0.6);width: 250px;height: 250px;margin-top:15%; margin-left: auto;margin-right: auto;text-align: center;">
	<p><img id="loading" class="loading" style=" position: absolute;top: 11%;left: 11%;display: block;width: 200px; height: 200px;margin-left: auto;margin-right: auto;" src="<?php bloginfo('template_directory');?>/images/loader1.gif"></p>
	<!--<div id="loader" class="loading" style=" position: absolute;top: 40%;left: 11%;display: block;width: 200px; height: 200px;margin-left: auto;margin-right: auto;"><div class="cssload-box-loading"></div></div>-->
	<p class="result" style="font-weight: 500;font-size: 28px;"></p>
	<p><img class="checked-img" style="display: none;width: 60px;margin-right: auto;margin-left: auto;padding:5px; " src="<?php bloginfo('template_directory');?>/images/checked.jpg"></p>
  </div>
</div>

<!-- Javascript Files
    ================================================== -->
    <script src="<?php bloginfo('template_directory');?>/justica/js/jquery.min.js"></script>
    <script src="<?php bloginfo('template_directory');?>/justica/js/bootstrap.min.js"></script>
    <script src="<?php bloginfo('template_directory');?>/justica/js/wow.min.js"></script>
    <script src="<?php bloginfo('template_directory');?>/justica/js/jquery.isotope.min.js"></script>
    <script src="<?php bloginfo('template_directory');?>/justica/js/easing.js"></script>
    <script src="<?php bloginfo('template_directory');?>/justica/js/owl.carousel.js"></script>
    <script src="<?php bloginfo('template_directory');?>/justica/js/validation.js"></script>
    <script src="<?php bloginfo('template_directory');?>/justica/js/jquery.magnific-popup.min.js"></script>
    <script src="<?php bloginfo('template_directory');?>/justica/js/enquire.min.js"></script>
    <script src="<?php bloginfo('template_directory');?>/justica/js/jquery.stellar.min.js"></script>
    <script src="<?php bloginfo('template_directory');?>/justica/js/jquery.plugin.js"></script>
    <script src="<?php bloginfo('template_directory');?>/justica/js/typed.js"></script>
    <script src="<?php bloginfo('template_directory');?>/justica/js/jquery.countTo.js"></script>
    <script src="<?php bloginfo('template_directory');?>/justica/js/jquery.countdown.js"></script>
    <script src="<?php bloginfo('template_directory');?>/justica/js/typed.js"></script>
    <script src="<?php bloginfo('template_directory');?>/justica/js/designesia.js"></script>
    <!-- RS5.0 Core JS Files -->
    <script type="text/javascript" src="<?php bloginfo('template_directory');?>/justica/revolution/js/jquery.themepunch.tools.min.js?rev=5.0"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory');?>/justica/revolution/js/jquery.themepunch.revolution.min.js?rev=5.0"></script>
    <!-- RS5.0 Extensions Files -->
    <script type="text/javascript" src="<?php bloginfo('template_directory');?>/justica/revolution/js/extensions/revolution.extension.video.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory');?>/justica/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory');?>/justica/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory');?>/justica/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory');?>/justica/revolution/js/extensions/revolution.extension.actions.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory');?>/justica/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory');?>/justica/revolution/js/extensions/revolution.extension.migration.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory');?>/justica/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
    <script src="<?php bloginfo('template_directory');?>/js/slider.js?v=0.1.2"></script>
	<script src="<?php bloginfo('template_directory');?>/js/captcha.js?v=0.1.2"></script>
	<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
<?php wp_footer(); ?>
</body>
</html>
