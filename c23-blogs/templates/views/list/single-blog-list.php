<?php
// Single Template for Archive page on List Layout
?>

<div class="row mx-3 my-2 px-3 py-2 blogContainer">
    <div class="row col-4 blogsImage m-0 p-0">
        <?php the_post_thumbnail(); ?>
        <!-- <div class="thumbnail" style="background-image:url(<?php echo get_the_post_thumbnail_url();?>)"></div> -->
    </div>
    <div class="row col-8 m-0">
        <div class="col-12 blogsTitle px-3 py-2">
            <a href="<?php the_permalink()?>"><h2><?php the_title(); ?></h2></a>
        </div>
        <div class="col-12 blogsDetails px-3 py-2">
            <?php the_excerpt(); ?>
            <span class='btn bg-info'><a href="<?php the_permalink() ?>">More</a></span>
        </div>
    </div>
</div>
