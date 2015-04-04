/**
 * Created by ousmanesamba on 4/3/15.
 */

(function ($, Drupal, window) {
    Drupal.behaviors.bxSlider = {
        attach:function(){
            $('.bxslider').bxSlider({
                captions: false,
                pager: false,
                controls: false,
                auto: true,
                speed:2000
            });
        }
    };
})(jQuery, Drupal, window);