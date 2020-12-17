let body = document.querySelector(".le_body");
body.style.overflow = "hidden";
let elt = document.querySelector(".text");
let elt2 = document.querySelector("#canvas");
document.getElementById("button").addEventListener("click", function () {
  elt2.style.opacity = "0";
  elt.style.opacity = "0";
  blocktest.style.opacity = "0";
  elt.style.transform = "scale(0)";
});


let test = document.querySelector(".zoom");
elt.addEventListener("transitionend", () => {
  document.querySelector(".index").style.display = "none";
  body.style.overflow = "auto";
  test.style.display = "inline";
  test.style.opacity = "1";
  test.style.transform = "scale(1)";
});

$(document).ready(function() {
  function scroll_to_top(a) {
    $(a).click(function() {
        $('html,body').animate({scrollTop: 0}, 'slow');
    });
  }
  scroll_to_top("#scroll_to_top");
});