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
<div class="htz-popup-processing" style="display: none; position: fixed; z-index: 1010;left: 0;top: 0%;width: 100%; height: 100%; overflow: auto;background-color: rgb(0,0,0); background-color: rgba(0,0,0,0.1); ">
  <div class="processing" style="position:relative;background-color: rgba(255,255,255,0.6);width: 250px;height: 250px;margin-top:15%; margin-left: auto;margin-right: auto;text-align: center;">
	<p><img id="loading" class="loading" style=" position: absolute;top: 11%;left: 11%;display: block;width: 200px; height: 200px;margin-left: auto;margin-right: auto;" src="<?php bloginfo('template_directory');?>/images/loader1.gif"></p>
	<!--<div id="loader" class="loading" style=" position: absolute;top: 40%;left: 11%;display: block;width: 200px; height: 200px;margin-left: auto;margin-right: auto;"><div class="cssload-box-loading"></div></div>-->
	<p class="result" style="font-weight: 500;font-size: 28px;"></p>
	<p><img class="checked-img" style="display: none;width: 60px;margin-right: auto;margin-left: auto;padding:5px; " src="<?php bloginfo('template_directory');?>/images/checked.jpg"></p>
  </div>
</div>
<!-- jequery plugins -->
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
<!-- Javascript Files
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/easing.js"></script>
    <script src="js/owl.carousel.js"></script>
    <script src="js/validation.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/enquire.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.plugin.js"></script>
    <script src="js/typed.js"></script>
    <script src="js/jquery.countTo.js"></script>
    <script src="js/jquery.countdown.js"></script>
    <script src="js/typed.js"></script>
    <script src="js/designesia.js"></script>
    <!-- RS5.0 Core JS Files -->
    <script type="text/javascript" src="revolution/js/jquery.themepunch.tools.min.js?rev=5.0"></script>
    <script type="text/javascript" src="revolution/js/jquery.themepunch.revolution.min.js?rev=5.0"></script>
    <!-- RS5.0 Extensions Files -->
    <script type="text/javascript" src="revolution/js/extensions/revolution.extension.video.min.js"></script>
    <script type="text/javascript" src="revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script type="text/javascript" src="revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script type="text/javascript" src="revolution/js/extensions/revolution.extension.navigation.min.js"></script>
    <script type="text/javascript" src="revolution/js/extensions/revolution.extension.actions.min.js"></script>
    <script type="text/javascript" src="revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script type="text/javascript" src="revolution/js/extensions/revolution.extension.migration.min.js"></script>
    <script type="text/javascript" src="revolution/js/extensions/revolution.extension.parallax.min.js"></script>
    <script>
    jQuery(document).ready(function() {
        // revolution slider
        jQuery("#slider-revolution").revolution({
            sliderType: "standard",
            sliderLayout: "fullwidth",
            delay: 5000,
            navigation: {
                arrows: {
                    enable: true
                },
                bullets: {
                    enable: true,
                    hide_onmobile: false,
                    style: "hermes",
                    hide_onleave: false,
                    direction: "horizontal",
                    h_align: "center",
                    v_align: "bottom",
                    h_offset: 20,
                    v_offset: 30,
                    space: 5,
                },

            },
            parallax: {
                type: "mouse",
                origo: "slidercenter",
                speed: 2000,
                levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50],
            },
            responsiveLevels: [1920, 1380, 1240],
            gridwidth: [1200, 1200, 940],
            spinner: "off",
            gridheight: 700,
            disableProgressBar: "on"
        });
    });
    </script>

<script src="<?php bloginfo('template_directory');?>/js/captcha.js?v=0.1.1"></script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
<?php wp_footer(); ?>
</body>
</html>
