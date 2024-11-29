<?php
// Single Template for Archive page on Grid Layout
?>
<?php

$blogSettingOption = get_option('BlogSetting');
$boolColumnLayout = isset($blogSettingOption['blogsGridColumn']);
$ColumnLayout = $blogSettingOption['blogsGridColumn'];
echo $boolColumnLayout;
$strColumnClass = 'col-md-3'
// if(isset($ColumnLayout)){
//     if ($ColumnLayout == '3'){
//         $strColumnClass = 'col-md-3';
//     }
// }



?>
<div class="my-2 px-2 py-1 blogContainer <?php echo $strColumnClass;?>">
    <div class="gridWrapper h-100">
        <div class="row col-12 blogsImage m-0 p-0">
            <?php the_post_thumbnail(); ?>
            <!-- <div class="thumbnail" style="background-image:url(<?php echo get_the_post_thumbnail_url();?>)"></div> -->
        </div>
        <div class="row col-12 m-0">
            <div class="col-12 blogsTitle px-3 py-2">
                <a href="<?php the_permalink()?>"><h2><?php the_title(); ?></h2></a>
            </div>
            <div class="col-12 blogsDetails px-3 py-2">
                <?php the_excerpt(); ?>
                <span class='btn bg-info'><a href="<?php the_permalink() ?>">More</a></span>
            </div>
        </div>
    </div>
</div>