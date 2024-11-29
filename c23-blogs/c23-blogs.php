<?php
 /*
   Plugin Name: Blogs
   description: It is a perfect replacement of default posts of wordpress. Install-Setup-Enjoy. 
   Version: 1.1
   Author: Chiku23
   */
?>
<?php
add_action('init', 'c23_blogsposttyperegister');
add_action( 'admin_enqueue_scripts', 'c23_enqueue_color_picker' );
add_action( 'wp_enqueue_scripts','register_c23_blogs_frontend_styles');

add_filter('archive_template', 'custom_c23_blogs_archive_template');
add_filter('single_template', 'c23_blogs_single_template');
add_filter( 'excerpt_length', 'c23_blogs_excerpt_length');
add_filter( 'excerpt_more', 'c23_blogs_excerpt_more' );


require_once('widgets/c23-blogs-list-widget.php');
require_once ('lib/c23-blog-setting.php');
require_once ('lib/c23-css-setting.php');
require_once('lib/c23-cssSettingsOutput.php');

function c23_blogsposttyperegister(){
    register_post_type( 'c23_blogs',
        array(
        'labels' => array(
            'name' => __( 'Blogs' ),
            'singular_name' => __( 'Blog' )
            ),
        'public' => true,
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'has_archive' => true,
        'rewrite'   => array( 'slug' => 'blogs' ),
        'menu_position' => 10,
        'menu_icon' => 'dashicons-welcome-write-blog',
        )
    );

}

function custom_c23_blogs_archive_template($tpl){
    global $post;
    if(is_post_type_archive('c23_blogs')){
        $tpl = plugin_dir_path(__FILE__).'/archive-c23_blogs.php';
    }
    return $tpl;
}
function c23_blogs_single_template($singleTemplate){
    global $post;
    if (is_single() && $post->post_type=='c23_blogs'){
        $singleTemplate = plugin_dir_path(__FILE__).'/templates/single-c23_blogs.php';
    }
    return $singleTemplate;
}

function register_c23_blogs_frontend_styles(){
    wp_enqueue_style('fronendCSScustom',plugin_dir_url(__FILE__).'assets/front-end.css');
    wp_enqueue_style('bootstrapfrontend',plugin_dir_url(__FILE__).'assets/bootstrap.min.css');
}

function c23_enqueue_color_picker( $hook_suffix ) {
// first check that $hook_suffix is appropriate for your admin page
wp_enqueue_style( 'wp-color-picker' );
wp_enqueue_script( 'my-script-handle', plugins_url('assets/js/color-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}

function c23_blogs_excerpt_length($length){
    return 40;
}
function c23_blogs_excerpt_more( $more ) {
    return '. . . . . . ';
}