<?php
// This is file outputs a string of all css which are set in backend under settings.
add_action('wp_head', 'output_custom_blog_styles');

function output_custom_blog_styles() {
    // Initialize output
    $strCSSOutput = '';

    // Get CSS settings from WordPress options
    $cssOptions = get_option('CSSsetting');
    $blogsTitleTextcolor = isset($cssOptions['TitleTextcolor']) ? esc_attr($cssOptions['TitleTextcolor']) : '';
    $blogsDetailsFontColor = isset($cssOptions['DescriptionTextColor']) ? esc_attr($cssOptions['DescriptionTextColor']) : '';

    // Blogs Title Text Color
    if (!empty($blogsTitleTextcolor)) {
        $strCSSOutput .= ".blogsTitle a h2 { color: {$blogsTitleTextcolor}; }\n";
    }

    // Blogs Description Text Color
    if (!empty($blogsDetailsFontColor)) {
        $strCSSOutput .= ".blogsDetails p { color: {$blogsDetailsFontColor}; }\n";
    }

    // Output styles if any CSS is generated
    if (!empty($strCSSOutput)) {
        echo "<!-- Custom Blogs Styles -->\n<style type=\"text/css\">\n{$strCSSOutput}</style>\n";
    }
}
