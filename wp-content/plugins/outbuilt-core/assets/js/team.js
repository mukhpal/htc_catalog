(function ($) {
  "use strict";

  /*============= Team Member Plus ==============*/
  var WidgetTeamMemberPlusHandler = function ($scope, $) {
    var teamPlus_elem = $scope.find('.plus_click').eq(0);
    if (teamPlus_elem.length > 0) {
      teamPlus_elem.on('click', function (e) {
        e.preventDefault();
        $(this).parent('.oc-team-click-action').toggleClass('visible');
        $(this).toggleClass('team-minus');
      });
    }
  }

  // Run this code under Elementor.
  $(window).on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/outbuilt-core-team.default', WidgetTeamMemberPlusHandler);
  });

})(jQuery);
