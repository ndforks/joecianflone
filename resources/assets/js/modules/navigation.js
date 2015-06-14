App.Modules = App.Modules || {};
App.Modules.Navigation = function () {
   "use strict";

   var options = {
      wrapper:   ".js-wrapper",
      hide:      ".js-toggle-hide",
      toggler:   ".js-menu-toggler",
      container: ".js-secondary-content"
   };

   var toggleNav = function(data) {
      console.log("toggle");
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
                  "padding": "0"
               });

      return false;
   };

   return {
      init: function() { return this; },
      events: function() {
         console.log("events");
         Events.bind("click", options.toggler).to(toggleNav, this);

         return this;
      }
   };

}();


