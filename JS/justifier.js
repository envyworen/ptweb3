articles.forEach(function(article) {
  console.log(article);
  
  function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min)) + min;
  }
  
  let link = document.createElement("a");
  link.classList.add("boule");
  link.style.marginTop = getRandomInt(2, 70)+"%";
  link.style.marginLeft = getRandomInt(2, 95)+"%";

  let point = document.createElement("span");
  link.appendChild(point);

  let description = document.createElement("p");
  point.appendChild(description);

  let tous = document.querySelector(".tous");
  let block = document.createElement("div");
  block.style.width = "20rem";
  block.style.height = "20rem";
  block.style.zindex = "-100";
  block.appendChild(link);
  tous.appendChild(block);

  var eX = link.offsetLeft;
  var eY = link.offsetTop;
  console.log({
    "Position horizontale dans la fenêtre": eX, 
    "Position verticale dans la fenêtre": eY
  });

  let svg = document.createElement("svg");
  svg.style.position = "absolute";
  svg.style.height = "320px"
  svg.style.width = "320px"
  tous.appendChild(svg);

  let ligne = document.createElement("line");
  ligne.setAttribute("x1", "0");
  ligne.setAttribute("y1", "0");
  ligne.setAttribute("x2", eX/16);
  ligne.setAttribute("y2", eY/16);
  ligne.style.stroke = "rgb(255,0,0)";
  ligne.style.strokeWidth = "4";
  svg.appendChild(ligne);
  console.log(ligne);
});

let liens = document.querySelectorAll(".boule");

for (var i = 0; i < liens.length; i++) {
  liens[0].href = "https://violence.caquelin.etu.mmi-unistra.fr/detail-inconcevable-12";
  liens[1].href = "https://violence.caquelin.etu.mmi-unistra.fr/detail-inconcevable-14";
  liens[2].href = "https://violence.caquelin.etu.mmi-unistra.fr/detail-inconcevable-15";
  liens[3].href = "https://violence.caquelin.etu.mmi-unistra.fr/detail-inconcevable-16";
}