<?php 
/*
Plugin Name: Image and Video Accordion
Plugin URI: http://www.mamunkhan.net/plugins/image-and-video-accordion/
Description: This plugin will enable image-and-video-accordion your wordpress theme. You can embed image-video-accordion via shortcode in everywhere you want. 
Author: MAMUN KHAN
Version: 1.0
Author URI: http://mamunkhan.net/plugins
*/



/*Some Set-up*/
define('MAM_ALL_SUPPORT_ACCORDION_PLUGIN_PATH', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );

/* Adding Latest jQuery from Wordpress */
function mam_all_support_accordion_wp_latest_jquery() {
	wp_enqueue_script('jquery');
}
add_action('init', 'mam_all_support_accordion_wp_latest_jquery');

/* Adding plugin javascript Main file */
wp_enqueue_script('mam-all-support-accordion-plugin-main', MAM_ALL_SUPPORT_ACCORDION_PLUGIN_PATH.'js/jquery.easing.1.3.js', array('jquery'));
wp_enqueue_script('mam-two-all-support-scroll-accordion-plugin-main', MAM_ALL_SUPPORT_ACCORDION_PLUGIN_PATH.'js/jquery.evoslider.lite-1.1.0.min.js', array('jquery'));

/* Adding plugin javascript active file */
wp_enqueue_script('mam-accordionall-support--scroll-plugin-script-active', MAM_ALL_SUPPORT_ACCORDION_PLUGIN_PATH.'js/mam-accourdion.js', array('jquery'), '1.0', true);

/* Adding Plugin custm CSS file */
wp_enqueue_style('mam-responsiveall-all-support-support--scroll-accordion-plugin-style', MAM_ALL_SUPPORT_ACCORDION_PLUGIN_PATH.'css/evoslider.css');
wp_enqueue_style('mam-scrollall-support--default-accordion-plugin-style', MAM_ALL_SUPPORT_ACCORDION_PLUGIN_PATH.'css/default/default.css');



/* Add Slider Shortcode Button on Post Visual Editor */
function mamallsupportaccordion_button() {
	add_filter ("mce_external_plugins", "mamallsupportaccordion_button_js");
	add_filter ("mce_buttons", "mamallsupportaccordionb");
}

function mamallsupportaccordion_button_js($plugin_array) {
	$plugin_array['wptuts'] = plugins_url('js/accordian-button.js', __FILE__);
	return $plugin_array;
}

function mamallsupportaccordionb($buttons) {
	array_push ($buttons, 'mamallsupportscrollaccordiontriger');
	return $buttons;
}
add_action ('init', 'mamallsupportaccordion_button'); 


/* Generates Toggles Shortcode */
function mam_all_support_scroll_accordion_main($atts, $content = null) {
	return ('<div id="mySlider" class="evoslider default"><dl>'.do_shortcode($content).'</dl></div>');
}
add_shortcode ("mamsupport", "mam_all_support_scroll_accordion_main");

function mam_all_support_scroll_accordion_toggles($atts, $content = null) {
	extract(shortcode_atts(array(
        'title'      => '',
        'src'      => '',
        'video'      => '',
        'background'      => '',
        'h2bg'      => '',
        'width'      => '',
        'color'      => '',
    ), $atts));
	
	return ('
    
	    <dt style="background:'.$h2bg.'">'.$title.'</dt>
	    <dd style="background:'.$background.'">
	       <p style="color:'.$color.'"><img style="width:'.$width.'" src="'.$src.'" alt="" />'.$content.'<iframe width="100%" height="325" src="'.$video.'" frameborder="0" allowfullscreen></iframe></p>	   
	    </dd>
    
	');
}
add_shortcode ("support", "mam_all_support_scroll_accordion_toggles");









?>