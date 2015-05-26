App.Modules = App.Modules || {};

App.Modules.Navigation = function () {
   var options = {
      wrapper:   ".js-wrapper",
      toggler:   ".js-menu-toggler",
      container: ".js-secondary-content"
   };

   var toggleNav = function(data) {
      var container = data.eventElement.closest(options.container);

      container.find(options.wrapper).toggle();

      if (container.hasClass("js-container-closed")) {
         container.attr("style", "")
                  .find(options.toggler).attr("style", "")
                  .removeClass("js-container-closed");

         return false;
      }

      container.addClass("js-container-closed")
               .find(options.toggler).css("padding", "18px 16px 18px 0")
               .css({"flex": "0 0 50px"});

      return false;
   };

   return {
      init: function() { return this; },
      events: function() {
         Events.bind("click", options.toggler).to(toggleNav, this);

         return this;
      }
   };

}();


