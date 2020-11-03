(function ($) {
    $(document).on('click', 'a[href^="#"]', function (event) {
        event.preventDefault();
        console.log("scrolled to anchor");
        $('html, body').animate({
            scrollTop: $($.attr(this, 'href')).offset().top + -90
        }, 200);
    });

    $('.fixed-scroll-top').on('click', function () {
        $("html, body").animate({
            scrollTop: 0
        }, "slow");
        return false;
    });

    $(document).on('scroll', function () {

        if ($(this).scrollTop() >= $('.site-main').position().top) {
            $('.fixed-scroll-top').stop().fadeIn();
        }
        if ($(this).scrollTop() <= $('.site-main').position().top) {
            $('.fixed-scroll-top').stop().fadeOut();
        }
    })

    $("#map-scroll-notice").click(function () {
        $(this).css("display", "none");
    });

})(jQuery);