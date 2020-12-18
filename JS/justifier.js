let truc = document.createElement("div");
truc.style.position = "absolute";
var qqch = [];
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

  qqch.push(link);

});

var BreakException = {};
   try { 
    articles.forEach(function(articl, items) {
      console.log(articl);
      
      console.log({"coordonnées x" : qqch});

      if (items === 3) {
        throw BreakException;
    }
        let link1 = qqch[items];
        let link2 = qqch[items+1];
        eX = link1.offsetLeft;
        eY = link1.offsetLeft;
        jX = link2.offsetLeft;
        jY = link2.offsetLeft;
        console.log(eX);
        let ns = 'http://www.w3.org/2000/svg';
        svg = document.createElementNS(ns,"svg");
        svg.style.height = "100%";
        svg.style.width = "100%";
        svg.style.position = "absolute";

        truc.appendChild(svg);

        let ligne = document.createElementNS(ns,"line");
        ligne.setAttribute("x1", eX);
        ligne.setAttribute("y1", eY);
        ligne.setAttribute("x2", jX);
        ligne.setAttribute("y2", jY);
        ligne.style.stroke = "rgb(255,0,0)";
        ligne.style.strokeWidth = "4";
        ligne.style.position = "absolute";
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