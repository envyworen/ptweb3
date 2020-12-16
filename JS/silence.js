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
    block.appendChild(link);
    tous.appendChild(block);
    
  });

let liens = document.querySelectorAll(".boule");

for (var i = 0; i < liens.length; i++) {
  liens[0].href = "";
  liens[1].href = "";
  liens[2].href = "";
  liens[3].href = "";
}