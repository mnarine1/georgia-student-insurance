$(document).ready(function() {
   if ($(".checked").length > 1 || $(".checked").length == 0) {
      $("input[type=submit]").attr("disabled", "disabled");
   }

   $(".asset").click(function() {
      $(this).toggleClass("checked");
      if ($(".checked").length > 1 || $(".checked").length == 0) {
         $("input[type=submit]").attr("disabled", "disabled");
      } else {
         $("input[type=submit]").removeAttr("disabled");
      }

      if ($(this).hasClass("checked")) {
         $(this).children(".chckd").attr("form", "multiSelect");
      } else {
         $(this).children(".chckd").attr("form", "");
      }
   });

});
