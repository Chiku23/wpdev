<?php

add_action('admin_menu','blogsSettingSubmenuPageCreate');
add_action('admin_init','funblogssettingsection');

function blogsSettingSubmenuPageCreate(){
    add_submenu_page(
        'edit.php?post_type=c23_blogs',
        'Frontend Settings',
        'Frontend Settings',
        'manage_options',
        'blogs_settings',
        'blogs_setting_callback',
    );
}
function blogs_setting_callback(){?>
    <h1>Frontend Settings</h1>

    <form method="post" action="options.php">
            <?php
            settings_fields( 'BlogSetting' );
            do_settings_sections( 'BlogsSettingPage' );
            submit_button();
            ?>
        </form>
    <?php }

    
function funblogssettingsection(){
    register_setting(
    'BlogSetting', //Group
    'BlogSetting', //Name
    ''
    );
    add_settings_section(
        'BlogsSettingID', //ID
        'Layouts', //Title
        '',
        'BlogsSettingPage' //Page
    );
    add_settings_field(
        'blogsPageViewID', //ID
        'Blogs Page View', //Title
        'blogsPageViewCallback', //Callback
        'BlogsSettingPage', //page
        'BlogsSettingID' // ID
    );
    add_settings_field(
        'blogsGridColumnID', //ID
        'Archive Grid View Layout', //Title
        'blogsGridColumnCallback', //Callback
        'BlogsSettingPage', //page
        'BlogsSettingID' // ID
    );

}
    
function blogsPageViewCallback(){

    $blogSettingOption = get_option('BlogSetting'); 
    $blogPageView = isset($blogSettingOption['c23_blogsPageView']) ? $blogSettingOption['c23_blogsPageView'] : 'list';
    $arrblogsPageViews = ['list', 'grid'];
    ?>
    <input type='hidden' name='c23_blogsPageView' id='c23_blogsPageView' value='<?php echo $blogPageView; ?>'/>
    <select id='c23_blogsPageView' name='BlogSetting[c23_blogsPageView]'>
        <?php if(!empty($arrblogsPageViews )){
            foreach($arrblogsPageViews as $item) {
                $selected = ($blogSettingOption['c23_blogsPageView'] == $item) ? 'selected="selected"' : ''; ?>
                
                <option id='<?php echo $item; ?>' class='<?php echo $item; ?>' value='<?php echo $item; ?>' <?php echo $selected; ?>><?php echo ucfirst($item); ?> </option>
            
            <?php }
        } ?>
        </select>
<?php }

function blogsGridColumnCallback(){
    $blogSettingOption = get_option('BlogSetting');
    $ColumnLayout = isset($blogSettingOption['c23_blogsGridColumn']) ? $blogSettingOption['c23_blogsGridColumn'] : '3';
    $arrLayouts = [3,4];
?>
    <input type='hidden' name='c23_blogsGridColumn' id='c23_blogsGridColumn' value='<?php echo $ColumnLayout; ?>'/>
    <select id='c23_blogsGridColumn' name='BlogSetting[c23_blogsGridColumn]'>
        <?php if(!empty($arrLayouts )){
            foreach($arrLayouts as $item) {
                $selected = ($blogSettingOption['c23_blogsGridColumn'] == $item) ? 'selected="selected"' : ''; ?>
                <option id='<?php echo $item; ?>' class='<?php echo $item; ?>' value='<?php echo $item; ?>' <?php echo $selected; ?>><?php echo $item.' - Column Layout'; ?> </option>
            
            <?php }
        } ?>
        </select>


<?php }


