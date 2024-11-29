<?php
// This is Blogs single template
?>
<?php get_header();?>
<div class="row">
    <div class="singleBlog row col-4">
            <div class="col-12">
                <?php the_post_thumbnail(); ?>
            </div>

    </div>
    <div class="row col-8">
    <div class="singleTitleDiv col-12">
                <h2><?php the_title(); ?></h2>      
            </div>
        <div class="singleContentDiv col-12">
            <?php the_content(); ?>
        </div>
    </div>
</div>
<?php get_footer();?>