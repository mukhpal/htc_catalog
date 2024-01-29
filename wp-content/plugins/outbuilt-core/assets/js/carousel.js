(function ($) {
  var postCarousel = function ($scope, $) {

    $('.post-carousel').slick({
      infinite: true,
      mobileFirst: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: true,
      arrows: false,
      responsive: [
        {
          breakpoint: 576,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3
          }
        }
      ]
    });

  };

  // Make sure we run this code under Elementor
  $(window).on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/outbuilt-core-post-type-carousel.default', postCarousel);
  });
})(jQuery);
