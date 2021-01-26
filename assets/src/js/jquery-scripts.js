//import jQuery from "jquery";

export const jqueryCustomScripts = () => {

    (function ($) {
        console.log("jQuery scripts ready to load");

        $(document).on('click', 'a[href^="#"]', function (event) {
            event.preventDefault();
            console.log("scrolled to anchor");
            $('html, body').animate({
                scrollTop: $($.attr(this, 'href')).offset().top + -190
            }, 200);
        });

        $('.fixed-scroll-top').on('click', function () {
            $("html, body").animate({
                scrollTop: 0
            }, "slow");
            return false;
        });

        $(document).on('scroll', function () {

            if ($(this).scrollTop() >= $('#page').position().top) {
                $('.fixed-scroll-top').stop().fadeIn();
                $('.site-navigation-wrapper').addClass('scroll-smaller');
            }
            if ($(this).scrollTop() <= $('#page').position().top) {
                $('.fixed-scroll-top').stop().fadeOut();
                $('.site-navigation-wrapper').removeClass('scroll-smaller');
            }
        })

        $("#map-scroll-notice").on('click', function () {
            $(this).css("display", "none");
        });

    })(jQuery)

}