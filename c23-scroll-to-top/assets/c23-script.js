jQuery(document).ready(function ($) {
    var $scrollTopButton = $('#c23-scroll-to-top');

    // Show the button when scrolling down
    $(window).scroll(function () {
        if ($(this).scrollTop() > 200) {
            $scrollTopButton.fadeIn();
        } else {
            $scrollTopButton.fadeOut();
        }
    });

    // Scroll to top when button is clicked
    $scrollTopButton.click(function () {
        $('html, body').animate({ scrollTop: 0 }, 600);
        return false;
    });
});
