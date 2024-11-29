<?php
/**
 * Plugin Name: Scroll To Top Button
 * Description: A simple yet customizable and beautiful scroll to top button addition for your site.
 * Version: 1.0
 * Author: Chiku23
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Enqueue styles and scripts
function c23_scroll_to_top_enqueue_assets() {
    wp_enqueue_style( 'c23-scroll-to-top-style', plugin_dir_url( __FILE__ ) . 'assets/c23-style.css' );
    wp_enqueue_script( 'c23-scroll-to-top-script', plugin_dir_url( __FILE__ ) . 'assets/c23-script.js', array( 'jquery' ), null, true );
}
add_action( 'wp_enqueue_scripts', 'c23_scroll_to_top_enqueue_assets' );

// Add scroll-to-top button HTML
function c23_scroll_to_top_button() {
    echo '<div id="c23-scroll-to-top" class="c23-scroll-to-top">↑</div>';
}
add_action( 'wp_footer', 'c23_scroll_to_top_button' );
