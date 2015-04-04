/**
 * @file
 * Misc JQuery scripts in this file
 */

(function ($) {

  Drupal.behaviors.miscPrius = {
    attach: function (context, settings) {

      $('body').addClass('js');

      $(document).ready(function () {

        var current_width = $(window).width();

        // Provide for classes based on various widths
        if (current_width <= 753)
          $('html').addClass("mobile").removeClass("desktop");

        if (current_width >= 755)
          $('html').addClass("desktop").removeClass("mobile");

        $('.js #mobile-nav').click(function (e) {
          $('body').toggleClass('active');
          e.preventDefault();
        });

        $('.js .submenu-button').click(function (e) {
          $(this).parent().toggleClass('open');
        });

        $(window).scroll(function() {
          var scroll = $(window).scrollTop();
          if (scroll >= 100) {
            $('body').addClass("scrolling");
            //$('main-wrapper').addClass("scrolling");
          } else {
            $('body').removeClass("scrolling");
            //$('main-wrapper').removeClass("scrolling");
          }
        });

      });

      $(window).resize(function () {
        var current_width = $(window).width();

        if (current_width <= 754)
          $('html').addClass("mobile").removeClass("desktop");

        if (current_width >= 755)
          $('html').addClass("desktop").removeClass("mobile");
      });

    }
  }

})(jQuery);
