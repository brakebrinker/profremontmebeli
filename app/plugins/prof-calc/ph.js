$(function(){
$.ajax({
  type: "POST",
  url: '/calc/index.php',
  success: function(data) {
             $('#calcform').html(data);
  }
});
});