<?php
// This is Blogs Archive Template.
?>
<?php
get_header();
$args = array(
    'post_type' => 'blogs',
    'post_status' => 'publish',

);
$query = new WP_Query($args);

if ( $query->have_posts() ) : ?>
<div class="row mx-5">
<?php while ( $query->have_posts() ) : $query->the_post(); ?>

    <?php 
    $blogsSettingOptions = get_option('BlogSetting');
    $blogsPageView = $blogsSettingOptions['blogsPageView'];
    if($blogsPageView == 'list'){
        include(plugin_dir_path(__FILE__).'templates/views/list/single-blog-list.php');
    }
    if($blogsPageView == 'grid'){
        include(plugin_dir_path(__FILE__).'templates/views/grid/single-blog-grid.php');
    }
    ?>

<?php endwhile; ?>
</div>
<?php else :
   echo "Sorry No Blogs Found";
endif;
get_footer();

