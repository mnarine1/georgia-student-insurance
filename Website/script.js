$(document).ready(function() {
   $(".asset").each(function() {
      $(this).children(".desc").append(
         "Type: "+$(this).attr("type")+"<br/><br/>Value: $"+$(this).attr("value")+"<br/><br/>Date: "+$(this).attr("date"));
   });
});
