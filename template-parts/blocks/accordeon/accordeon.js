// Accordion

(function ($) {


    var initializeBlock = function ($block) {
        console.log("accordeon init");

        $block.find('.accordion').click(function () {
            console.log("accordeon clicked");
            $(this).parent().find(".panel").slideToggle("fast");
            $(this).find(".icon").toggleClass("active_chevron");
        });

    }

    // Initialize each block on page load (front end).
    $(document).ready(function () {
        $('.accordion_wrapper').each(function () {
            initializeBlock($(this));
        });
    });

    // Initialize dynamic block preview (editor).
    if (window.acf) {
        window.acf.addAction('render_block_preview/type=accordeon', initializeBlock);
    }

})(jQuery);