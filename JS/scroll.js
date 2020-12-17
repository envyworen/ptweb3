$(document).ready(function() {
    function scroll_to_top(a) {
      $(a).click(function() {
          $('html,body').animate({scrollTop: 0}, 'slow');
      });
    }
    scroll_to_top("#scroll_to_top");
});