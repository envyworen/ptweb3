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