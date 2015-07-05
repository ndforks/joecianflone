(function() {
   "use strict";

   var App = {
      init: function () {
         _.each(App.Modules, function(key, value) {
            App.Modules[value].init().events();
            console.log("Loading Module: "+value);
         });
      }
   };

   window.App = App;
})();
