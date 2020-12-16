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

articles.forEach(function(article) {
  console.log(article);
  
  function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min)) + min;
  }
  
  let tous = document.querySelector(".tous");
  let block = document.createElement("div");
  block.style.width = "150px";
  block.style.height = "150px";
  block.style.backgroundColor = "green";
  tous.appendChild(block);
  
  let point = document.createElement("span");
  point.style.position = "absolute";
  point.style.top = getRandomInt(0, 100)+"px";
  point.style.left = getRandomInt(0, 100)+"px";
  block.appendChild(point);
});