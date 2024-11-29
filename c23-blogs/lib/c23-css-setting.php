<?php
add_action('admin_menu','blogsCSSSettingSubmenuPageCreate');

add_action('admin_init','funCSSsettingsection');

function blogsCSSSettingSubmenuPageCreate(){
    add_submenu_page(
        'edit.php?post_type=c23_blogs',
        'CSS Setting',
        'CSS',
        'manage_options',
        'blogs_CSS',
        'blogs_CSS_callback',
    );
}

function blogs_CSS_callback(){ ?>
<h1>CSS Settings</h1>
<hr>
    <form method="post" action="options.php">
        <?php
        settings_fields( 'CSSsetting' );
        do_settings_sections( 'CSSArchivesettingPage' );
        do_settings_sections( 'CSSSinglesettingPage' );
        submit_button();
        ?>
    </form>
<?php }

function funCSSsettingsection(){
    register_setting(
    'CSSsetting', //Group
    'CSSsetting', //Name
    ''
    );
    // Archive Page CSS setting
    add_settings_section(
        'CSSsettingID', //ID
        'Blog Archive Page settings', //Title
        '',
        'CSSArchivesettingPage' //Page
    );
    add_settings_field(
        'TitleTextColorID', //ID
        'Title Text Color', //Title
        'TitleTextColorPicker', //Callback
        'CSSArchivesettingPage', //page
        'CSSsettingID' // ID
    );
    add_settings_field(
        'DescriptionTextColorID', //ID
        'Description Text Color', //Title
        'DescriptionTextColorPicker', //Callback
        'CSSArchivesettingPage', //page
        'CSSsettingID' // ID
    );
     // Single Page CSS setting
    add_settings_section(
        'CSSsettingID', //ID
        'Blog Single Page settings', //Title
        '',
        'CSSSinglesettingPage' //Page
    );
    add_settings_field(
        'singleTitleTextColorID', //ID
        'singleTitle Text Color', //Title
        'singleTitleTextColorPicker', //Callback
        'CSSSinglesettingPage', //page
        'CSSsettingID' // ID
    );
    add_settings_field(
        'singleDescriptionTextColorID', //ID
        'singleDescription Text Color', //Title
        'singleDescriptionTextColorPicker', //Callback
        'CSSSinglesettingPage', //page
        'CSSsettingID' // ID
    );
    
}

// Archive Page CSS Callbacks

function TitleTextColorPicker(){
    $cssOptions = get_option('CSSsetting'); ?>
    <input type='text' name='CSSsetting[TitleTextcolor]' class='my-color-field' id='TitleTextcolor' value='<?php echo $cssOptions['TitleTextcolor']; ?>'/>
<?php }

function DescriptionTextColorPicker(){
    $cssOptions = get_option('CSSsetting'); ?>
    <input type='text' name='CSSsetting[DescriptionTextColor]' class='my-color-field' id='DescriptionTextColor' value='<?php echo $cssOptions['DescriptionTextColor']; ?>'/>
<?php }

// Single Page CSS Callbacks

function singleTitleTextColorPicker(){
    $cssOptions = get_option('CSSsetting'); ?>
    <input type='text' name='CSSsetting[singleTitleTextcolor]' class='my-color-field' id='singleTitleTextcolor' value='<?php echo $cssOptions['singleTitleTextcolor']; ?>'/>
<?php }

function singleDescriptionTextColorPicker(){
    $cssOptions = get_option('CSSsetting'); ?>
    <input type='text' name='CSSsetting[singleDescriptionTextColor]' class='my-color-field' id='singleDescriptionTextColor' value='<?php echo $cssOptions['singleDescriptionTextColor']; ?>'/>
<?php }