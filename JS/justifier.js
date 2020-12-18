let truc = document.createElement("div");
truc.style.position = "absolute";

articles.forEach(function(article) {
  console.log(article);
  
  function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min)) + min;
  }
  
  link = document.createElement("a");
  link.classList.add("boule");
  link.style.marginTop = getRandomInt(2, 70)+"%";
  link.style.marginLeft = getRandomInt(2, 95)+"%";

  let point = document.createElement("span");
  link.appendChild(point);

  let description = document.createElement("p");
  point.appendChild(description);


  tous = document.querySelector(".tous");
  tous.appendChild(truc);

  let block = document.createElement("div");
  block.style.width = "20rem";
  block.style.height = "20rem";
  block.appendChild(link);
  tous.appendChild(block);

});

var BreakException = {};
   try { 

    articles.forEach(function(articl, items) {
      console.log(articl);

      var coord = [link.offsetLeft, link.offsetTop];
      console.log({"coordonnées" : coord});

      if (items === 3) {
        throw BreakException;
    }
        let ns = 'http://www.w3.org/2000/svg';
        svg = document.createElementNS(ns,"svg");
        svg.style.height = "320px";
        svg.style.width = "320px";

        truc.appendChild(svg);

        let ligne = document.createElementNS(ns,"line");
        ligne.setAttribute("x1", coord[items]);
        ligne.setAttribute("y1", coord[items]);
        ligne.setAttribute("x2", coord[items+1]);
        ligne.setAttribute("y2", coord[items+1]);
        ligne.style.stroke = "rgb(255,0,0)";
        ligne.style.strokeWidth = "4";
        svg.appendChild(ligne);

    });

} catch (e) {
  if (e !== BreakException) throw e;
}


let liens = document.querySelectorAll(".boule");

for (var i = 0; i < liens.length; i++) {
  liens[0].href = "https://violence.caquelin.etu.mmi-unistra.fr/detail-inconcevable-12";
  liens[1].href = "https://violence.caquelin.etu.mmi-unistra.fr/detail-inconcevable-14";
  liens[2].href = "https://violence.caquelin.etu.mmi-unistra.fr/detail-inconcevable-15";
  liens[3].href = "https://violence.caquelin.etu.mmi-unistra.fr/detail-inconcevable-16";
}