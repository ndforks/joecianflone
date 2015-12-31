   App.Modules = App.Modules || {};

App.Modules.NavToggle = function () {
   "use strict";

   var options = {
      wrapper:   ".js-wrapper",
      hide:      ".js-toggle-hide",
      toggler:   ".js-menu-toggler",
      container: ".js-secondary-content"
   };

   var toggleNav = function(data) {
      var container = data.eventElement.closest(options.container);
      container.find(options.hide).toggle();

      if (container.hasClass("js-container-closed")) {
         container.attr("style", "")
                  .removeClass("js-container-closed")
                  .find(options.wrapper).attr("style", "")
                  .find(options.toggler).attr("style", "");

         return false;
      }

      container.addClass("js-container-closed")
               .css({"flex": "0 0 50px"})
               .find(options.wrapper).css({
                  "width": "38px",
                  "padding": "10px 4px 0 0"
               });

      return false;
   };

   var checkPageWidth = function(data) {
      var container = $(options.container);
      if (! container.hasClass('js-container-closed')) {
         var pageWidth = parseInt($("body").outerWidth(true));
         if (pageWidth <= 980) {
            $(options.toggler).trigger("click");
         }
      }
   };

   return {
      init: function() { return this; },
      events: function() {
         Events.bind("load").to(checkPageWidth, this);
         Events.bind("resize").to(checkPageWidth, this);
         Events.bind("click", options.toggler).to(toggleNav, this);

         return this;
      }
   };

}();

