articles.forEach(function(article) {
    console.log(article);
    
    function getRandomInt(min, max) {
      return Math.floor(Math.random() * (max - min)) + min;
    }
    
    let link = document.createElement("a");
    link.classList.add("boule");
    link.style.marginTop = getRandomInt(5, 245)+"px";
    link.style.marginLeft = getRandomInt(5, 245)+"px";

    let point = document.createElement("span");
    link.appendChild(point);

    let description = document.createElement("p");
    point.appendChild(description);

    let tous = document.querySelector(".tous");
    let block = document.createElement("div");
    block.style.width = "250px";
    block.style.height = "250px";
    block.style.backgroundColor = "green";
    block.appendChild(link);
    tous.appendChild(block);
    
  });

let liens = document.querySelectorAll(".boule");

for (var i = 0; i < liens.length; i++) {
  liens[0].href = "https://violence.caquelin.etu.mmi-unistra.fr/detail-inconcevable-12";
  liens[1].href = "https://violence.caquelin.etu.mmi-unistra.fr/detail-inconcevable-14";
  liens[2].href = "https://violence.caquelin.etu.mmi-unistra.fr/detail-inconcevable-15";
  liens[3].href = "https://violence.caquelin.etu.mmi-unistra.fr/detail-inconcevable-16";
}