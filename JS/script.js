let maison = document.querySelector(".maison");
maison.style.display = "none";
let elt = document.querySelector(".text");
let elt2 = document.querySelector("#canvas");
document.getElementById("button").addEventListener("click", function () {
  elt2.style.opacity = "0";
  elt.style.opacity = "0";
  maison.style.opacity = "0";
  elt.style.transform = "scale(0)";
});


let test = document.querySelector(".zoom");
elt.addEventListener("transitionend", () => {
  maison.style.display = "flex";
  maison.style.opacity = "1";
  document.querySelector(".index").style.display = "none";
  test.style.display = "inline";
  test.style.opacity = "1";
  test.style.transform = "scale(1)";
});