App.Modules = App.Modules || {};

App.Modules.Navigation = function () {
   var options = {
      wrapper:   ".js-wrapper",
      toggler:   ".js-menu-toggler",
      container: ".js-secondary-content"
   };

   var toggleNav = function(data) {
          var container = data.eventElement.closest(options.container),
              position = $(options.container).css("width") === "50px" ? "auto" : "50px",
              width = $(options.container).css("min-width") ===  "0px" ? "290px" : "0";

          container.animate({
             "width": position,
             "min-width": width
          });

          container.find(options.wrapper).fadeToggle(50);

          return false;
   };

   return {
      init: function() {
         options.module = $(options.el);

         return this;
      },
      events: function() {
         //Events.bind("click", options.toggler).to(toggleNav, this);

         return this;
      }
   };

}();


