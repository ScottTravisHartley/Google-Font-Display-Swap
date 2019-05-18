<?php
/*
Plugin Name: Google Font Display Swap
Plugin URI: https://www.sertmedia.com
Description: Adds Font Display Swap to google fonts to improve render performance. 
Version: 1.0
Author: SERT Media
Author URI: https://www.sertmedia.com
*/
function sertmedia_start_wp_head_buffer() {
    ob_start();
}
add_action('wp_head','sertmedia_start_wp_head_buffer',0);

function inject_font_display() {
    $head = ob_get_clean();

	// Add font-display=swap as a querty parameter to Google fonts
    $head = str_replace("googleapis.com/css?family", "googleapis.com/css?display=swap&family", $head);

    echo $head;
}
add_action('wp_head','inject_font_display', PHP_INT_MAX);