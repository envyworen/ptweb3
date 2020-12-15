let elt = document.querySelector(".le-text");
let elt2 = document.querySelector("#canvas");
document.getElementById("button").addEventListener("click", function () {
  elt2.style.opacity = "0";
  elt.style.opacity = "0";
  elt.style.transform = "scale(0)";
});

let test = document.querySelector(".zoom");
elt.addEventListener("transitionend", () => {
  document.querySelector(".index").style.display = "none";
  test.style.display = "inline";
  test.style.opacity = "1";
  test.style.transform = "scale(1)";
});