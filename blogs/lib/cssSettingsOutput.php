<?php
// This is file outputs a string of all css which are set in backend under settings.
$strCSSOutput = '';

$cssOptions = get_option('CSSsetting');
$blogsTitleTextcolor = $cssOptions['TitleTextcolor'];
$blogsDetailsFontColor = $cssOptions['DescriptionTextColor'];
// Blogs Title Text Color
if ( isset($blogsTitleTextcolor) && 
!empty( $blogsTitleTextcolor ) ) {
$strCSSOutput .= '.blogsTitle a h2 { color: ' . $blogsTitleTextcolor . ';}' . "\n";
} 
// Blogs Descrption Text Color
if ( isset($blogsDetailsFontColor) && 
!empty( $blogsDetailsFontColor ) ) {
$strCSSOutput .= '.blogsDetails p { color: ' . $blogsDetailsFontColor . ';}' . "\n";
} 


// Output styles
if (isset($strCSSOutput) && $strCSSOutput != '') {
    $strCSSOutput = strip_tags($strCSSOutput);
    $strCSSOutput = "<!-- Custom Blogs Styles -->\n<style type=\"text/css\">\n" . $strCSSOutput . "</style>\n\n";
    echo $strCSSOutput;
} // End if

