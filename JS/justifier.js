let main = document.querySelector(".block-justifier");
main.style.zIndex = "999";

var qqch = [];
articles.forEach(function(article) {
  console.log(article);
  
  function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min)) + min;
  }
  
  link = document.createElement("a");
  link.classList.add("boule");
  link.style.width = "15px";
  link.style.height = "15px";
  link.style.zIndex = "9999";
  link.style.marginTop = getRandomInt(2, 70)+"%";
  link.style.marginLeft = getRandomInt(2, 95)+"%";

  let point = document.createElement("span");
  link.appendChild(point);

  let description = document.createElement("p");
  point.appendChild(description);

  tous = document.querySelector(".tous");
  let block = document.createElement("div");
  block.style.width = "20rem";
  block.style.height = "20rem";
  block.appendChild(link);
  tous.appendChild(block);

  qqch.push(link);

});

let body = document.querySelector("body");
let ns = 'http://www.w3.org/2000/svg';
svg = document.createElementNS(ns,"svg");
svg.style.height = "100vh";
svg.style.width = "100vw";
svg.style.position = "absolute";
svg.style.top = "0";
svg.style.zIndex = "99";
body.appendChild(svg);

var BreakException = {};
  setInterval(function () {
    $(window).resize(function() { 
      if( typeof(ligne) == 'undefined' ){
        alert("variableInexistante n'existe pas !");
      } else {
        ligne.remove();
      }
    });
   try { 
     
    articles.forEach(function(articl, items) {
      console.log(articl);
      
      console.log({"coordonnées x" : qqch});

      if (items === 3) {
        throw BreakException;
    }

      let link1 = qqch[items];
      let link2 = qqch[items+1];
      eX = link1.offsetLeft + 7.5;
      eY = link1.offsetTop + 7.5;
      jX = link2.offsetLeft + 7.5;
      jY = link2.offsetTop + 7.5;
      console.log(eX);

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
}, 90);

let liens = document.querySelectorAll(".boule");

for (var i = 0; i < liens.length; i++) {
  liens[0].href = "https://violence.caquelin.etu.mmi-unistra.fr/detail-inconcevable-12";
  liens[1].href = "https://violence.caquelin.etu.mmi-unistra.fr/detail-inconcevable-14";
  liens[2].href = "https://violence.caquelin.etu.mmi-unistra.fr/detail-inconcevable-15";
  liens[3].href = "https://violence.caquelin.etu.mmi-unistra.fr/detail-inconcevable-16";
}