$(window).load(function() {
  // Animate loader off screen
  $(".se-pre-con").fadeOut("slow");
});

$(document).ready(function(){
  $("#counter").countdown({
  until: new Date(2017, 03-1, 13),
  format: 'dHMS'
  });

  $("#counter_wrapper").fitText(1.2, {
  minFontSize: '20px',
  maxFontSize: '50px'
  });
});
