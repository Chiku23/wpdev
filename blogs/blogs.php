<?php
 /*
   Plugin Name: Blogs - Custom Post Type with style
   description: It is a perfect replacement of default post of wordpress. Install-Setup-Enjoy. 
   Version: 1.0
   Author: I'AM_GROOT
   */
?>
<?php
add_action('init', 'blogsposttyperegister');
add_action( 'admin_enqueue_scripts', 'mw_enqueue_color_picker' );
add_action( 'wp_enqueue_scripts','registerPluginFrontEndStyles');

add_filter('archive_template', 'customArchiveTemplate');
add_filter('single_template', 'customblogsinleTemplate');
add_filter( 'excerpt_length', 'blogs_excerpt_length');
add_filter( 'excerpt_more', 'custom_excerpt_more' );


require_once('widgets/blogs-list-widget.php');
require_once ('lib/blog-setting.php');
require_once ('lib/css-setting.php');
require_once('lib/cssSettingsOutput.php');

function blogsposttyperegister(){
    register_post_type( 'blogs',
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

function customArchiveTemplate($tpl){
    global $post;
    if(is_post_type_archive('blogs')){
        $tpl = plugin_dir_path(__FILE__).'/archive-blogs.php';
    }
    return $tpl;
}
function customblogsinleTemplate($singleTemplate){
    global $post;
    if (is_single() && $post->post_type=='blogs'){
        $singleTemplate = plugin_dir_path(__FILE__).'/templates/single-blogs.php';
    }
    return $singleTemplate;
}

function registerPluginFrontEndStyles(){
    wp_enqueue_style('fronendCSScustom',plugin_dir_url(__FILE__).'assets/front-end.css');
    wp_enqueue_style('bootstrapfrontend',plugin_dir_url(__FILE__).'assets/bootstrap.min.css');
}

function mw_enqueue_color_picker( $hook_suffix ) {
// first check that $hook_suffix is appropriate for your admin page
wp_enqueue_style( 'wp-color-picker' );
wp_enqueue_script( 'my-script-handle', plugins_url('assets/js/color-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}

function blogs_excerpt_length($length){
    return 40;
}
function custom_excerpt_more( $more ) {
    return '. . . . . . ';
}