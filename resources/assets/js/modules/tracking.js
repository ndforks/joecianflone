App.Modules = App.Modules || {};

App.Modules.NavToggle = function () {

   var o = { };

   var linkTrack = function(data) {
      _gs('event', "Clicked - "+data.eventElement.data('click'));
   };

   return {
      init: function() { return this; },
      events: function() {
         Events.bind("click", "[data-click]").to(linkTrack, this);

         return this;
      }
   };

}();

