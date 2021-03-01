import jQuery from "jquery";
import { slick } from "slick-carousel";

export const slickSliderScript = () => {
    (function ($) {

        /**
         * Karten Slider
         *
         * Adds custom JavaScript to the block HTML.
         *
         * @date    15/4/19
         * @since   1.0.0
         *
         * @param   object $block The block jQuery element.
         * @param   object attributes The block attributes (only available when editing).
         * @return  void
         */
        var initializeBlock = function ($block) {
            console.log("slick karten slider init");

            var leftSlider = $block.find('#custom-slider-arrows .prev-slick');
            var rightSlider = $block.find('#custom-slider-arrows .next-slick');

            $block.find('.row').slick({
                touchThreshold: 10,
                slidesToScroll: 3,
                infinite: true,
                dots: true,
                arrows: true,
                responsive: [{
                    breakpoint: 992,
                    settings: {
                        dots: false,
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                ]

            });
        }

        // Initialize each block on page load (front end).
        $(document).ready(function () {
            $('.cards-slider').each(function () {
                initializeBlock($(this));
            });
        });

        // Initialize dynamic block preview (editor).
        if (window.acf) {
            window.acf.addAction('render_block_preview/type=karten', initializeBlock);
        }

    })(jQuery)
}